<?php
/*
* Page Management
*/
Route::group([
	'middleware' => 'access.routeNeedsPermission:view-pages-management'
], function() {
	
	Route::delete('pages/bulkdelete', 'PageController@deletePages');
	Route::get('pages/active', 'PageController@activePages')->name('pages.active');
	Route::get('pages/inactive', 'PageController@inactivePages')->name('pages.inactive');
    Route::resource('pages', 'PageController', ['except' => ['show']]);



});