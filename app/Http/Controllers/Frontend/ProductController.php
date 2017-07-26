<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cartitem\Cartitem;
use App\Models\Product\Product;
use Auth;
use Illuminate\Http\Request;
use Session;
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

        if(empty($product)){
    		abort(404);
    	}
        $product->increaseView();
        $baseImage = $product->productBaseImage;
        return view('frontend.product.productdetail', compact('product', 'baseImage'))->withClass('inner-page product-detail-page');
    }


    /**
     * Product action form product detail page eg: add to cart, preorder
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ProductAction(Request $request){
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
            $cartItems = Cartitem::where('product_id',$request->product )->get();

            if(!empty($cartItems)){
                $mainCheck = 0;
                foreach($cartItems as $cartItem){
                    $attributes = $cartItem->attributes;
                    if (!empty($attributes)) {
                        $check = 1;
                        foreach ($attributes as $key => $attr) {
                            $secondCheck = 0;
                            for ($i=0; $i < count($request->attr_name); $i++) {
                            // echo $i; 
                                // echo $attr->attr_name .'='.$request->attr_name[$i].' and'.$attr->attr_value.'='.$request->attr_val[$i];
                                if ($attr->attr_name == $request->attr_name[$i] && $attr->attr_value == $request->attr_val[$i] ) {
                                    $secondCheck = 1;
                                }
                            // echo $secondCheck; 
                            }
                            if ($secondCheck == 0) {
                            // return $secondCheck;
                                $check = 0;
                                break;
                            }
                        }
                        // return $check;
                        if ($check == 1) {
                            $cartItem->qty += $request->qty;
                            $cartItem->save();
                            $mainCheck = 1;
                            break;
                        }
                    }else{

                    }
                }
                if($mainCheck == 0){
                    $cartitem = Cartitem::create([
                        'product_id' => $request->product ,
                        'user_id' => Auth::user()->id,
                        'qty' =>$request->qty,
                    ]);
                    if (!empty($request->attr_name)) {
                        for ($i=0; $i < count($request->attr_name); $i++) { 
                            $cartitem->attributes()->create([
                                'attr_name'=>$request->attr_name[$i],
                                'attr_value'=>$request->attr_val[$i],
                            ]);
                        }
                    }
                }
            }else{
                $cartitem = Cartitem::create([
                    'product_id' => $request->product ,
                    'user_id' => Auth::user()->id,
                    'qty' =>$request->qty,
                ]);
                if (!empty($request->attr_name)) {
                    for ($i=0; $i < count($request->attr_name); $i++) { 
                        $cartitem->attributes()->create([
                            'attr_name'=>$request->attr_name[$i],
                            'attr_value'=>$request->attr_val[$i],
                        ]);
                    }
                }
            }
        }else{

            // $cartItems = array();
            $cartItems = (Session::has('cart')) ? Session::get('cart') : array();
            // dd($cartItems);

            $attrArray = '';
            for ($i=0; $i < count($request->attr_name) ; $i++) { 
                $attrArray[] = [$request->attr_name[$i]=>$request->attr_val[$i]];
            }

            $cartItems2 = array();
            $check = 0;
            foreach ($cartItems as $key => $value) {
                if($value['productId'] == $request->product ){
                    if ($value['attributes'] == $attrArray) {
                        $value['qty'] += $request->qty;
                        $check = 1;
                    }
                }
                array_push($cartItems2,$value);
            }
            if ($check == 0) {
                $newItem = [
                        'productId'=>$request->product,
                        'qty'=>$request->qty,
                        'img'=>$product->productThumbnailImage[0]->image,
                        // 'price'=>$price,
                        // 'totalPrice'=>$price*$request->qty,
                        'attributes' =>$attrArray,
                        ];
                array_push($cartItems2,$newItem);
            }
            Session::flush();
            Session::put('cart', $cartItems2);
            $request->session()->save(); 

        }

        

     


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
            $cartItems = Session::has('cart') ? Session::get('cart') : null;
        }
        // return $cartItems;

        if(!empty($cartItems)){
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
            $cartItem = Cartitem::findOrFail($index);
            $cartItem->delete();
        }else{
            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            if (!empty($cartItems)) {
                Session::forget('cart.'.$index);
            }

            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            $cartItems2 = array();
            foreach ($cartItems as $key => $value) {
                array_push($cartItems2,$value);
            }
            Session::flush();
            Session::put('cart', $cartItems2);
            $request->session()->save();
        }
        return redirect()->route('frontend.cart.view');
    }

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

            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            $cartItems2 = array();
            foreach ($cartItems as $key => $value) {
                if($key == $index ){
                    $value['qty'] = $request->qty;
                }
                array_push($cartItems2,$value);
            }
            Session::flush();
            Session::put('cart', $cartItems2);
            $request->session()->save();

        }
        return redirect()->route('frontend.cart.view');
    }


    /**
     * checkout process
     * @return \Illuminate\Http\Response
     */
    public function checkout(){
        return "checkout";
        $cartItems = Session::has('cart') ? Session::get('cart') : null;
        if (!empty($cartItems)) {
            Session::forget('cart.'.$index);
        }
        return redirect()->route('frontend.cart.view');
    }

}