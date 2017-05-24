<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-static_blocks-management'

		],function(){

			Route::resource('static_blocks','StaticblockController');
			Route::get('static_blocks/{title}/list','StaticblockController@staticblocks_list')->name('admin.staticblocks.list');

	});