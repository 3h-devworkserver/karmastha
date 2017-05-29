<?php
/*
* settings Management
*/
Route::group([
	'middleware' => 'access.routeNeedsPermission:view-settings-management'
], function() {
	/**
	 * Settings Management
	 */
	Route::get('/settings/general', 'SettingController@generalSetting')->name('setting.general');
	Route::post('/settings/general', 'SettingController@storeGeneralSetting')->name('setting.general.store');
	Route::patch('/settings/general', 'SettingController@storeGeneralSetting')->name('setting.general.update');
});