<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-brands-management'

		],function(){

			Route::resource('brands','BrandController');

	});