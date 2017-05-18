<?php
/*
* Menu/Category Management
*/

// Routes for the category admin
Route::group([
	'prefix' => '/category',
	'middleware' => 'access.routeNeedsPermission:view-category-management'
], function(){

    // Showing the admin for the category builder and updating the order of category items
    Route::get('/', 'CategoryController@getIndex');
    Route::post('/', 'CategoryController@postIndex');

    Route::get('create', 'CategoryController@getNew');
    Route::post('new', 'CategoryController@postNew');
    Route::post('delete', 'CategoryController@postDelete');

    Route::get('edit/{id}', 'CategoryController@getEdit');
    Route::post('edit/{id}', 'CategoryController@postEdit');
});