@extends('frontend.layouts.app')

<?php use App\Models\Product\Product; ?>
@section('title')
Checkout @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')
<section class="cart-body">
  <div class="container">
    <div class="row">
      
      	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	        <div class="cart-review">
		        <h2 class="section-title-2">review items</h2>

		        <?php  $countItems =  0;  $cartIds = array(); ?>
	            @foreach($cartItems as $cartItem)
		        <?php
		            $stock = '';
		            $product = \App\Models\Product\Product::findOrFail($cartItem->product_id); 
		            $productAttrCombination = \App\Models\Product\ProductAttrCombination::where('identifier', $cartItem->identifier)->first(); 
		        ?>

		        <div class="cart-review-content gray-bg hide">
	          		<div class="col-xs-2">
			            <div class="product-cart-img">
			              <a href="{{url('/product/'.$product->slug)}}" target="_blank">
			              <img src="{{asset('images/product/'.$product->id.'/thumbnail/'.$product->productFirstThumbImage() ) }}" alt="{{$product->name}}">
			              </a>
			            </div>
		          	</div>

	                <div class="col-xs-4">
	                    <div class="product-cart-info">
	                      <h6 class="section-title-1"><a href="{{url('/product/'.$product->slug)}}" target="_blank">{{$product->name}}</a></h6>
	                      @if(!empty($product->user_id))
	                        <span>Seller:<em>{{$product->user->name}}</em></span>
	                      @endif
	                      @if(count($productAttrCombination) > 0)
	                        @if(count($productAttrCombination->productAttrCombinationValue) > 0)
	                          <div class="productlist-info">
	                          @foreach($productAttrCombination->productAttrCombinationValue as $key=>$comb)
	                              <span>{{$comb->atrributeVal->attribute->name}}:<em>{{$comb->atrributeVal->value}}</em></span>
	                              {{-- <span>Size:<em>M</em></span> --}}
	                          @endforeach
	                          </div>
	                        @endif
	                      @endif
	                    </div>
	                </div>

	                <div class="col-xs-6">
	                    <div class="cart-remark">
	                      <div class="cart-price fix-width">
	                        <h6>price</h6>
	                        <span>NPR<em>{{productPrice($product->id)}}</em></span>
	                      </div>

	                      	<div class="cart-qty fix-width">
			                  <h6>quantity:</h6>
			                  <div class="qty-section">                   
                                <div>
                                  <?php 
                                      // $productAttrCombination = \App\Models\Product\ProductAttrCombination::where('identifier', $cartItem->attr_identifier)->first(); 
                                      // dd($productAttrCombination);
                                  ?>
                                  @if($product->productInventory->manage_stock == 1)
                                      @if(!empty($productAttrCombination))
                                          @if ($product->productInventory->availability == 'in stock') 
                                              @if ($productAttrCombination->quantity == 0)
                                                  <?php $stock = 'out of stock'; ?>
                                                  <span class="outOfStock">{{$stock}}</span>
                                              @else
                                                <span>{{$cartItem->qty}}</span>
                                                <?php 
								                  	$countItems +=  $cartItem->qty;
								                  	array_push($cartIds,$cartItem->id);
								                ?>
                                              @endif
                                          @else
                                              <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                          @endif
                                      @else
                                        @if( count($product->productAttrCombination) > 0 )
                                          <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                        @else
                                          @if ($product->productInventory->availability != 'in stock') 
                                              <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                          @else
                                            <span>{{$cartItem->qty}}</span>
                                            <?php 
							                  	$countItems +=  $cartItem->qty;
								                array_push($cartIds,$cartItem->id);
							                ?>
                                          @endif
                                        @endif
                                      @endif
                                  @else
                                    @if(!empty($productAttrCombination))
                                      @if($productAttrCombination->quantity == 0) 
                                          <span>{{$cartItem->qty}}</span>
                                          <?php 
							                  	$countItems +=  $cartItem->qty;
								                array_push($cartIds,$cartItem->id);
							                ?>
                                      @else
                                          <span>{{$cartItem->qty}}</span>
                                          <?php 
							                  	$countItems +=  $cartItem->qty;
								                array_push($cartIds,$cartItem->id);
							                ?>
                                      @endif
                                    @else
                                      @if( count($product->productAttrCombination) > 0 )
                                        <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                      @else
                                        <span>{{$cartItem->qty}}</span>
                                        <?php 
						                  	$countItems +=  $cartItem->qty;
								            array_push($cartIds,$cartItem->id);
						                ?>
                                      @endif
                                    @endif
                                  @endif
                                  {{-- <input value="1" /> --}}
                                </div>

                                <div class="QtyValidation"><span class="text-danger"></span></div>
                                <div class="update-qty hide">
                                    <a href="javascript:void(0)" class="submit">Update</a>
                                </div> 

                              </div> 

			                  
			                </div>

			               	<div class="sub-total fix-width">
			                  <h6>total</h6>
			                  	@if($stock != 'out of stock')
			                      <span>NPR<em>{{custom_number_format(floatval($cartItem->qty * productPrice($product->id) ))}}</em></span>
			                    @endif
			                </div>

	                    </div>
	                </div>
	            </div>

		        @endforeach

	          	<div class="box">
		            <h2 class="section-title-2">billing details</h2>
		            {{Form::open(['url'=>'', 'id'=>'billingDetail'])}}
	                  	{{Form::hidden('cartIds', implode(',',$cartIds) )}}
		            <?php
		            	if(!empty($user) && !empty($user->profile) ){
		            		$profile = $user->profile;
		            		$fname = $profile->fname;
		            		$lname = $profile->lname;
		            		$zone = $profile->zone;
		            		$district = $profile->district;
		            		$city = $profile->city;
		            		$street = $profile->street;
		            		$email = $user->email;
		            		$readonly = 'readonly';
		            		$phone = $profile->phone;
		            	}else{
		            		$profile = '';
		            		$fname = '';
		            		$lname = '';
		            		$zone = '';
		            		$district = '';
		            		$city = '';
		            		$street = '';
		            		$email = '';
		            		$readonly = '';
		            		$phone = '';
		            	}
		            ?>
		              <div class="content">
		                <!-- /.row -->
		                <div class="row">
		                    <div class="col-sm-6">
		                        <div class="form-group">
		                            <label for="firstname">first name</label>
		                            <input type="text" class="form-control" id="firstname" name="fname" value="{{$fname}}">
		                        </div>
		                    </div>
		                    <div class="col-sm-6">
		                        <div class="form-group">
		                            <label for="lastname">last name</label>
		                            <input type="text" class="form-control" id="lastname" name="lname" value="{{$lname}}">
		                        </div>
		                    </div>
		                </div>
		                    
		                <!-- /.row -->    
		                <div class="row">
		                    <div class="col-sm-6">
		                        <div class="form-group">
		                            <label for="zone">Zone</label>
		                            {{Form::select('zone', $zones, $zone, ['placeholder'=>'-- Select Zone --','class' => 'form-control zone selectBox', 'id'=>'zone'])}}
		                        </div>
		                    </div>

		                  	<div class="col-sm-6 col-md-6">
		                      <div class="form-group">
		                        <label for="district">district</label>
		                        <select class="form-control district selectBox" id="district" name="district" data-district ="{{$district}}" required>
		                        	<option selected="selected" disabled="disabled" value="" hidden="hidden">-- Select District --</option>
                                    {{-- <option value="">-- Select District --</option> --}}
                                    @foreach($districts as $district)
                                    <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
                                    @endforeach
                                </select>
		                      </div>
		                    </div>

		                    <div class="col-sm-6 col-md-6">
		                      <div class="form-group">
		                        <label for="city">city</label>
		                        <input type="text" class="form-control" id="city" name="city" value="{{$city}}">
		                      </div>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                      <div class="form-group">
		                        <label for="st_address">street address</label>
		                        <input type="text" class="form-control" id="st_address" name="st_address" value="{{$street}}">
		                      </div>
		                    </div>

		                    <div class="col-sm-6">
		                      <div class="form-group">
		                        <label for="st_address2">street address 2 (optional)</label>
		                        <input type="text" class="form-control" id="st_address2" name="st_address2">
		                      </div>
		                    </div>
		                      
		                    <div class="col-sm-6">
		                      <div class="form-group">
		                        <label for="email">email address</label>
		                        <input type="text" class="form-control" id="email" name="email" value="{{$email}}" {{$readonly}}>
		                      </div>
		                    </div>
		                    <div class="col-sm-6">
		                      <div class="form-group">
		                        <label for="phone">phone number</label>
		                        <input type="text" class="form-control" id="phone" name="phone" value="{{$phone}}">
		                      </div>
		                    </div>

		                  </div>
		                  <!-- /.row -->
		                </div>

		                <!-- /.row -->
		                <div class="row">
		                    <div class="col-sm-12">
		                        <div class="form-group">
		                        	<button type="button" class="btn btn-primary open-door billingBtn">Next</button>
		                        </div>
		                    </div>
		                </div>
		               {{Form::close()}}
	            </div>
	            <!-- /.box -->

	            <div class="payment-option">
	              <div class="pannel-header">
	                <div class="col-md-6">
	                  <div class="payment-header">
	                    <h3 class="section-title-1">Ship to a different address?</h3>
	                  </div>
	                </div>

	                <div class="col-md-6">
	                  <div class="toggle-switch">
	                    <label class="switch">
	                      <input type="checkbox" onclick="return menuslidedown();" class="total-calculate" name="showShippingDetail" disabled>
	                      <div class="slider round"></div>
	                    </label>
	                  </div>
	                  
	                </div>

	                <div class="collapse" id="billingopt">
	                  <div class="box">
	                  		{{Form::open(['url'=>'', 'id'=>'shippingDetail'])}}

	                        <div class="content">

	                        	<!-- /.row -->
				                <div class="row">
				                    <div class="col-sm-6">
				                        <div class="form-group">
				                            <label for="ship_firstname">first name</label>
				                            <input type="text" class="form-control" id="ship_firstname" name="ship_fname">
				                        </div>
				                    </div>
				                    <div class="col-sm-6">
				                        <div class="form-group">
				                            <label for="ship_lastname">last name</label>
				                            <input type="text" class="form-control" id="ship_lastname" name="ship_lname">
				                        </div>
				                    </div>
				                </div>
				                    
				                <!-- /.row -->    
				                <div class="row">
				                    <div class="col-sm-6">
				                        <div class="form-group">
				                            <label for="ship_zone">Zone</label>
				                            {{Form::select('ship_zone', $zones, null, ['placeholder'=>'-- Select Zone --','class' => 'form-control cZone selectBox', 'id'=>'ship_zone'])}}
				                        </div>
				                    </div>

				                    <div class="col-sm-6 col-md-6">
				                      <div class="form-group">
				                        <label for="ship_district">district</label>
				                        <select class="form-control cDistrict selectBox" id="ship_district" name="ship_district" data-district ="" required>
				                        	<option selected="selected" disabled="disabled" value="" hidden="hidden">-- Select District --</option>
		                                    {{-- <option value="">-- Select District --</option> --}}
		                                    @foreach($districts as $district)
		                                    <option class="hide" data-attr="{{$district->zone_id}}" value="{{$district->district_id}}">{{$district->district_name}}</option>
		                                    @endforeach
		                                </select>
				                      </div>
				                    </div>

				                  	<div class="col-sm-6 col-md-6">
				                      <div class="form-group">
				                        <label for="ship_city">city</label>
				                        <input type="text" class="form-control" id="ship_city" name="ship_city">
				                      </div>
				                    </div>
				                    
				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label for="ship_st_address">street address</label>
				                        <input type="text" class="form-control" id="ship_st_address" name="ship_st_address">
				                      </div>
				                    </div>

				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label for="ship_st_address2">street address 2 (optional)</label>
				                        <input type="text" class="form-control" id="ship_st_address2" name="ship_st_address2">
				                      </div>
				                    </div>
				                      
				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label for="ship_email">email address</label>
				                        <input type="text" class="form-control" id="ship_email" name="ship_email">
				                      </div>
				                    </div>
				                    <div class="col-sm-6">
				                      <div class="form-group">
				                        <label for="ship_phone">phone number</label>
				                        <input type="text" class="form-control" id="ship_phone" name="ship_phone">
				                      </div>
				                    </div>

				                </div>

	                            <!-- /.row -->
				                <div class="row">
				                    <div class="col-sm-12">
				                        <div class="form-group">
				                        	<button type="button" class="btn btn-primary open-door shippingBtn">Next</button>
				                        </div>
				                    </div>
				                </div>
	                        </div>
	                        {{Form::close()}}
	                      </div>
	                  </div>

	              </div><!--pannel header end-->

	              <div class="pannel-body hide-option">
	                <h2 class="section-title-1">payment</h2>
	                {{Form::open(['url'=> '', 'id'=>'paymentSelectionForm'])}}
	                {{Form::hidden('subtotal', $subTotal )}}
	                {{Form::hidden('delivery_location', $deliveryLocation )}}
	                {{Form::hidden('delivery_charge', $deliveryCharge )}}
	                {{Form::hidden('grand_total', $grandTotal )}}
	                <div class="pannel-payment-option">
	                  <div class="ipay payment-img">
	                    <div class="dummy"></div>
	                    <div class="payment_image">
		                    <label>
						    	<input type="radio" name="payment_method" value="ipay" disabled />
						    	<span class="payimage"><img src="{{asset('images/ipay.png')}}"></span>
						  	</label>
	                    </div>
	                  </div>
	                  <!--
	                  <div class="esewa payment-img">
	                    <div class="dummy"></div>
	                    <div class="payment_image">
	                    	<label>
						    	<input type="radio" name="payment_method" value="esewa" checked disabled />
						    	<span class="payimage"><img src="{{asset('images/e-sewa.png')}}"></span>
						  	</label>
	                    </div>
	                  </div> -->
	                </div>
	                {{Form::close()}}
	              </div><!--pannel body end-->

	            </div>

	        </div>

      	</div>
      
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="cart-confirm gray-bg">
          <h2>cart sumarry</h2>
          <div class="cart_sumarry">
            <div class="cart-item">
              <span class="pull-left">shoping item<em>({{$countItems}})</em></span>
              <span class="pull-right">NPR<em>{{$subTotal}}</em></span>
            </div>

            <div class="charge">
              <span class="pull-left">delivery charge<em>{{$deliveryLocation}}</em></span>
              <span class="pull-right">NPR<em>{{$deliveryCharge}}</em></span>
            </div>
          </div>

          <div class="cart-total">
            <span class="pull-left">total</span>
            <span class="pull-right">NPR<em>{{$grandTotal}}</em></span>
          </div>

          <div class="cart-order-btn">

	         <form name="form-ipay" id="form-ipay" method="POST" action="{{env('IPAY_ACTION', '')}}" >             
	          	<input name="OrderNo" type="hidden" value="">             
	          	<input name="MerchantId" type="hidden" value="{{env('MERCHANTID', '')}}">             
	          	<input name="Description" type="hidden" value="Service ID, Service Type, Service Details">             
	          	<input name="ReturnUrl" type="hidden" value="">             
	          	<input name="CurrencyCode" type="hidden" value="NPR">             
	          	<input name="customer_email" type="hidden" value="">             
	          	<input name="ErrorUrl" type="hidden" value="{{url('payment/cancel')}}">             
	          	{{-- <input name="Amount" type="hidden" value="0.1">                     --}}
	          	<input name="Amount" type="hidden" value="{{$grandTotal}}">                    
	          	<input name="Session_Key" type="hidden" value="">         
	         </form>

            <button type="button" class="btn btn-primary bigwidth open-door placeOrder disabled">Place Order</button>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection

@section('after-scripts')
<script>
	$(window).on('scroll', function(){
        //You've scrolled this much:
        if ($(window).scrollTop() >= '208') {
            $('.cart-confirm').addClass('is-fixed');
        }else{
            $('.cart-confirm').removeClass('is-fixed');
        }
    });
</script>
@endsection