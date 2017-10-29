<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});

//loading data for table
	Route::get('/data/table/pages', 'Backend\PageController@load');
    Route::get('/data/table/members','Backend\MemberManagementController@load');
    Route::get('/data/table/products','Backend\ProductController@load');
    Route::get('/data/table/productgroups','Backend\ProductGroupController@load');
    Route::get('/data/table/brands','Backend\BrandController@load');
    Route::get('/data/table/sliders','Backend\SliderController@load');
    Route::get('/data/table/staticblocks','Backend\StaticblockController@load');

    Route::post('/data/table/slide/list','Backend\SliderController@load_slide_list');
    Route::post('/data/table/static_blocks/list','Backend\StaticblockController@load_staticblock_list');
 
// edit and delete
    Route::get('admin/slides/{id}/edit','Backend\SliderController@edit')->name('admin.slides.edit');
    Route::delete('/slides/destroy/{id}','Backend\SliderController@slide_delete')->name('admin.slides.destroy');    
    
    Route::get('admin/static_blocks/{id}/edit','Backend\StaticblockController@edit')->name('admin.static_blocks.edit');

    Route::delete('/static_blocks/delete/{id}','Backend\StaticblockController@static_block_delete')->name('admin.static_blocks.delete');

    Route::get('/data/table/attributes', 'Backend\AttributeController@load');


    // frontend
    Route::get('/data/table/user/wishlist', 'Frontend\Auth\WishlistController@load');
    Route::get('/data/table/user/order', 'Frontend\User\OrderController@load');

    