<?php
Route::group(['middleware' => ['preventBackHistory','web']], function() {
	Route::get('login', 'Auth\LoginController@login')->name('admin.login'); 
	Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
	Route::get('logout_time', 'Auth\LoginController@logout')->name('admin.logout_time.get');
	Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
	Route::post('login-post', 'Auth\LoginController@loginPost')->name('admin.login.post');
});
Route::group(['middleware' => ['preventBackHistory','admin','web']], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete'); 
		Route::get('status/{id}', 'AccountController@status')->name('admin.account.status');

		Route::get('change-password', 'AccountController@changePassword')->name('admin.account.change.password');
		Route::post('change-password-store', 'AccountController@changePasswordStore')->name('admin.account.change.password.store');
		Route::get('reset-password', 'AccountController@resetPassWord')->name('admin.account.reset.password'); 
		Route::post('reset-password-change', 'AccountController@resetPassWordChange')->name('admin.account.reset.password.change');		
	});

 });

