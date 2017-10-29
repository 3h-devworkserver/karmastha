<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cartitem\Cartitem;
use App\Models\Product\Product;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\Payment;
use App\Models\Zone;
use App\Models\District;
use Auth;
use Illuminate\Http\Request;
use Session;
use DB;
use LaraCart;
use Mail;
    
/**
 * Class ProductController.
 */
class ProductController extends Controller
{

	public function __construct(){
       parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showProductDetail($slug){
    	// return $slug;

        $product = Product::where('slug', $slug)->where('status', 1)->first();
        if (empty($product)) {
            abort(404);
        }

        $test = DB::table('products')->where('products.id', $product->id)
                ->join('product_attr_combination', 'products.id', '=', 'product_attr_combination.product_id')
                ->join('product_attr_combination_value', 'product_attr_combination.id', '=', 'product_attr_combination_value.product_attr_combination_id')
                ->join('attribute_values', 'product_attr_combination_value.attribute_value_id', '=', 'attribute_values.id')
                ->join('attributes', 'attribute_values.attribute_id', '=', 'attributes.id');
        // $test = $product->join('product_attr_combination', 'products.id', '=', 'product_attr_combination.product_id')
                // ->select('products.id', 'product_attr_combination.identifier', 'product_attr_combination.quantity', 'product_attr_combination_value.attribute_value_id', 'attribute_values.value', 'attribute_values.attribute_id', 'attributes.name', 'attributes.attr_type')


                $tmp = $test->select('attributes.name', 'attributes.id', 'attributes.attr_type', 'attributes.short_desc', 'attributes.short_desc_title')
                ->groupBy('attributes.name', 'attributes.id', 'attributes.attr_type', 'attributes.short_desc', 'attributes.short_desc_title')
                ->get();

                $tmp2 = $test->select('attribute_values.id', 'attribute_values.attribute_id', 'attribute_values.value')
                // ->orderBy('product_attr_combination_value.id')
                ->groupBy('attribute_values.id', 'attribute_values.attribute_id', 'attribute_values.value')
                ->get();
                // return $tmp2;

                // return $product->productAttrCombination[0]->productAttrCombinationValue;
                
        // var_dump($tmp);
        // echo "<pre>";
        // var_dump($tmp2);
                // foreach ($tmp as $key => $tm) {
                //     echo $tm->name;
                // }
                // echo count($tmp);
                // die();
        // dd($tmp[0]);
        // return ($tmp2);

        // $arrId = array();
        // $arrName = array();
        // if (count($product->productAttrCombination) > 0) {
        //     foreach ($product->productAttrCombination as $comb) {
        //         foreach ($comb->productAttrCombinationValue as $key => $combValue) {
        //             $tmp = $combValue->atrributeVal->attribute->id;
        //             $tmp2 = $combValue->atrributeVal->attribute->name;
        //             if (!in_array($tmp, $arrId)) {
        //                 $arrId[]=$tmp;
        //             }
        //             if (!in_array($tmp2, $arrName)) {
        //                 $arrName[]=$tmp2;
        //             }
        //         }
        //     }
        // }
        
        // return $arrId;
        // return $arrName;

        if(empty($product)){
    		abort(404);
    	}
        $product->increaseView();
        $baseImage = $product->productBaseImage;
        if ($product->slug == 'mobile') {
            return view('frontend.product.productdetailbooking', compact('product', 'baseImage', 'tmp', 'tmp2'))->withClass('inner-page product-detail-page');
        }else{
            return view('frontend.product.productdetail', compact('product', 'baseImage', 'tmp', 'tmp2'))->withClass('inner-page product-detail-page');
        }
    }

     /**
     * Get product quantity specific to its attribute combination
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getQuantity(Request $request){

        $product = Product::findOrFail($request->productid);

        $string = '';
        if(count($request->values) > 0){
            $arr = $request->values;
            sort($arr);
            $string = implode(',', $arr);
        }

        $table = DB::table('products')->where('products.id', $product->id)
                ->join('product_inventory', 'products.id', '=', 'product_inventory.product_id')
                ->join('product_attr_combination', 'products.id', '=', 'product_attr_combination.product_id')
                ->join('product_attr_combination_value', 'product_attr_combination.id', '=', 'product_attr_combination_value.product_attr_combination_id')
                ->where('product_attr_combination.combination', $string);
                
        $rows = $table->select('products.id', 'products.name', 'product_inventory.manage_stock', 'product_inventory.availability', 'product_attr_combination.identifier', 'product_attr_combination.quantity')
                ->groupBy('products.id', 'products.name', 'product_inventory.manage_stock', 'product_inventory.availability', 'product_attr_combination.identifier', 'product_attr_combination.quantity')
                // ->toSql();
                ->get();

        $data = [];
        if (count($rows) != 0) {
            return response()->json(['stat'=> 'success', 'values'=>$rows]);
        }else{
            return response()->json(['stat'=> 'error', 'values'=>'']);
        }
    }



    /**
     * Product action form product detail page eg: add to cart, preorder
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ProductAction(Request $request){
        // return $request->all();
        // dd(Session::all());
        if ($request->action=='addToCart' || $request->action=='') {
            return $this->addToCart($request);
        }
    }   

    /**
     * Adding product to cart
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request){

        $product = Product::findOrFail($request->product);

        if (Auth::check()) {
            $cartItem = Cartitem::where('user_id', Auth::user()->id)->where('product_id',$request->product)->where('identifier', $request->attr_identifier)->first();
            if (!empty($cartItem) ) {
                $cartItem->qty += (int)$request->qty;
                $cartItem ->save();
            }else{
                Cartitem::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product,
                    'identifier' => $request->attr_identifier,
                    'qty' => (int)$request->qty,
                ]);
            }
            
        }else{
            // Adding an item to the cart
            $item = LaraCart::add($request->product, $product->name, (int)$request->qty, $product->productPrice->price, [
                'attr_name' => $request->attr_name,
                'attr_value' => $request->attr_value,
                'attr_value_id' => $request->attr,
                'attr_identifier' => $request->attr_identifier,
            ]);
        }

        // foreach($items = LaraCart::getItems() as $item) {
        //     // echo "<pre>"; dd($item);
        // }
// return $items;

        // if (Auth::check()) {
        //     $cartItems = Cartitem::where('product_id',$request->product )->get();

        //     if(!empty($cartItems)){
        //         $mainCheck = 0;
        //         foreach($cartItems as $cartItem){
        //             $attributes = $cartItem->attributes;
        //             if (!empty($attributes)) {
        //                 $check = 1;
        //                 foreach ($attributes as $key => $attr) {
        //                     $secondCheck = 0;
        //                     for ($i=0; $i < count($request->attr_name); $i++) {
        //                     // echo $i; 
        //                         // echo $attr->attr_name .'='.$request->attr_name[$i].' and'.$attr->attr_value.'='.$request->attr_val[$i];
        //                         if ($attr->attr_name == $request->attr_name[$i] && $attr->attr_value == $request->attr_val[$i] ) {
        //                             $secondCheck = 1;
        //                         }
        //                     // echo $secondCheck; 
        //                     }
        //                     if ($secondCheck == 0) {
        //                     // return $secondCheck;
        //                         $check = 0;
        //                         break;
        //                     }
        //                 }
        //                 // return $check;
        //                 if ($check == 1) {
        //                     $cartItem->qty += $request->qty;
        //                     $cartItem->save();
        //                     $mainCheck = 1;
        //                     break;
        //                 }
        //             }else{

        //             }
        //         }
        //         if($mainCheck == 0){
        //             $cartitem = Cartitem::create([
        //                 'product_id' => $request->product ,
        //                 'user_id' => Auth::user()->id,
        //                 'qty' =>$request->qty,
        //             ]);
        //             if (!empty($request->attr_name)) {
        //                 for ($i=0; $i < count($request->attr_name); $i++) { 
        //                     $cartitem->attributes()->create([
        //                         'attr_name'=>$request->attr_name[$i],
        //                         'attr_value'=>$request->attr_val[$i],
        //                     ]);
        //                 }
        //             }
        //         }
        //     }else{
        //         $cartitem = Cartitem::create([
        //             'product_id' => $request->product ,
        //             'user_id' => Auth::user()->id,
        //             'qty' =>$request->qty,
        //         ]);
        //         if (!empty($request->attr_name)) {
        //             for ($i=0; $i < count($request->attr_name); $i++) { 
        //                 $cartitem->attributes()->create([
        //                     'attr_name'=>$request->attr_name[$i],
        //                     'attr_value'=>$request->attr_val[$i],
        //                 ]);
        //             }
        //         }
        //     }
        // }else{

        //     // $cartItems = array();
        //     $cartItems = (Session::has('cart')) ? Session::get('cart') : array();
        //     // dd($cartItems);

        //     $attrArray = '';
        //     for ($i=0; $i < count($request->attr_name) ; $i++) { 
        //         $attrArray[] = [$request->attr_name[$i]=>$request->attr_val[$i]];
        //     }

        //     $cartItems2 = array();
        //     $check = 0;
        //     foreach ($cartItems as $key => $value) {
        //         if($value['productId'] == $request->product ){
        //             if ($value['attributes'] == $attrArray) {
        //                 $value['qty'] += $request->qty;
        //                 $check = 1;
        //             }
        //         }
        //         array_push($cartItems2,$value);
        //     }
        //     if ($check == 0) {
        //         $newItem = [
        //                 'productId'=>$request->product,
        //                 'qty'=>$request->qty,
        //                 'img'=>$product->productThumbnailImage[0]->image,
        //                 // 'price'=>$price,
        //                 // 'totalPrice'=>$price*$request->qty,
        //                 'attributes' =>$attrArray,
        //                 ];
        //         array_push($cartItems2,$newItem);
        //     }
        //     Session::flush();
        //     Session::put('cart', $cartItems2);
        //     $request->session()->save(); 

        // }

        

     

        // dd(Session::all());

        return redirect()->route('frontend.cart.view');
    }

    /**
     * View Cart
     * @return \Illuminate\Http\Response
     */
    public function viewCart(){
        if (Auth::check()) {
            $cartItems = Cartitem::where('user_id', Auth::user()->id)->get();
        }
        else {
            $cartItems = LaraCart::getItems();
        }

        if( count($cartItems) > 0 ){
            return view('frontend.product.cart', compact('cartItems'))->withClass('inner-page cart-page');
        }else{
            return view('frontend.product.cart', compact('cartItems'))->withClass('inner-page empty-cart-page');
        }
    }

     /**
     * remove product from cart
     * @return \Illuminate\Http\Response
     */
    public function removeCartItem($index, Request $request){
        if (Auth::check()) {
            try {
                $cartItem = Cartitem::findOrFail($index);
                $check = $cartItem->delete();
                if($check){
                    return redirect('cart')->withFlashDelete('<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>');
                    
                    // return response()->json(['stat'=> 'success', 'msg'=> '<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>']);
                }
                return redirect('cart')->withFlashDelete('<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>');

                // return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>']);
            } catch (Exception $e) {
               return redirect('cart')->withFlashDelete('<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' .'</span></div>');
            }
            
        }else{
            try {
                $cartItem = LaraCart::find(['itemHash' => $index]) ;
                if(empty($cartItem)){
                    return redirect('cart')->withFlashDelete('<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>');
                    // return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>']);
                }
                LaraCart::removeItem($index);
                    return redirect('cart')->withFlashDelete('<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>');
                    // return response()->json(['stat'=> 'success', 'msg'=> '<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>']);
            } catch (Exception $e) {
                return redirect('cart')->withFlashDelete('<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' .'</span></div>');
                // return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' .'</span></div>']);
            }

            // $cartItems = Session::has('cart') ? Session::get('cart') : null;
            // if (!empty($cartItems)) {
            //     Session::forget('cart.'.$index);
            // }

            // $cartItems = Session::has('cart') ? Session::get('cart') : null;
            // $cartItems2 = array();
            // foreach ($cartItems as $key => $value) {
            //     array_push($cartItems2,$value);
            // }
            // Session::flush();
            // Session::put('cart', $cartItems2);
            // $request->session()->save();
        }
        // return redirect()->route('frontend.cart.view');
    }

    // public function removeCartItem($index, Request $request){
    //     if (Auth::check()) {
    //         try {
    //             $cartItem = Cartitem::findOrFail($index);
    //             $check = $cartItem->delete();
    //             if($check){
    //                 return response()->json(['stat'=> 'success', 'msg'=> '<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>']);
    //             }
    //             return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>']);
    //         } catch (Exception $e) {
    //             return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' .'</span></div>']);
    //         }
            
    //     }else{
    //         try {
    //             $cartItem = LaraCart::find(['itemHash' => $index]) ;
    //             if(empty($cartItem)){
    //             return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Item not found.' .'</span></div>']);
    //             }
    //             LaraCart::removeItem($index);
    //             return response()->json(['stat'=> 'success', 'msg'=> '<div class="alert alert-success"><span>'. '<i class="fa fa-check-circle" aria-hidden="true"></i> Item is removed from cart.' .'</span></div>']);
    //         } catch (Exception $e) {
    //             return response()->json(['stat'=> 'failed', 'msg'=> '<div class="alert alert-danger"><span>'. '<i class="fa fa-times-circle" aria-hidden="true"></i> Error occurred.' .'</span></div>']);
    //         }

    //         // $cartItems = Session::has('cart') ? Session::get('cart') : null;
    //         // if (!empty($cartItems)) {
    //         //     Session::forget('cart.'.$index);
    //         // }

    //         // $cartItems = Session::has('cart') ? Session::get('cart') : null;
    //         // $cartItems2 = array();
    //         // foreach ($cartItems as $key => $value) {
    //         //     array_push($cartItems2,$value);
    //         // }
    //         // Session::flush();
    //         // Session::put('cart', $cartItems2);
    //         // $request->session()->save();
    //     }
    //     // return redirect()->route('frontend.cart.view');
    // }

     /**
     * update product quantity from cart
     * @return \Illuminate\Http\Response
     */
    public function updateCartItemQty($index, Request $request){
        if (Auth::check()) {
            $cartItem = Cartitem::findOrFail($index);
            $cartItem->qty = $request->qty;
            $cartItem->save();
        }else{
            // dd( LaraCart::find(['itemHash' => $index]) );
            LaraCart::updateItem($index, 'qty', $request->qty);

            // $cartItems = Session::has('cart') ? Session::get('cart') : null;
            // $cartItems2 = array();
            // foreach ($cartItems as $key => $value) {
            //     if($key == $index ){
            //         $value['qty'] = $request->qty;
            //     }
            //     array_push($cartItems2,$value);
            // }
            // Session::flush();
            // Session::put('cart', $cartItems2);
            // $request->session()->save();

        }
        return redirect()->route('frontend.cart.view')->withSuccessQtyUpdate('Quantity updated.');
    }


    /**
     * checkout process
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request){
        $method = $request->method();

        if (!$request->isMethod('post')) {
            return redirect()->route('frontend.cart.view');
        }
        $subTotal = $request->subTotal;
        $deliveryCharge = $request->deliveryCharge;
        $grandTotal = $request->grandTotal;
        $deliveryLocation = $request->deliveryLocation;

        if ($deliveryLocation == 'ktm-in') {
            $deliveryLocation = 'kathmandu (inside ring road)';
        }else if ($deliveryLocation == 'ktm-out') {
            $deliveryLocation = 'kathmandu (outside ring road)';
        }else if ($deliveryLocation == 'ltp-in') {
            $deliveryLocation = 'lalitpur (inside ring road)';
        }else if ($deliveryLocation == 'ltp-out') {
            $deliveryLocation = 'lalitpur (outside ring road)';
        }else if ($deliveryLocation == 'bkp') {
            $deliveryLocation = 'Bhaktapur';
        }

        if (Auth::check()) {
            $cartItems = Cartitem::where('user_id', Auth::user()->id)->get();
            $user = Auth::user();
        }
        else {
            $cartItems = LaraCart::getItems();
            $user = '';
        }

        $zones= Zone::all()->pluck('zone_name', 'zone_id');
        $districts= District::all();

        if(!empty($cartItems)){
            return view('frontend.product.checkout', compact('cartItems', 'subTotal', 'deliveryCharge', 'grandTotal', 'deliveryLocation', 'user', 'zones', 'districts'))->withClass('inner-page cart-page');
        }
        // else{
        //     return view('frontend.product.cart', compact('cartItems'))->withClass('inner-page empty-cart-page');
        // }
        
        // return "checkout";

        // $cartItems = Session::has('cart') ? Session::get('cart') : null;
        // if (!empty($cartItems)) {
        //     Session::forget('cart.'.$index);
        // }
        // return redirect()->route('frontend.cart.view');
    }

     /**
     * checkout details
     * @return \Illuminate\Http\Response
     */
    public function checkoutDetails(Request $request){
        try {
            parse_str($request->billingDetail, $billingDetail);
            parse_str($request->shippingDetail, $shippingDetail);
            parse_str($request->paymentSelectionForm, $paymentSelectionForm);
            $sessionkey = str_random(10);
            $orderno = str_random(5);

            DB::transaction(function () use ($request,$billingDetail, $shippingDetail, $paymentSelectionForm, $sessionkey, $orderno) {
                $anotherShipping = $request->anotherShipping;

                // return $billingDetail;
                if ($anotherShipping == 'true') {
                    $purchase = Purchase::create([
                        'user_id' => Auth::user()->id,  
                        'session_key' => $sessionkey,  
                        'ordernumber' => $orderno,  

                        'fname' => $billingDetail['fname'],  
                        'lname' => $billingDetail['lname'],  
                        'zone' => $billingDetail['zone'],  
                        'district' => $billingDetail['district'],  
                        'city' => $billingDetail['city'],  
                        'st_address' => $billingDetail['st_address'],  
                        'st_address2' => $billingDetail['st_address2'],  
                        'phone' => $billingDetail['phone'],  
                        'email' => $billingDetail['email'], 

                        'diff_ship_address' => 1, 

                        'ship_fname' => $shippingDetail['ship_fname'],  
                        'ship_lname' => $shippingDetail['ship_lname'],  
                        'ship_zone' => $shippingDetail['ship_zone'],  
                        'ship_district' => $shippingDetail['ship_district'],  
                        'ship_city' => $shippingDetail['ship_city'],  
                        'ship_st_address' => $shippingDetail['ship_st_address'],  
                        'ship_st_address2' => $shippingDetail['ship_st_address2'],  
                        'ship_phone' => $shippingDetail['ship_phone'],  
                        'ship_email' => $shippingDetail['ship_email'],

                        'payment_method' => $paymentSelectionForm['payment_method'],
                        'subtotal' => $paymentSelectionForm['subtotal'],
                        'delivery_location' => $paymentSelectionForm['delivery_location'],
                        'delivery_charge' => $paymentSelectionForm['delivery_charge'],
                        'grand_total' => $paymentSelectionForm['grand_total'],
                    ]);
                }else{
                    $purchase = Purchase::create([
                        'user_id' => Auth::user()->id,  
                        'session_key' => $sessionkey,  
                        'ordernumber' => $orderno,

                        'fname' => $billingDetail['fname'],  
                        'lname' => $billingDetail['lname'],  
                        'zone' => $billingDetail['zone'],  
                        'district' => $billingDetail['district'],  
                        'city' => $billingDetail['city'],  
                        'st_address' => $billingDetail['st_address'],  
                        'st_address2' => $billingDetail['st_address2'],  
                        'phone' => $billingDetail['phone'],  
                        'email' => $billingDetail['email'], 

                        'diff_ship_address' => 0, 

                        'payment_method' => $paymentSelectionForm['payment_method'],
                        'subtotal' => $paymentSelectionForm['subtotal'],
                        'delivery_location' => $paymentSelectionForm['delivery_location'],
                        'delivery_charge' => $paymentSelectionForm['delivery_charge'],
                        'grand_total' => $paymentSelectionForm['grand_total'],
                    ]);
                }

                $cartIdsArray = explode(',', $billingDetail['cartIds']);
                foreach($cartIdsArray as $cartId){
                    $item = CartItem::findorFail($cartId);
                    $purchase->purchaseItems()->create([
                        'product_id' => $item->product_id,
                        'cartitem_id' => $item->id,
                        'identifier' => $item->identifier,                        
                        'qty' => $item->qty,               
                        'price' => productPrice($item->product_id),                
                    ]);
                }

            });
            
            // parse_str($request->paymentSelectionForm, $paymentSelectionForm);
            return response()->json(['stat'=> 'success', 
                                    'method'=> $paymentSelectionForm['payment_method'],
                                    'email' => $billingDetail['email'],
                                    'orderno'=> $orderno,
                                    'sessionkey'=> $sessionkey,
                                    'returnUrl'=> url('payment/success?method='.$paymentSelectionForm['payment_method'])
                                ]);
        } catch (Exception $e) {
            return response()->json(['stat'=> 'error']);
        }

    }


     /**
     * successful payment
     * @return \Illuminate\Http\Response
     */
    public function successPayment(Request $request){
        DB::transaction(function() use ($request){
            $purchase = Purchase::where('ordernumber', $request->ordernumber)->where('session_key', $request->session_key)->first();
            if (!empty($purchase)) {
                $payment = $purchase->payment()->create([
                    'purchase_id' => $purchase->id,
                    'user_id' => $purchase->user_id,
                    'payment_method' => $request->method,
                ]);

                $paymentIpay = $payment->paymentIpay()->create([
                    'ordernumber' => $request->ordernumber,
                    'customer_email' => $request->customer_email,
                    'currency' => $request->currency,
                    'amount' => $request->amount,
                    'description' => $request->description,
                    'transactionid' => $request->transactionid,
                    'confirmation_code' => $request->confirmation_code,
                    'session_key' => $request->session_key,
                ]);

                $purchaseItems = $purchase->purchaseItems;
                if (count($purchaseItems) > 0) {
                    foreach ($purchaseItems as $key => $purchaseItem) {
                        CartItem::destroy($purchaseItem->cartitem_id);
                    }
                }

                // $purchaseItems = $purchase->purchaseItems;
                // if (($purchaseItems) > 0 ) {
                //     foreach ($purchaseItems as $key => $purchaseItem) {
                //         $purchaseItem->update([
                //             'cartitem_id' => null, 
                //         ]);
                //     }
                // }

                // send email 
                Mail::send('emails.purchaseemail',['paymentIpay'=>$paymentIpay], function($message) use($paymentIpay){
                    $message->to($paymentIpay->customer_email, 'customer')
                    ->subject('Payment Successful.');
                });
                //end of email 
            }else{

            }
        });

        // return redirect->withFlashPaymentSuccess('Payment successful');
        return redirect('/')->withFlashPaymentSuccess('Payment successful');

    }

     /**
     * cancel or unsuccessful payment
     * @return \Illuminate\Http\Response
     */
    public function cancelPayment(Request $request){
        return $request->all();
    }


    public function preBooking(Request $request){
        // return $request->all();
        // send email 
        Mail::send('emails.bookingemail',['info'=>$request->all()], function($message) use($request){
            // $message->to('yojan@3hammers.com', 'Admin')
            $message->to('dkarmastha101@gmail.com', 'Admin')
            ->subject('Booking Details:');
        });
        //end of email 

        return redirect()->back()->withPaymentSuccess('Product has been successfully booked.');
    }




}