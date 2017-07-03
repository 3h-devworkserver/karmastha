<?php
/*
* Product Management
*/
Route::group([
	'middleware' => 'access.routeNeedsPermission:view-products-management',
], function() {

	//attributes
	Route::resource('attributes', 'AttributeController');


//products	
	Route::delete('products/bulkdelete', 'ProductController@deleteProducts');
	// Route::post('product/general', 'ProductController@storePackage');
	// Route::post('product/price', 'ProductController@storePrice');
	Route::post('products/image', 'ProductController@storeImage');
	Route::resource('products', 'ProductController');
	Route::delete('tmp/image/delete/{id}', 'ProductController@deleteTmpImage');
	Route::delete('products/image/delete/{id}', 'ProductController@deleteProductImage');

	

});