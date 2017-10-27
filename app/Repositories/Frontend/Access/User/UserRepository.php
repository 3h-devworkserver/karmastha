<?php

namespace App\Repositories\Frontend\Access\User;

use App\Events\Frontend\Auth\UserConfirmed;
use App\Exceptions\GeneralException;
use App\Models\Access\Role\Role;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Input;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = User::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * @param $email
     *
     * @return bool
     */
    public function findByEmail($email)
    {
        return $this->query()->where('email', $email)->first();
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->query()->where('confirmation_code', $token)->first();
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function getEmailForPasswordToken($token)
    {
        $rows = DB::table(config('auth.passwords.users.table'))->get();

        foreach ($rows as $row) {
            if (password_verify($token, $row->token)) {
                return $row->email;
            }
        }

        throw new GeneralException(trans('auth.unknown'));
    }

    /**
     * @param array $data
     * @param bool  $provider
     *
     * @return static
     */
    public function create(array $data, $provider = false)
    {
        $user = self::MODEL;
        $user = new $user();
        $user->name = $data['fname']. ' '.$data['lname'];
        $user->email = $data['email'];
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->status = 1;
        $user->password = $provider ? null : bcrypt($data['password']);
        $user->confirmed = $provider ? 1 : (config('access.users.confirm_email') ? 0 : 1);

        DB::transaction(function () use ($user, $data) {
            if ($user->save()) {
                //create profile of the user
                $user->profile()->create([
                    'fname'=>$data['fname'],
                    'lname'=>$data['lname'],
                    'phone'=>$data['phone'],
                ]);

                /*
                 * Add the default site role to the new user
                 */ 
                 $user->attachRole($this->role->getDefaultUserRole());
                // if ($data['user_type'] == 'Customer' || $data['user_type'] == 'Vendor' || $data['user_type'] == 'WholeSeller') {
                //     $role = Role::where('name', $data['user_type'])->first();
                //     $user->attachRole($role);
                // }
            }
        });

        /*
         * If users have to confirm their email and this is not a social account,
         * send the confirmation email
         *
         * If this is a social account they are confirmed through the social provider by default
         */
        if (config('access.users.confirm_email') && $provider === false) {
            Mail::send('emails.activateemail',['user'=>$user], function($message) use($user){
                $message->to($user['email'], $user['name'])
                ->subject('Please confirm your account.');
            });
            // $user->notify(new UserNeedsConfirmation($user->confirmation_code,$data ));
        }

        /*
         * Return the user object
         */
        return $user;
    }

    /**
     * @param $data
     * @param $provider
     *
     * @return UserRepository|bool
     * @throws GeneralException
     */
    public function findOrCreateSocial($data, $provider)
    {
        // User email may not provided.
        $user_email = $data->email ?: "{$data->id}@{$provider}.com";

        // Check to see if there is a user with this email first.
        $user = $this->findByEmail($user_email);

        /*
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if (! $user) {
            // Registration is not enabled
            if (! config('access.users.registration')) {
                throw new GeneralException(trans('exceptions.frontend.auth.registration_disabled'));
            }

            $user = $this->create([
                'name'  => $data->name,
                'email' => $user_email,
            ], true);
        }

        // See if the user has logged in with this social account before
        if (! $user->hasProvider($provider)) {
            // Gather the provider data for saving and associate it with the user
            $user->providers()->save(new SocialLogin([
                'provider'    => $provider,
                'provider_id' => $data->id,
                'token'       => $data->token,
                'avatar'      => $data->avatar,
            ]));
        } else {
            // Update the users information, token and avatar can be updated.
            $user->providers()->update([
                'token'       => $data->token,
                'avatar'      => $data->avatar,
            ]);
        }

        // Return the user object
        return $user;
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function confirmAccount($token)
    {
        $user = $this->findByToken($token);

        if ($user->confirmed == 1) {
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        if ($user->confirmation_code == $token) {
            $user->confirmed = 1;

            event(new UserConfirmed($user));

            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.confirmation.mismatch'));
    }

    /**
     * @param $id
     * @param $input
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function updateProfile($id, $input)
    {

       
        $user = $this->find($id);
        $user->name = $input['fname'].' '.$input['lname'];
        // $user->name = $input['fullname'];
        if( $input['business_type'] != '0'){
            $user->roles()->update(['role_id'=>$input['business_type']]);
        }
       $user_img =  DB::table('profiles')->select('image')->where('user_id',$id)->first();
            if(Input::hasFile('pimage'))
                        {
                            $file = Input::file('pimage');
                            $destinationPath = public_path(). '/images/logo/';
                             $pname = $file->getClientOriginalName();
                             $file->move($destinationPath, $pname);
                           
                        }
                        else
                        {
                            if($user_img->image != ''){
                                $pname = $user_img->image;
                            }else{
                                $pname = '';
                            }
                        }
        DB::table('profiles')
                            ->where('user_id', $id)
                            ->update([
                                'fname' => $input['fname'],
                                'lname' => $input['lname'],
                                'phone' => $input['phone'],
                                'street' => $input['street'],
                                'city' => $input['city'],
                                'zone' => $input['zone'],
                                'district' => $input['district'],
                                'image' => $pname,
                              ]);  
       $user_id =  DB::table('user_information')->select('user_id','c_logo')->where('user_id',$id)->first();
       if(!empty($input['website_url'])){
                            $url = $input['website_url'];
                        }else{
                            $url = '';
                        }
       if( !empty($user_id)){

        if(Input::hasFile('c_logo'))
                        {
                            $file = Input::file('c_logo');
                            $destinationPath = public_path(). '/images/logo/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                           
                        }
                        else
                        {
                            if($user_id->c_logo != ''){
                                $filename = $user_id->c_logo;
                            }else{
                                $filename = '';
                            }
                        }


                        
         DB::table('user_information')
                            ->where('user_id', $id)
                            ->update([
                                'website' => $input['website'],
                                'website_url' => $url,
                                'c_street' => $input['c_street'],
                                'c_city' => $input['c_city'],
                                'c_zone' => $input['c_zone'],
                                'c_district' => $input['c_district'],
                                'c_description' => $input['c_description'],
                                'c_logo' => $filename,
                              ]);   
       }else{

        if(Input::hasFile('c_logo'))
                        {
                            $file = Input::file('c_logo');
                            $destinationPath = public_path(). '/images/logo/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                           
                        }else{
                            $filename = '';
                        }
         DB::table('user_information')
         ->insert([
                                'user_id' => $id,
                                'website' => $input['website'],
                                'website_url' => $url,
                                'c_street' => $input['c_street'],
                                'c_city' => $input['c_city'],
                                'c_zone' => $input['c_zone'],
                                'c_description' => $input['c_description'],
                                'c_logo' => $filename,
            ]);
       }

        return $user->save();

        // if ($user->canChangeEmail()) {
        //     //Address is not current address
        //     if ($user->email != $input['email']) {
        //         //Emails have to be unique
        //         if ($this->findByEmail($input['email'])) {
        //             throw new GeneralException(trans('exceptions.frontend.auth.email_taken'));
        //         }

        //         // Force the user to re-verify his email address
        //         $user->confirmation_code = md5(uniqid(mt_rand(), true));
        //         $user->confirmed = 0;
        //         $user->email = $input['email'];
        //         $updated = $user->save();

        //         // Send the new confirmation e-mail
        //         $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        //         return [
        //             'success' => $updated,
        //             'email_changed' => true,
        //         ];
        //     }
        // }

    }

    public function updateUser($id, $input)
    {
        
    }

    /**
     * @param $input
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function changePassword($input)
    {
        $user = $this->find(access()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            $user->password = bcrypt($input['password']);

            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.password.change_mismatch'));
    }
}
