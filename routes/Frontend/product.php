<?php

/**
 * Product Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/product/{slug}', 'ProductController@showProductDetail')->where('slug','.*')->name('product.detail');

Route::post('addtocart', 'ProductController@ProductAction')->name('productaction');

Route::get('cart', 'ProductController@viewCart')->name('cart.view');

Route::patch('cart/updateqty/{index}', 'ProductController@updateCartItemQty');

Route::get('cart/removeitem/{index}', 'ProductController@removeCartItem')->name('cart.removeitem');

Route::get('checkout', 'ProductController@checkout')->middleware('auth')->name('checkout');
