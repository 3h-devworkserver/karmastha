@extends('frontend.layouts.app')

<?php use App\Models\Product\Product; ?>
@section('title')
Shopping Cart @if(!empty($setting->tagline))|| {{$setting->tagline}}@endif
@endsection

@section('content')

    <div class="container">
            <div class="row">
                <div class="table-responsive cart_info col-md-12 col-sm-12">

                    @if(Auth::check())
                                
                        <?php $i = 0;?>
                            @foreach($cartItems as $cartItem)
                                <?php $product = Product::findOrFail($cartItem->product_id);
                                ?>
                                <div class="cart-info">
                                    <div class="table_header mdk10">
                                        <div class="pull-left">
                                            <div class="pull-left sel_info_row">Seller</div>
                                            <div class="pull-left sel_info_row">
                                               <span class="mbg-l" role="presentation"><a class="mbg-id" href="#">Pdonline</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-left table-body col-md-12 col-sm-12">
                                        <div class="row">
                                            <div id="pdonline-itemGroup1" class="">
                                                <div id="pdonline-itemGroup1-item1">
                                                    <div class="cart_product pull-left">
                                                        <a href="{{url('/product/'.$product->slug)}}" target="_blank">
                                                            <img src="{{asset('images/product/'.$product->id.'/thumbnail/'.$product->productThumbnailImage[0]->image)}}" alt="{{$product->name}}">
                                                        </a>
                                                    </div>
                                                    <div class="pull-left cart_description">
                                                        <div class="col-md-6 infocolcart">
                                                            <div class="mdk5 infocart_des">
                                                                <span id="product_title"><a href="#">{{$product->name}}</a></span>
                                                            </div>
                                                            <div class="table">
                                                                <table class="ItemInfoTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Price:</td>
                                                                            <td class="keydesc">NPR {{custom_number_format(productPrice($product->id))}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>QTY:</td>
                                                                            <td class="keydesc">{{$cartItem->qty}}</td>
                                                                        </tr>

                                                                        @if(!empty($cartItem->attributes))
                                                                            @foreach($cartItem->attributes as $attr)
                                                                                <tr>
                                                                                    <td>{{$attr->attr_name}}:</td>
                                                                                    <td class="keydesc">{{$attr->attr_value}}</td>
                                                                                </tr>
                                                                            @endforeach

                                                                        @endif
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 qtyColWrapper">
                                                            <div class="qtyRow">
                                                                <div class="qty-box pull-left">
                                                                    <label class="quantity" for="quantity">Quantity</label>
                                                                    {{Form::open(['url' => 'cart/updateqty/'.$cartItem->id, 'method'=>'patch'])}}
                                                                        <input name="qty" class="qtyTextBox" type="number" value="{{$cartItem['qty']}}" maxlength="5" role="textbox" min="1" max="{{$product->productInventory->quantity}}">
                                                                        <div class="update-qty hide">
                                                                            <a href="javascript:void(0)" class="submit">Update</a>
                                                                        </div>
                                                                    {{Form::close()}}
                                                                </div>
                                
                                                                <div class="price">NPR {{custom_number_format(floatval(productPrice($product->id) * $cartItem['qty']))}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="addndelete">
                                                    <div class="pull-right">
                                                        <a class="action actionLink" href="{{url('cart/removeitem/'.$cartItem->id)}}">Remove</a>
                                                        <!--
                                                        <a class="action" id="save-later" href="#">Save for later</a>  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach


                    @else
                        @if(!empty($cartItems))
                            <?php $i = 0; ?>
                            @foreach($cartItems as $cartItem)
                                <?php $product = \App\Models\Product\Product::findOrFail($cartItem['productId']); 
                                ?>
                                <div class="cart-info">
                                    <div class="table_header mdk10">
                                        <div class="pull-left">
                                            <div class="pull-left sel_info_row">Seller</div>
                                            <div class="pull-left sel_info_row">
                                               <span class="mbg-l" role="presentation"><a class="mbg-id" href="#">Pdonline</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-left table-body col-md-12 col-sm-12">
                                        <div class="row">
                                            <div id="pdonline-itemGroup1" class="">
                                                <div id="pdonline-itemGroup1-item1">
                                                    <div class="cart_product pull-left">
                                                        <a href="{{url('/product/'.$product->slug)}}" target="_blank">
                                                            <img src="{{asset('images/product/'.$cartItem['productId'].'/thumbnail/'.$cartItem['img'])}}" alt="{{$product->name}}">
                                                        </a>
                                                    </div>
                                                    <div class="pull-left cart_description">
                                                        <div class="col-md-6 infocolcart">
                                                            <div class="mdk5 infocart_des">
                                                                <span id="product_title"><a href="#">{{$product->name}}</a></span>
                                                            </div>
                                                            <div class="table">
                                                                <table class="ItemInfoTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Price:</td>
                                                                            <td class="keydesc">NPR {{custom_number_format(productPrice($cartItem['productId']))}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>QTY:</td>
                                                                            <td class="keydesc">{{$cartItem['qty']}}</td>
                                                                        </tr>
                                                                        @if(is_array($cartItem['attributes']))
                                                                        @foreach($cartItem['attributes'] as $key => $attr)
                                                                            @foreach($attr as $key => $val)
                                                                            <tr>
                                                                                <td>{{$key}}:</td>
                                                                                <td class="keydesc">{{$val}}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        {{-- <tr>
                                                                            <td>Size:</td>
                                                                            <td class="keydesc">M</td>
                                                                        </tr> --}}
                                                                        @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 qtyColWrapper">
                                                            <div class="qtyRow">
                                                                <div class="qty-box pull-left">
                                                                    <label class="quantity" for="quantity">Quantity</label>


                                                                    {{Form::open(['url' => 'cart/updateqty/'.$i, 'method'=>'patch'])}}
                                                                        <input name="qty" class="qtyTextBox" type="number" value="{{$cartItem['qty']}}" maxlength="5" role="textbox" min="1" max="{{$product->productInventory->quantity}}">
                                                                        <div class="update-qty hide">
                                                                            <a href="javascript:void(0)" class="submit">Update</a>
                                                                        </div>
                                                                    {{Form::close()}}




                                                                    {{-- <input class="qtyTextBox" type="number" value="{{$cartItem['qty']}}" maxlength="5" role="textbox" min="1" max="{{$product->productInventory->quantity}}"> --}}
                                                                </div>
                                                                <div class="price">NPR {{custom_number_format(floatval(productPrice($cartItem['productId']) * $cartItem['qty']))}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="addndelete">
                                                    <div class="pull-right">
                                                        <a class="action actionLink" href="{{url('cart/removeitem/'.$i)}}">Remove</a>
                                                        <!--
                                                        <a class="action" id="save-later" href="#">Save for later</a>  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        @else
                            <p>Cart Empty</p>
                        @endif

                    @endif

                    @if(!empty($cartItems))
                        <div id="CartSummary" class="col-md-7 col-sm-7 col-xs-12 pull-right">
                            <div id="asynccartsummary" class="text-right">
                                <div class="cart_total">
                                    <table class="pull-right ralign cartSummaryTable">
                                        <tbody>
                                            <tr>
                                                <td width="350px">
                                                    <div class="text-right">Subtotal ({{countCartItems()}} item):</div>
                                                </td>
                                                <td>
                                                    <div class="nowrap">NPR {{CartItemsTotalPrice()}}</div>
                                                </td>
                                            </tr>
                                            <!--
                                            <tr>
                                                <td width="350px"><div class="tr"><span>
                                                    Posting to <a id="guestZipLink" href="#">NP</a></span></div>
                                                </td>                                                 <td>
                                                    <div class="text-right nowrap"><a id="guestCartcalcLink" href="#">Calculate</a></div>
                                                </td>
                                            </tr>  -->

                                            <tr>
                                                <td colspan="2">
                                                    <div class="sumSep mt5"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" width="350px">
                                                    <div class="text-right fw-b">Total: </div>
                                                </td>
                                                <td class="nowrap ">
                                                    <div class="text-right normal fw-b" id="asyncTotal">NPR {{CartItemsTotalPrice()}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="sumSep mt5"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class=" col_100p tr mb10 mt10 clearfix">
                                    <div class="pull-right ralign">        
                                        <a id="ptcBtnBottom" class="btn btn-primary open-door" href="{{url('/checkout')}}" target="" role="button">Proceed to checkout</a>
                                    </div>
                                    <div class="pull-right ralign">
                                        <a id="contShoppingBtn" class="btn btn-default" href="{{url('/')}}" target="">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> 

@endsection