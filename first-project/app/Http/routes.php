<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//Route::get('/', 'HomeController');

Route::get('/', function () {
    return view('home');
});

Route::get('auth/code', function () {
    return view('auth/code');
});


Route::get('home', function () {
	if(Auth::guest()){
		return Redirect::to('auth/login');
	}
	else{
	return view('auth/code');
}
   // return view('home');
});
// Authentication routes...
Route::get('user/{id}',function($id){

	$user = App\User::find($id);
	echo 'The user with id of ' . $id . 'has an email of' . $user->email . '';
});
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Route::get('auth/code', 'Auth\CodeController@create');
Route::post('auth/code', 'Auth\CodeController@create');


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

