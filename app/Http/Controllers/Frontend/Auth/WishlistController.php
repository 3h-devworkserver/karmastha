<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Slide;
use App\Models\Ads;
use App\Models\Page;
use App\Models\Wishlist;
use App\Models\Product\Product;
use Auth;
use Datatables;

//use App\Http\Requests;
//use \Cart as Cart;


class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()){
            $user = Auth::user()->id;
        }
        $page = Page::where('id',1)->where('status', 1)->first();
        $sliders= Slide::where('group_identifier', $page->slider_identifier)->get();
        $ads= Ads::first();
        $wishlists = DB::table('product_wishlist')->where('user_id',$user)->get();
        $wishlist = DB::table('product_wishlist')->where('user_id',$user)->count();
        return view('frontend.user.wishlist',compact('sliders','ads','page','wishlists','wishlist'))->withClass('wishlist');
    }

    public function load(){
        $wishlists = Wishlist::select('id', 'product_id', 'updated_at')->where('user_id', Auth::user()->id);
        return Datatables::of($wishlists)
            ->escapeColumns(['id', 'product_id'])
            // ->addColumn('bulk', function ($data) {
            //     return bulkSelect($data->id);
            // })
            ->addColumn('aaa', function($data){ 
                // return crudOps('pages', $data->id);

            // return '<ul class="list-inline no-margin-bottom"><li><a href="'.'#'.'" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a></li><li><a href="'.'#'.'" data-method="delete" name="delete_item" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i> Delete</a></li></ul>';
                $product = Product::where('id',$data->product_id)->first();
                if (!empty($product)) {
                    if (!empty($product->productPrice->special_price)) {
                        $priceHtml = '<span class="item-p-text old">NPR '.custom_number_format($product->productPrice->price).'</span><span class="item-p-text item-p-text-light price">NPR '.productPrice($data->product_id).'</span>';
                    }else{
                        $priceHtml = '<span class="item-p-text item-p-text-light price">NPR '.productPrice($data->product_id).'</span>';

                    }

                    return '<div class="media">
                                <a href="'.url('product/'.$product->slug).'" target="_blank" class="pull-left item-p-img-link">
                                  <img src="'.asset("/images/product/".$data->product_id."/thumbnail/". getThumbImage($data->product_id) ).'" class="media-photo ">
                                </a>
                                <div class="media-body Lmedia-body">
                                  <a href="'.url('product/'.$product->slug).'" target="_blank" class="title">
                                   '.$product->name.'</a>
                                   <div class="item-ps item-p-field">
                                    <span class="item-p-text-light">Seller:<em>'.$product->user->name.'</em></span>
                                   </div>
                                   <div class="item-p-field">'.$priceHtml.'
                                     <!--<span class="item-p-text-light">/ Piece</span> -->
                                   </div>
                                   <!-- <div class="item-p-field">
                                     <span class="item-p-text">10 Pieces</span>
                                   </div> -->
                                   <!-- <div class="item-p-field">
                                      <a href="#">
                                        <i></i>remark
                                      </a>
                                   </div> -->
                                </div>
                            </div>';
                }else{
                    return "";
                }
                // return '<a href="#"><img src="'.asset("/images/product/"."4"."/thumbnail/". getThumbImage(4) ).'" alt="product" class="img-responsive cart-image"></a>';
                // return parseDateTimeY_M_D($data->created_at) ;
            })
            ->editColumn('updated_at', function($data){ 
                $product = Product::where('id',$data->product_id)->select('name', 'slug')->first();
                return '<form action="'.url('user/wishlist/destroy', [$data->id]).'" method="POST" class="side-by-side">
                                        '. csrf_field() .'
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="button_delete_user"><a href="javascript:void(0)" class="hide_delete submit">remove</a></div>
                                    </form>
                                    <div class="btn-addto"><a href="'.url('product/'.$product->slug).'" target="_blank" class="btn btn-primary open-door">add to cart</a>';
                // return parseDateTimeY_M_D($data->updated_at) ;
            })
            // ->editColumn('status', function ($data) {
            //     return $data->status_label;
            // })
            // ->addColumn('action', function($data){
            //     return crudOps('pages', $data->id);
            //     // return '<ul class="list-inline no-margin-bottom"><li><a href="'.route('admin.pages.edit', $data->id).'" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a></li><li><a href="'.route('admin.pages.destroy', $data->id).'" data-method="delete" name="delete_item" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i> Delete</a></li></ul>';
            // })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::user()){
            $user = Auth::user()->id;
        }
        $duplicates = DB::table('product_wishlist')->where('user_id', $user)->where('product_id',$_GET['id'])->first();

        if (!empty($duplicates)) {
            return redirect()->back()->withSuccessMessage('Item is already in your wishlist!');
        }

        DB::table('product_wishlist')->insert([
            'user_id' => $user,
            'product_id' => $_GET['id'],
            ]);

        return redirect()->back()->withSuccessMessage('Item was added to your wishlist!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return  Auth()->user()->id;
        // return $id;
        $wishlist = DB::table('product_wishlist')->where('user_id', Auth()->user()->id)->where('id',$id)->delete();
        // return $wishlist;
        return redirect('user/wishlist')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyWishlist()
    {
        DB::table('product_wishlist')->truncate();
        return redirect('user/wishlist')->withSuccessMessage('Your wishlist has been cleared!');
    }

    /**
     * Switch item from wishlist to shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        // $item = Cart::instance('wishlist')->get($id);

        // Cart::instance('wishlist')->remove($id);

        // $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
        //     return $cartItem->id === $id;
        // });

        // if (!$duplicates->isEmpty()) {
        //     return redirect('cart')->withSuccessMessage('Item is already in your shopping cart!');
        // }

        // Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
        //                          ->associate('App\Product');

        // return redirect('wishlist')->withSuccessMessage('Item has been moved to your shopping cart!');

    }
}
