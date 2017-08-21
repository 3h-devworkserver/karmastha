<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cartitem\Cartitem;
use App\Models\Product\Product;
use Auth;
use Illuminate\Http\Request;
use Session;
use DB;
use LaraCart;
    
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
                ->orderBy('product_attr_combination_value.id')
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
        return view('frontend.product.productdetail', compact('product', 'baseImage', 'tmp', 'tmp2'))->withClass('inner-page product-detail-page');
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

        // $option = [];
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        // $option['name'] = $request->attr_name;

        // Adding an item to the cart
        $item = LaraCart::add(2, $product->name, (int)$request->qty, $product->productPrice->price, [
                    'attr_name' => $request->attr_name,
                    'attr_value' => $request->attr_value,
                    'attr_vaule_id' => $request->attr,
                    'attr_identifier' => $request->attr_identifier,
                ]);


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

        

     

        dd(Session::all());

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