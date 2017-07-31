<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')->withClass('profile-dashboard');
    }

    public function profile()
    {
        return view('frontend.user.profile')->withClass('profile-info');
    }

    public function passwordchange()
    {
        return view('frontend.user.password')->withClass('password-info');
    }
    
}
