<?php

	Route::group([
		'middleware'=> 'access.routeNeedsPermission:view-slider-management'
		],function(){

			Route::resource('sliders','SliderController');
			Route::patch('sliders/{$title}',"SliderController@update");
			Route::get('sliders/{title}/list','SliderController@slide_list')->name('admin.sliders.slide_list');
			Route::get('sliders/{slider_title}/create','SliderController@slide_create');
			Route::patch('slide/{id}','SliderController@updateSlide');			

		});