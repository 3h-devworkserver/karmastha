<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Purchase\Payment;
use Auth;
use Datatables;

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

    public function load(){
        $payments = Payment::where('user_id',Auth::user()->id)->latest()->get();
        return Datatables::of($payments)
            // ->escapeColumns(['title', 'slug'])
            // ->addColumn('bulk', function ($data) {
            //     return bulkSelect($data->id);
            // })
            ->editColumn('transaction_id', function($data){ 
                if($data->payment_method == 'ipay'){
                    $ipay = $data->paymentIpay;
                    return $ipay->transactionid ;
                }
            })
            ->editColumn('order_no', function($data){ 
                if($data->payment_method == 'ipay'){
                    $ipay = $data->paymentIpay;
                    return $ipay->ordernumber ;
                }
            })
            ->editColumn('payment_type', function($data){ 
                return $data->payment_method ;
            })
            ->editColumn('total_payment', function($data){ 
                if($data->payment_method == 'ipay'){
                    $ipay = $data->paymentIpay;
                    return 'NPR '.$ipay->amount ;
                }
            })
            ->editColumn('created_at', function($data){ 
                return parseDateTimeY_M_D($data->created_at) ;
            })
            // ->editColumn('status', function ($data) {
            //     return $data->status_label;
            // })
            ->addColumn('action', function($data){
                // return crudOps('pages', $data->id);
                return '<ul class="list-inline no-margin-bottom"><li><a href="#" class="">View Detail <i class="fa fa-eye"></i></a></li></ul>';
            })
            ->make(true);
    }
}
