<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use App\Exceptions\GeneralException;
use App\Helpers\Auth\Auth;
use App\Helpers\Frontend\Auth\Socialite;
use App\Http\Controllers\Controller;
use App\Models\Cartitem\Cartitem;
use App\Models\Product\Product;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (access()->allow('view-backend')) {
            return route('admin.dashboard');
        }elseif(access()->hasRole('Individual')){
            return route('frontend.index');
        }
        return "different roles assignged";  // used for testing
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login')
            ->withClass('inner-page login_page')
            ->withSocialiteLinks((new Socialite())->getSocialLinks());
    }

    /**
     * Show admin login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminLoginForm()
    {
        return view('frontend.auth.adminlogin')
            ->withSocialiteLinks((new Socialite())->getSocialLinks());
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            //transfering add cartitems from session to db after login
            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            if (!empty($cartItems)) {
                foreach($cartItems as $key=>$cartItem){
                    $product = Product::findOrFail($cartItem['productId']); 

                    $prevItem = Cartitem::where('user_id', access()->user()->id)
                                        ->where('product_id', $product->id )->first();
                    if (!empty($prevItem)) {
                        $prevItemAttr = $prevItem->attributes;
                        if(is_array($cartItem['attributes'])){
                            foreach($cartItem['attributes'] as $key => $attr){
                                $check = 1;
                                foreach($attr as $key => $val){
                                        $secondCheck =0;
                                    foreach ($prevItemAttr as $dbval) {
                                        if ($key == $dbval->attr_name && $val == $dbval->attr_value) {
                                            $secondCheck = 1;
                                        }
                                    }
                                    if ($secondCheck == 0) {
                                        $check = 0;
                                        break;
                                    }
                                   
                                }
                            }
                                if ($check == 1) {
                                    $prevItem->qty += $cartItem['qty'];
                                    $prevItem->save();
                                }else{
                                    $cartitem = Cartitem::create([
                                        'product_id' => $product->id ,
                                        'user_id' => access()->user()->id,
                                        'qty' =>$cartItem['qty'] ,
                                    ]);
                                    
                                    if(is_array($cartItem['attributes'])){
                                        foreach($cartItem['attributes'] as $key => $attr){
                                            foreach($attr as $key => $val){
                                                $cartitem->attributes()->create([
                                                    'attr_name' => $key,
                                                    'attr_value' => $val,
                                                ]);
                                            }
                                        }
                                    }
                                }
                        }else{
                            $prevItem->qty += $cartItem['qty'];
                            $prevItem->save();
                        }
                    }else{
                        $cartitem = Cartitem::create([
                            'product_id' => $product->id ,
                            'user_id' => access()->user()->id,
                            'qty' =>$cartItem['qty'] ,
                        ]);
                        
                        if(is_array($cartItem['attributes'])){
                            foreach($cartItem['attributes'] as $key => $attr){
                                foreach($attr as $key => $val){
                                    $cartitem->attributes()->create([
                                        'attr_name' => $key,
                                        'attr_value' => $val,
                                    ]);
                                }
                            }
                        }
                    }



                    // $cartitem = Cartitem::create([
                    //     'product_id' => $product->id ,
                    //     'user_id' => access()->user()->id,
                    //     'qty' =>$cartItem['qty'] ,
                    // ]);
                    
                    // if(is_array($cartItem['attributes'])){
                    //     foreach($cartItem['attributes'] as $key => $attr){
                    //         foreach($attr as $key => $val){
                    //             $cartitem->attributes()->create([
                    //                 'attr_name' => $key,
                    //                 'attr_value' => $val,
                    //             ]);
                    //         }
                    //     }
                    // }
                    

                }
                Session::flush();
            }



            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function adminLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * @param Request $request
     * @param $user
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        /*
         * Check to see if the users account is confirmed and active
         */
        if (! $user->isConfirmed()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id]));
        } elseif (! $user->isActive()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
        }

        event(new UserLoggedIn($user));

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        /*
         * Boilerplate needed logic
         */

        /*
         * Remove the socialite session variable if exists
         */
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

        /*
         * Remove any session data from backend
         */
        app()->make(Auth::class)->flushTempSession();

        /*
         * Fire event, Log out user, Redirect
         */
        event(new UserLoggedOut($this->guard()->user()));

        /*
         * Laravel specific logic
         */
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {
        //If for some reason route is getting hit without someone already logged in
        if (! access()->user()) {
            return redirect()->route('frontend.auth.login');
        }

        //If admin id is set, relogin
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            //Save admin id
            $admin_id = session()->get('admin_user_id');

            app()->make(Auth::class)->flushTempSession();

            //Re-login admin
            access()->loginUsingId((int) $admin_id);

            //Redirect to backend user page
            return redirect()->route('admin.access.user.index');
        } else {
            app()->make(Auth::class)->flushTempSession();

            //Otherwise logout and redirect to login
            access()->logout();

            return redirect()->route('frontend.auth.login');
        }
    }
}
