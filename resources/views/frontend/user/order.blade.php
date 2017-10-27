@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Orders')

@section('content')

    <div class="col-sm-8 col-md-8">
        
        @include('includes.partials.messages')
        @foreach($payments as $key => $payment)
            @if($payment->payment_method == 'ipay')
                <?php   
                    $ipay = $payment->paymentIpay;  
                    $purchase = $payment->purchase;
                    $items = $purchase->purchaseItems;
                    $itemCount = DB::table('purchase_items')->where('purchase_id', $purchase->id)->sum('qty');
                ?>
                <div class="purchase-history">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>transaction ID</h5>
                            <p>{{$ipay->transactionid}}</p>
                        </div>
                        <div class="col-md-2">
                            <h5>order no.</h5>
                            <p>{{$ipay->ordernumber}}</p>
                        </div>
                        <div class="col-md-2">
                            <h5>payment type</h5>
                            <p>{{$payment->payment_method}}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>total payments</h5>
                            <p>NPR {{$ipay->amount}}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>purchase items <span type="button" data-toggle="collapse" data-target="#collapseExample{{$key}}" aria-expanded="false" aria-controls="collapseExample{{$key}}"><i class="fa fa-angle-down"></i></span></h5>
                            <p>total : {{$itemCount}} items</p>
                        </div>

                    </div>
                </div>
                <div class="collapse clearfix" id="collapseExample{{$key}}">
                  <div class="well">
                    @if(count($items) > 0)
                        @foreach($items as $item)
                            {{$item}}
                        @endforeach
                    @endif
                  </div>
                </div>
            @endif
        @endforeach
        
    
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div>
            

@endsection