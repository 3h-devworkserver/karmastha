<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Member;
use App\Models\Page;
use App\Models\Slide;
use App\Models\Ads;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Session;
use DB;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    public function __construct(){
       parent::__construct();
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Session::flush();
        $brands = Brand::where('status', 1)->where('topbrand', 1)->orderBy('b_order', 'asc')->get();
        $members = Member::where('status', 1)->orderBy('m_order', 'asc')->get();
        $page = Page::where('id',1)->where('status', 1)->first();
        $sliders= Slide::where('group_identifier', $page->slider_identifier)->get();
        $ads= Ads::first();

        $tproducts = Product::
        //->join('product_price','products.id','=','product_price.product_id')
        //->select('products.name','product_price.price','products.total_views','product_price.special_price')
         where('trending','=','1')
        ->orderby('total_views','desc')
        ->get();

        if (empty($page)) {
            abort(404);
        }
       
        return view('frontend.index', compact('brands', 'members', 'sliders', 'page', 'ads','tproducts'))->withClass('interactive-body');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    /**
     * Show the form for creating a new resource.
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function showCategoryPage($slug){
        $category = Category::where('url', $slug)->where('status', 1)->first();
        if ($category->isParent() == 'true') {
            return view('frontend.category.categorypage', compact('category'))->withClass('inner-page product_cat');
        }else{
            $products = $category->products;
            return view('frontend.category.subcategorypage', compact('category', 'products'))->withClass('inner-page product_cat');
        }
    }

    public function addWishlist(){
        
    }



}
