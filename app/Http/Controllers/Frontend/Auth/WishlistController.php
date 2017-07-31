<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Slide;
use App\Models\Ads;
use App\Models\Page;
use Auth;

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
        return view('frontend.wishlist',compact('sliders','ads','page','wishlists','wishlist'));
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
        $duplicates = DB::table('product_wishlist')->where('product_id',$_GET['id'])->first();

        if (!empty($duplicates)) {
            return redirect('/')->withSuccessMessage('Item is already in your wishlist!');
        }

        DB::table('product_wishlist')->insert([
            'user_id' => $user,
            'product_id' => $_GET['id'],
            ]);

        return redirect('/')->withSuccessMessage('Item was added to your wishlist!');
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
        DB::table('product_wishlist')->where('product_id',$id)->delete();
        return redirect('wishlist')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyWishlist()
    {
        DB::table('product_wishlist')->truncate();
        return redirect('wishlist')->withSuccessMessage('Your wishlist has been cleared!');
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
