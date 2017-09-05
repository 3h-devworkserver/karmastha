@extends('frontend.layouts.app')

<?php use App\Models\Product\Product; ?>
@section('title')
Shopping Cart @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')

<section class="shopping-cart">
  <div class="container">

  @if(count($cartItems) > 0)

    <div class="message">
      @if (session()->get('flash_delete'))
            @if(is_array(json_decode(session()->get('flash_delete'), true)))
                {!! implode('', session()->get('flash_delete')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_delete') !!}
            @endif
            <?php  session()->forget('flash_delete')  ?>
      @endif
    </div>
    <div class="qty-update">
      @if (session()->get('success_qty_update'))
        <div class="alert alert-success">
            @if(is_array(json_decode(session()->get('success_qty_update'), true)))
                {!! implode('', session()->get('success_qty_update')->all(':message<br/>')) !!}
            @else
                {!! session()->get('success_qty_update') !!}
            @endif
            <?php  session()->forget('success_qty_update')  ?>
        </div>
      @endif
    </div>

      <div class="row">
        
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="cart-review">
            @if(Auth::check())

              @foreach($cartItems as $cartItem)
                  <?php
                      $stock = '';
                      $product = \App\Models\Product\Product::findOrFail($cartItem->product_id); 
                      $productAttrCombination = \App\Models\Product\ProductAttrCombination::where('identifier', $cartItem->identifier)->first(); 
                  ?>
                  <div class="cart-review-content gray-bg">
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

                          {{Form::open(['url' => 'cart/updateqty/'.$cartItem->id, 'method'=>'patch'])}}
                          <div class="cart-qty fix-width">
                            <div class="sin-plus-minus cart-size clearfix">
                              <h6>quantity:</h6>
                              <div class="qty-section">                   
                                <div>
                                          @if($product->productInventory->manage_stock == 1)
                                              
                                              @if(!empty($productAttrCombination))
                                                  @if ($product->productInventory->availability == 'in stock') 
                                                      @if ($productAttrCombination->quantity == 0)
                                                          <?php $stock = 'out of stock'; ?>
                                                          <span class="outOfStock">{{$stock}}</span>
                                                          {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                                      @else
                                                        <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                                          {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                        <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                                          {{-- alert('product combination available'); --}}
                                                      @endif
                                                  @else
                                                      <?php $stock = 'out of stock'; ?>
                                                      <span class="outOfStock">{{$stock}}</span>
                                                      {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                                      {{-- alert('product combination not available'); --}}
                                                  @endif
                                              @else
                                                @if( count($product->productAttrCombination) > 0 )
                                                  <?php $stock = 'out of stock'; ?>
                                                      <span class="outOfStock">{{$stock}}</span>
                                                  {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                                @else
                                                  @if ($product->productInventory->availability != 'in stock') 
                                                      <?php $stock = 'out of stock'; ?>
                                                      <span class="outOfStock">{{$stock}}</span>
                                                  @else
                                                    <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                                    {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$product->productInventory->quantity, 'readonly'])}}
                                                    <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                                  @endif
                                                @endif
                                              @endif
                                              {{-- {{Form::text('qty', $cartItem->qty,['class'=>'cart-plus-minus-box quantity', 'min'=>"1", 'max'=>$product->productInventory->quantity, 'readonly'])}} --}}
                                          @else
                                            @if(!empty($productAttrCombination))
                                              <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                              @if($productAttrCombination->quantity == 0) 
                                                  {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                                  {{-- alert('product combination available unlimited'); --}}
                                              @else
                                                  {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                  {{-- alert('product combination available'); --}}
                                              @endif
                                              <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                              {{-- {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}} --}}
                                            @else
                                              @if( count($product->productAttrCombination) > 0 )
                                                <?php $stock = 'out of stock'; ?>
                                                      <span class="outOfStock">{{$stock}}</span>
                                                {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                              @else
                                                <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                                {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                                <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
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
                          </div>
                          {{Form::close()}}

                          <div class="sub-total fix-width">
                            <h6>total</h6>
                            @if($stock != 'out of stock')
                              <span>NPR<em>{{custom_number_format(floatval($cartItem->qty * productPrice($product->id) ))}}</em></span>
                            @endif
                          </div>
                        </div>
                      </div>
                      {{Form::open(['url'=>'/cart/removeitem/'.$cartItem->id, 'method'=>'get'])}}
                          <a type="button" href="#" class="bagde-remove submitConfirm" data-hash="{{$cartItem->id}}" ><i class="fa fa-times"></i></a>
                      {{Form::close()}}
                      {{-- <a type="button" href="#" class="bagde-remove" data-hash="{{$cartItem->id}}" ><i class="fa fa-times"></i></a> --}}
                  </div>
              @endforeach

            @else

              @foreach($cartItems as $cartItem)
                  <?php
                  $stock = '';
                      $product = \App\Models\Product\Product::findOrFail($cartItem->id); 
                  ?>
                  <div class="cart-review-content gray-bg">
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
                          @if(count($cartItem->attr_name) > 0)
                              <div class="productlist-info">
                              @foreach($cartItem->attr_name as $key=>$name)
                                  <span>{{$name}}:<em>{{$cartItem->attr_value[$key]}}</em></span>
                                  {{-- <span>Size:<em>M</em></span> --}}
                              @endforeach
                              </div>
                          @endif
                        </div>
                      </div>

                      <div class="col-xs-6">
                        <div class="cart-remark">
                          <div class="cart-price fix-width">
                            <h6>price</h6>
                            <span>NPR<em>{{$cartItem->price}}</em></span>
                          </div>

                          {{Form::open(['url' => 'cart/updateqty/'.$cartItem->getHash(), 'method'=>'patch'])}}
                          <div class="cart-qty fix-width">
                            <div class="sin-plus-minus cart-size clearfix">
                              <h6>quantity:</h6>
                              <div class="qty-section">                   
                                <div>
                                  <?php 
                                      $productAttrCombination = \App\Models\Product\ProductAttrCombination::where('identifier', $cartItem->attr_identifier)->first(); 
                                  ?>
                                  @if($product->productInventory->manage_stock == 1)
                                      @if(!empty($productAttrCombination))
                                          @if ($product->productInventory->availability == 'in stock') 
                                              @if ($productAttrCombination->quantity == 0)
                                                  <?php $stock = 'out of stock'; ?>
                                                  <span class="outOfStock">{{$stock}}</span>
                                                  {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                              @else
                                                <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                                  {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                  {{-- alert('product combination available'); --}}
                                                <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                              @endif
                                          @else
                                              <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                              {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                              {{-- alert('product combination not available'); --}}
                                          @endif
                                      @else
                                        @if( count($product->productAttrCombination) > 0 )
                                          <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                          {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                        @else
                                          @if ($product->productInventory->availability != 'in stock') 
                                              <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                          @else
                                            <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                            {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$product->productInventory->quantity, 'readonly'])}}
                                            <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                          @endif
                                        @endif
                                      @endif
                                      {{-- {{Form::text('qty', $cartItem->qty,['class'=>'cart-plus-minus-box quantity', 'min'=>"1", 'max'=>$product->productInventory->quantity, 'readonly'])}} --}}
                                  @else
                                    @if(!empty($productAttrCombination))
                                      <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                      @if($productAttrCombination->quantity == 0) 
                                          {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                          {{-- alert('product combination available unlimited'); --}}
                                      @else
                                          {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                          {{-- alert('product combination available'); --}}
                                      @endif
                                      <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                                    @else
                                      @if( count($product->productAttrCombination) > 0 )
                                        <?php $stock = 'out of stock'; ?>
                                              <span class="outOfStock">{{$stock}}</span>
                                        {{-- {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}} --}}
                                      @else
                                        <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                        {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                        <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
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
                              {{-- <div class="outOfStock @if( empty($stock) || $stock != 'out of stock') hide @endif">
                                Out of Stock
                              </div> --}}
                            </div>
                          </div>
                          {{Form::close()}}

                          <div class="sub-total fix-width">
                            <h6>total</h6>
                            @if($stock != 'out of stock')
                              <span>NPR<em>
                              {{custom_number_format(floatval($cartItem->qty * $cartItem->price ))}}</em></span>
                            @endif
                          </div>
                        </div>
                      </div>
                      {{Form::open(['url'=>'/cart/removeitem/'.$cartItem->getHash(), 'method'=>'get' ])}}
                          <a type="button" href="#" class="bagde-remove submitConfirm" data-hash="{{$cartItem->getHash()}}" ><i class="fa fa-times"></i></a>
                      {{Form::close()}}
                      {{-- <a type="button" href="#" class="bagde-remove" data-hash="{{$cartItem->getHash()}}" ><i class="fa fa-times"></i></a> --}}
                  </div>
              @endforeach

            @endif
            
              <div class="cart-btn">
              <!--
                  <div class="coupon-btn pull-left">
                    <button class="btn btn-default"><img src="assets/images/coupon.png">coupon code<i class="fa fa-long-arrow-right"></i></button>
                  </div>  -->
                  <div class="update_shopping pull-right">
                    <div class="sub-total-sumarry">
                      <a href="{{url('/')}}" class="btn btn-default">continue shopping</a>
                      <!-- <a href="#" class="btn btn-default">update cart</a>  -->
                    </div>
                    <div class="text-right">
                      <div class="right-grand-total">
                        <div class="sumarry-total cart-totals">
                          <span class="pull-left">sub total</span>
                          <span class="grandprice subTotal" data-subtotal="{{CartItemsSubTotalPrice()}}">NPR <em>{{CartItemsSubTotalPrice()}}</em></span>
                        </div>
                        <div class="total-calculate cart-totals">
                          <span class="pull-left"><a type="button" href="javascript:void(0)" onclick="return menuslidedown();">calculate Delivery Charge<i class="fa fa-angle-down"></i></a></span>
                          <div class="" id="billingopt">
                            <div class="box">
                              {{-- <form method="post" action=""> --}}

                                {{-- <div class="content">
                                  <div class="form-group">
                                    <select class="form-control" id="country">
                                      <option value="germany">kathmandu valley(inside ring road)</option>
                                      <option value="austria">Österreich</option>
                                      <option value="swiss">Schweiz</option>
                                      <option value="usa">USA</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" id="country">
                                      <option value="germany">Deutschland</option>
                                      <option value="austria">Österreich</option>
                                      <option value="swiss">Schweiz</option>
                                      <option value="usa">USA</option>
                                    </select>
                                  </div>
                                </div>  --}}

                                <div class="content">
                                  <div class="form-group">
                                    <select class="form-control" id="shipping">
                                      <option value="ktm-in">kathmandu (inside ring road)</option>
                                      <option value="ktm-out">kathmandu (outside ring road)</option>
                                      <option value="ltp-in">lalitpur (inside ring road)</option>
                                      <option value="ltp-out">lalitpur (outside ring road)</option>
                                      <option value="bkp">Bhaktapur</option>
                                    </select>
                                  </div>
                                  {{-- <div class="form-group">
                                    <select class="form-control" id="country">
                                      <option value="germany">Deutschland</option>
                                      <option value="austria">Österreich</option>
                                      <option value="swiss">Schweiz</option>
                                      <option value="usa">USA</option>
                                    </select>
                                  </div> --}}
                                </div> 



                              {{-- </form> --}}
                            </div>
                            <div class="shipping-table-info">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>services</th>
                                    <th>delivery</th>
                                    <th>cost</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>standard delivery</td>
                                    <td>2 days(s)</td>
                                    <td class="cost">NPR 50</td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="grand-total cart-totals">
                        <span>total:</span>
                        {{-- <span class="grandprice">NPR <em>{{LaraCart::total()}}</em></span> --}}
                        {{-- <span class="grandprice total">NPR <em>{{CartItemsSubTotalPrice()}}</em></span> --}}
                        <span class="grandprice total">NPR <em></em></span>
                      </div>
                      <div class="checkout-btn ">
                        <button class="btn btn-primary bigwidth open-door">proceed to checkout</button>
                      </div>

                    </div><!-- End text-right -->

                  </div>
              </div>

          </div>

        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="cart-confirm gray-bg">
            <h2>cart sumarry<span>({{countCartItems()}} items)</span></h2>
            <div class="cart-total">
              <span class="pull-left">total</span>
              {{-- <span class="pull-right">NPR <em>{{LaraCart::total()}}</em></span> --}}
              {{-- <span class="pull-right total">NPR <em>{{CartItemsSubTotalPrice()}}</em></span> --}}
              <span class="pull-right total">NPR <em></em></span>
            </div>

            <div class="cart-order-btn">
              <button type="submit" class="btn btn-primary bigwidth open-door">Proceed to checkout</button>
            </div>
            <div class="cart-logo-dis">
              <div class="cart-logo">
                @if(!empty($setting->logo2))
                  <img src="{{asset('images/logo/'. $setting->logo2)}}">
                @endif
                <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit aliquet.<a href="#">[read more]</a></p>
              </div>
            </div>
            
            <div class="cart-info accordion">
              <h2>cart info</h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                           <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collapsible Group Item #1
                      </a>
                    </h4>

                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.le VHS.</div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingTwo">
                           <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                      </a>
                    </h4>

                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                      </div>
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingThree">
                           <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                      </a>
                    </h4>

                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                      </div>
                  </div>
              </div>

            </div>

          </div>
        </div>

      </div>
  @else
    <p>Cart Empty</p>
  @endif
  </div>
</section>

@endsection