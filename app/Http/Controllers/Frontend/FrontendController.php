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
use App\Models\ProductGroup\ProductGroup;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

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
        if( Auth::user()){
           $user = Auth::user()->id;
           $wishlist = DB::table('product_wishlist')->where('user_id',$user)->count();
        }else{
            $wishlist = '';
        }
        $brands = Brand::where('status', 1)->where('topbrand', 1)->orderBy('b_order', 'asc')->get();
        $members = Member::where('status', 1)->orderBy('m_order', 'asc')->get();
        $page = Page::where('id',1)->where('status', 1)->first();
        $sliders= Slide::where('group_identifier', $page->slider_identifier)->get();
        $ads= Ads::first();
        $categories = Category::where('parent_id','0')->get();
        // $tproducts = Product::
        // //->join('product_price','products.id','=','product_price.product_id')
        // //->select('products.name','product_price.price','products.total_views','product_price.special_price')
        //  where('trending','=','1')
        // ->orderby('total_views','desc')
        // ->get();
        // $tproducts = array();
        $productGroup = ProductGroup::where('id', 1)->where('status', 1)->first();
        $tproducts = $productGroup->trendingProductsLimit;

        $categoryDisplays = Category::where('parent_id','0')->where('homepage_display', 1)->where('status', 1)->get();

        if (empty($page)) {
            abort(404);
        }
       
        return view('frontend.index', compact('brands', 'members', 'sliders', 'page', 'ads','tproducts','wishlist','categories', 'categoryDisplays'))->withClass('interactive-body');
    } 

    public function brandpage($url)
    {
        // Session::flush();
        if( Auth::user()){
           $user = Auth::user()->id;
           $wishlist = DB::table('product_wishlist')->where('user_id',$user)->count();
        }else{
            $wishlist = '';
        }
        $brands = Brand::where('status', 1)->where('slug', $url)->orderBy('b_order', 'asc')->first();
        $brandids = DB::table('brand_category')->select('category_id')->where('brand_id', $brands->id)->pluck('category_id')->toArray();
        //return $brandids;
         //$members = Member::where('status', 1)->orderBy('m_order', 'asc')->get();
        //$page = Page::where('slug',$url)->where('status', 1)->first();
        //$sliders= Slide::where('group_identifier', $page->slider_identifier)->get();
        //$ads= Ads::first();
        // $tproducts = Product::
        // //->join('product_price','products.id','=','product_price.product_id')
        // //->select('products.name','product_price.price','products.total_views','product_price.special_price')
        //  where('trending','=','1')
        // ->orderby('total_views','desc')
        // ->get();
        $tproducts = array();

        // if (empty($page)) {
        //     abort(404);
        // }
       
        return view('frontend.brandpage', compact('brands', 'members', 'ads','tproducts','wishlist','brandids'))->withClass('interactive-body');
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
        $products = DB::table('category_product')
        ->join('products','products.id', '=', 'category_product.product_id')
        ->join('product_price','products.id', '=', 'product_price.product_id')
        ->where('category_product.category_id','=',$category->id)
        ->select('products.*','product_price.price','product_price.special_price')
        ->paginate(4);

        $catArray = array();
        $cat = $category;
        while(count($cat->immediateParent) > 0){
            $cat = $cat->immediateParent;
            $catArray[] = $cat;
        }
        // return $catArray;

        $subParent = 'false';
        if (!empty($category->immediateParent)) {
            if ($category->immediateParent->isParent() == 'true') {
                $subParent = 'true';
            }
        }
        if ($category->isParent() == 'true') {
            return view('frontend.category.categorypage', compact('category','products', 'catArray'))->withClass('inner-page product_cat');
        }elseif($subParent == 'true'){
            return view('frontend.category.categorypage', compact('category','products', 'catArray'))->withClass('inner-page product_cat');
        }else{
            $products = $category->products;
            return view('frontend.category.subcategorypage', compact('category', 'products', 'catArray'))->withClass('inner-page product_cat');
        }
    }

    public function addWishlist(){
        
    }

    /**
     * product sorting in category page
     */
    public function productSorting(Request $request){
        $popularity = $request->popularity;
        $brands = $request->brand;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        // $pricerange = $request->pricerange;

        $products = Product::leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                            ->join('category_product','products.id', '=', 'category_product.product_id')
                            ->join('product_price','products.id', '=', 'product_price.product_id')
                            ->where('products.status', 1)
                            ->where('brands.status', 1);

        if (!empty($popularity)) {
            if($popularity == 'new'){
                $products = $products->orderBy('products.created_at', 'desc');
            }elseif($popularity == 'old'){
                $products = $products->orderBy('products.created_at', 'asc');
            }elseif($popularity == 'fromLowToHigh'){
                $products = $products->orderBy('product_price.main_price', 'asc');
                // $products= $products->where(function ($q) use ($minprice) {
                //     $q->orwhere(function ($q1) use ($minprice) {
                //         $q1->orWhere('product_price.special_price', '==', 0);
                //         $q1->orWhereNull('product_price.special_price');
                //         $q1->where(function ($q2) use ($minprice) {
                //             $q2->orderBy('product_price.price', 'asc');
                //         });
                //     });
                //     $q->orwhere(function ($q1) use ($minprice) {
                //         $q1->where('product_price.special_price', '!=', 0);
                //         $q1->whereNotNull('product_price.special_price');
                //         $q1->where('product_price.special_price', 'asc');
                //     });
                // });
            }elseif($popularity == 'fromHighToLow'){
                $products = $products->orderBy('product_price.main_price', 'desc');
            }else{
                $products = $products->orderBy('products.total_views', 'desc');
            }
        }
        // dd($products);

        if (count($brands) != 0  ) {
            $products= $products->where(function ($q) use ($brands) {
                foreach ($brands as $key => $brand) {
                        $q->orWhere("products.brand_id", $brand);
                }
            });
        }

        if (!empty($maxprice)) {
            $products = $products->where('product_price.price', '<=', $maxprice);
            $products= $products->where(function ($q) use ($maxprice) {
                    $q->orWhere('product_price.special_price', '<=', $maxprice);
                    $q->orWhere('product_price.special_price', '==', 0);
                    $q->orWhereNull('product_price.special_price');
            });
        }

         if (!empty($minprice)) {
            $products= $products->where(function ($q) use ($minprice) {

                $q->orwhere(function ($q1) use ($minprice) {
                    $q1->orWhere('product_price.special_price', '==', 0);
                    $q1->orWhereNull('product_price.special_price');
                    $q1->where(function ($q2) use ($minprice) {
                        $q2->where('product_price.price', '>=', $minprice);
                    });
                });

                $q->orwhere(function ($q1) use ($minprice) {
                    $q1->where('product_price.special_price', '!=', 0);
                    $q1->whereNotNull('product_price.special_price');
                    $q1->where('product_price.special_price', '>=', $minprice);
                });
            });
        }

        $products = $products->select('products.id', 'name')
                            ->groupBy('products.id', 'name')
                            ->get();

        // $products = $products->select('products.id', 'name')
        //                     ->groupBy('products.id', 'name')
        //                     ->toSql();
        //                     return $products;

        if (count($products) > 0) {
            $html = view('frontend.includes.categoryproductlist')->with('products', $products)->render();
            return response()->json(['stat'=> 'success', 'html'=>$html]);
        }else{
            return response()->json(['stat'=> 'error', 'html'=>'']);
        }
    }



}
