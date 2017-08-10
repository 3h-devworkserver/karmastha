<?php
/*
* Product Management
*/
Route::group([
	'middleware' => 'access.routeNeedsPermission:view-productgroups-management',
], function() {

	Route::delete('productgroups/bulkdelete', 'ProductGroupController@deleteProductGroups');
	Route::resource('productgroups', 'ProductGroupController');

});