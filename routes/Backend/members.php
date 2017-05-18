<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-members-management'

		],function(){

			Route::resource('members','MemberManagementController');

	});