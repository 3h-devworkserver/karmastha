<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\District;

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
        $zones = Zone::all()->pluck('zone_name', 'zone_id');
        $districts = District::all();
        return view('frontend.user.profile',compact('zones', 'districts'))->withClass('profile-info');
    }

    public function passwordchange()
    {
        return view('frontend.user.password')->withClass('password-info');
    }
    
}
