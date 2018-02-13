<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);

Route::get('/index', [
    'uses' => 'HomeController@index',
    'as' => 'login'
]);

Route::group(['prefix' => 'user'], function() {
  Route::group(['middleware' => 'guest'], function(){
    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);

    //Password reset routes
    Route::get('/reset', [
      'uses' => 'ForgotPasswordController@showLinkRequestForm',
      'as' => 'user.forgot'
    ]);

    Route::post('/email', [
      'uses' => 'ForgotPasswordController@sendResetLinkEmail',
      'as' => 'user.forgot'
    ]);

    Route::get('/reset/{token}', [
      'uses' => 'ResetPasswordController@showResetForm',
      'as' => 'user.reset'
    ]);

    Route::post('/reset', [
      'uses' => 'ResetPasswordController@reset',
      'as' => 'user.reset'
    ]);
  });

  Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);

    Route::post('/profile', [
        'uses' => 'UserController@postProfile',
        'as' => 'user.profile'
    ]);

    Route::post('/profile', [
        'uses' => 'UserController@postPass',
        'as' => 'user.profile.password'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
  });
});
