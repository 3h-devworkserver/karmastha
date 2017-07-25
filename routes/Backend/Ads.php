<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-ads-management'

		],function(){

			Route::get('/ads', 'AdsController@create')->name('ads');
			Route::post('/ads', 'AdsController@store')->name('ads.store');
			Route::patch('/ads', 'AdsController@store')->name('ads.update');

			

	});