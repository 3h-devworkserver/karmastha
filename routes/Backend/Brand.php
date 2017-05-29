<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-brands-management'

		],function(){

			Route::delete('brands/bulkdelete', 'BrandController@deleteBrands');
			Route::resource('brands','BrandController', ['except' => ['show']]);
			

	});