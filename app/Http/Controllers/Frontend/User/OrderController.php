<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Purchase\Payment;
use Auth;

/**
 * Class AccountController.
 */
class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$payments = Payment::where('user_id',Auth::user()->id)->latest()->get();
    	
    	// return $payments;
        return view('frontend.user.order', compact('payments'))->withClass('user-order');
    }
}
