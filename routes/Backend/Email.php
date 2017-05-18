<?php
/*
* Email templates
*/
Route::group([
	'middleware' => 'access.routeNeedsPermission:view-settings-management'
], function() {
	
	Route::get('settings/Emails/activate', 'EmailController@activateUser');
	Route::post('email/activate', 'EmailController@activateUserstore');
});