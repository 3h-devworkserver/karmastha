<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-static_blocks-management'

		],function(){

			Route::resource('static_blocks','StaticblockController');

	});