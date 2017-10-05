<?php

/**
 * Product Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/product/{slug}', 'ProductController@showProductDetail')->where('slug','.*')->name('product.detail');

Route::post('/product/getquantity', 'ProductController@getQuantity')->name('product.getquantity');







Route::post('addtocart', 'ProductController@ProductAction')->name('productaction');

Route::get('cart', 'ProductController@viewCart')->name('cart.view');

Route::patch('cart/updateqty/{index}', 'ProductController@updateCartItemQty');

Route::get('cart/removeitem/{index}', 'ProductController@removeCartItem')->name('cart.removeitem');

Route::post('checkout', 'ProductController@checkout')->middleware('auth')->name('checkout');
Route::get('checkout', 'ProductController@checkout')->name('checkout');
Route::post('checkoutdetails', 'ProductController@checkoutDetails')->name('checkoutdetails');

Route::get('verify', function(){
	return view('frontend.product.verify');
});
Route::post('/payment/success', 'ProductController@successPayment')->name('successpayment');
Route::post('/payment/cancel', 'ProductController@cancelPayment')->name('cancelpayment');


