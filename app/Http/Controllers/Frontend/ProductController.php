<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

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
        $baseImage = $product->productBaseImage;
        return view('frontend.productdetail', compact('product', 'baseImage'))->withClass('inner-page product-detail-page');
    }


}