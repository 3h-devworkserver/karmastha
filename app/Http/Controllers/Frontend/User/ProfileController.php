<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use DB;
use Illuminate\Support\Facades\Input;
/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {

        
        $output = $this->user->updateProfile(access()->id(), $request->all());

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    public function userUpdate(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->all());
        return redirect('/user/profile')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));

    }

    public function passwordUpdate(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->all());
        return redirect('/user/password')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));

    }

    public function userImageUpdate($id){

                $user_img =  DB::table('user_image')->select('id','image')->where('user_id',$id)->first();
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

               if(!empty($user_img->id)){
                    DB::table('user_image')->where('user_id',$id)->update([
                            'image' => $pname,
                    ]);
               } else {
                 DB::table('user_image')->insert([
                             'user_id' => $id,
                             'image' => $pname,
                    ]);
               }  
               return redirect('/user/image')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));      
    }
}
