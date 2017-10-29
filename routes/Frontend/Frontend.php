<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');

Route::get('/autocomplete/search', 'FrontendController@autocompleteSearch')->name('autocompletesearch');
Route::get('/search', 'FrontendController@search')->name('search');


Route::get('/brand/{url}', 'FrontendController@brandpage')->where('slug','.*')->name('page');
Route::get('macros', 'FrontendController@macros')->name('macros');

Route::get('/category/{slug}', 'FrontendController@showCategoryPage')->where('slug','.*')->name('category.show');
Route::get('/productsorting', 'FrontendController@productSorting')->name('productsorting');

Route::group(['middleware' => 'auth'], function () {
Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
    Route::get('user/password', 'ChangePasswordController@formPassword')->name('password');
});
});

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('user/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('user/profile', 'DashboardController@profile')->name('profile');
    Route::get('user/image', 'DashboardController@uploadImage')->name('image');
        // Route::get('user/wishlist', 'DashboardController@wishlist')->name('wishlist');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        //Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
        Route::patch('profile/update/{id}', 'ProfileController@userUpdate')->name('profile.update');
        Route::patch('profile/image/{id}', 'ProfileController@userImageUpdate')->name('profile.image.update');
        Route::patch('password/update/{id}', 'ProfileController@passwordUpdate')->name('password.update');

        /*
         * User orders
         */
        Route::get('user/orders', 'OrderController@index')->name('orders');
    });
});
