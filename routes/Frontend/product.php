<?php

/**
 * Product Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/products/{slug}', 'ProductController@showProductDetail')->where('url','.*')->name('product.detail');
