<?php
	
	Route::group([

		'middleware' => 'access.routeNeedsPermission:view-members-management'

		],function(){

			Route::delete('members/bulkdelete', 'MemberManagementController@deleteMembers');
			Route::resource('members','MemberManagementController', ['except' => ['show']]);

	});