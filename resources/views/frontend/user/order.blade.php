@extends('frontend.user.layouts.frontend-app')

@section ('title', 'Orders')

@section('content')

    <div class="col-sm-12 col-md-12 Fullcontent-wrap">
        
        @include('includes.partials.messages')

        <div class="userdash-right">
            
            @if (session()->has('success_message'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error_message'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    </div>
                </div>
            @endif

                @if (count($payments) > 0)

                <table id="order-table" class="table table-bordered table-striped table-hover" width="100%">
                    <thead class="">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Order No.</th>
                            <th>Payment Type</th>
                            <th>Total Payment</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

                
                    <div class="spacer"></div>

                    <div class="button-group">
                        {{-- <a href="{{ URL::to('/')}}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp; --}}

                        {{-- <div style="float:right">
                            <form action="{{ url('/emptyWishlist') }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-lg" value="Empty Wishlist">
                            </form>
                        </div> --}}
                    </div>

                @else
                    <div is="null" class="list-module-listempty">
                        <div is="null" class="list-module-listempty_title">
                            <i is="null" type="notice" class="fa fa-exclamation-circle list-module-listempty_titleicon" aria-hidden="true"></i><!-- react-text: 344 -->No Order Transaction Available.
                            <!-- /react-text -->
                        </div>
                    </div>
                @endif

                <div class="spacer"></div>

        </div>



<?php /*
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
        @endforeach }
<?php  */ ?>      
    
    </div>
    {{-- <div class="col-sm-4 col-md-4">
        <div class="maui-row-right mt15">
            @include('frontend.user.includes.noticeboard')
            @include('frontend.user.includes.supplier')
        </div>
    </div> --}}
            

@endsection