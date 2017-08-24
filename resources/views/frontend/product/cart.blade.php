@extends('frontend.layouts.app')

<?php use App\Models\Product\Product; ?>
@section('title')
Shopping Cart @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')

<section class="shopping-cart">
  <div class="container">

  <div class="message"></div>
  <div class="qty-update">
    @if (session()->get('success_qty_update'))
      <div class="alert alert-success">
          @if(is_array(json_decode(session()->get('flash_success'), true)))
              {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
          @else
              {!! session()->get('flash_success') !!}
          @endif
      </div>
    @endif
  </div>

    <div class="row">
      
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="cart-review">
          @if(Auth::check())

            @foreach($cartItems as $cartItem)
                <?php
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
                        <span>Seller:<em>kathmandu_official_store</em></span>
                        @if(count($productAttrCombination) > 0)
                          @if(count($productAttrCombination->productAttrCombinationValue) > 0)
                            <div class="productlist-info">
                            @foreach($productAttrCombination->productAttrCombinationValue as $key=>$comb)
                                <span>{{$comb->atrributeVal->attribute->name}}:<em>{$comb->atrributeVal->value}}</em></span>
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
                          <span>NPR<em>{{productPrice($product->id)}}</em></span>
                        </div>

                        {{Form::open(['url' => 'cart/updateqty/'.$productAttrCombination->id, 'method'=>'patch'])}}
                        <div class="cart-qty fix-width">
                          <div class="sin-plus-minus cart-size clearfix">
                            <h6>quantity:</h6>
                            <div class="qty-section">                   
                              <div>
                                    <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                        @if($product->productInventory->manage_stock == 1)
                                            
                                            @if(!empty($productAttrCombination))
                                                @if ($product->productInventory->availability == 'in stock') 
                                                    @if ($productAttrCombination->quantity == 0)
                                                        {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                                    @else
                                                        {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                        {{-- alert('product combination available'); --}}
                                                    @endif
                                                @else
                                                    {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                                    {{-- alert('product combination not available'); --}}
                                                @endif
                                            @else
                                                {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                            @endif
                                            {{-- {{Form::text('qty', $cartItem->qty,['class'=>'cart-plus-minus-box quantity', 'min'=>"1", 'max'=>$product->productInventory->quantity, 'readonly'])}} --}}
                                        @else
                                            @if($productAttrCombination->quantity == 0) 
                                                {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                                {{-- alert('product combination available unlimited'); --}}
                                            @else
                                                {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                {{-- alert('product combination available'); --}}
                                            @endif
                                            {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                        @endif
                                            {{-- <input value="1" /> --}}
                                    <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                              </div>    
                            </div> 
                             <div class="update-qty hide">
                                <a href="javascript:void(0)" class="submit">Update</a>
                            </div>       
                                
                          </div>
                        </div>
                        {{Form::close()}}

                        <div class="sub-total fix-width">
                          <h6>total</h6>
                          <span>NPR<em>{{custom_number_format(floatval($cartItem->qty * productPrice($product->id) ))}}</em></span>
                        </div>
                      </div>
                    </div>
                    <a type="button" href="#" class="bagde-remove" data-hash="" ><i class="fa fa-times"></i></a>
                </div>
            @endforeach

          @else

            @foreach($cartItems as $cartItem)
                <?php
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
                        <span>Seller:<em>kathmandu_official_store</em></span>
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
                                    <div class="btn-minus"><i class="fa fa-angle-down qty-input"></i></div>
                                        @if($product->productInventory->manage_stock == 1)
                                            <?php 
                                                $productAttrCombination = \App\Models\Product\ProductAttrCombination::where('identifier', $cartItem->attr_identifier)->first(); 
                                            ?>
                                            @if(!empty($productAttrCombination))
                                                @if ($product->productInventory->availability == 'in stock') 
                                                    @if ($productAttrCombination->quantity == 0)
                                                        {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                                    @else
                                                        {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                        {{-- alert('product combination available'); --}}
                                                    @endif
                                                @else
                                                    {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                                    {{-- alert('product combination not available'); --}}
                                                @endif
                                            @else
                                                {{Form::text('qty', 0 ,['class'=>'cart-plus-minus-box quantity', 'min'=>'0', 'max'=>'0', 'readonly'])}}
                                            @endif
                                            {{-- {{Form::text('qty', $cartItem->qty,['class'=>'cart-plus-minus-box quantity', 'min'=>"1", 'max'=>$product->productInventory->quantity, 'readonly'])}} --}}
                                        @else
                                            @if($productAttrCombination->quantity == 0) 
                                                {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                                {{-- alert('product combination available unlimited'); --}}
                                            @else
                                                {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>$productAttrCombination->quantity, 'readonly'])}}
                                                {{-- alert('product combination available'); --}}
                                            @endif
                                            {{Form::text('qty', $cartItem->qty ,['class'=>'cart-plus-minus-box quantity', 'min'=>'1', 'max'=>'99999999', 'readonly'])}}
                                        @endif
                                            {{-- <input value="1" /> --}}
                                    <div class="btn-plus"><i class="fa fa-angle-up qty-input"></i></div>
                              </div>    
                            </div> 
                             <div class="update-qty hide">
                                <a href="javascript:void(0)" class="submit">Update</a>
                            </div>       
                                
                          </div>
                        </div>
                        {{Form::close()}}

                        <div class="sub-total fix-width">
                          <h6>total</h6>
                          <span>NPR<em>{{custom_number_format(floatval($cartItem->qty * $cartItem->price ))}}</em></span>
                        </div>
                      </div>
                    </div>
                    <a type="button" href="#" class="bagde-remove" data-hash="{{$cartItem->getHash()}}" ><i class="fa fa-times"></i></a>
                </div>
            @endforeach

          @endif
          
            <div class="cart-btn">
                <div class="coupon-btn pull-left">
                  <button class="btn btn-default"><img src="assets/images/coupon.png">coupon code<i class="fa fa-long-arrow-right"></i></button>
                </div>
                <div class="update_shopping pull-right">
                  <div class="sub-total-sumarry">
                    <a href="{{url('/')}}" class="btn btn-default">continue shopping</a>
                    <a href="#" class="btn btn-default">update cart</a>
                  </div>
                  <div class="text-right">
                    <div class="right-grand-total">
                      <div class="sumarry-total cart-totals">
                        <span class="pull-left">sub total</span>
                        <span class="grandprice">NPR <em>{{LaraCart::subTotal()}}</em></span>
                      </div>
                      <div class="total-calculate cart-totals">
                        <span class="pull-left"><a type="button" href="#01" onclick="return menuslidedown();">calculate shipping<i class="fa fa-angle-down"></i></a></span>
                        <div class="collapse" id="billingopt">
                          <div class="box">
                            <form method="post" action="">

                              <div class="content">
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
                              </div> 

                            </form>
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
                                  <td>rs.50</td>
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
                      <span class="grandprice">NPR <em>{{LaraCart::total()}}</em></span>
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
          <h2>cart sumarry<span>(2 item)</span></h2>
          <div class="cart-total">
            <span class="pull-left">total</span>
            <span class="pull-right">NPR <em>{{LaraCart::total()}}</em></span>
          </div>

          <div class="cart-order-btn">
            <button type="submit" class="btn btn-primary bigwidth open-door">Proceed to checkout</button>
          </div>
          <div class="cart-logo-dis">
            <div class="cart-logo">
              <img src="assets/images/cart-logo.png">
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
  </div>
</section>

@endsection