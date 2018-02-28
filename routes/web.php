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

//index
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);

//index
Route::get('/index', [
    'uses' => 'HomeController@index',
    'as' => 'login'
]);

//Resto page
Route::get('/resto', [
    'uses' => 'RestoController@index',
    'as' => 'resto.page'
]);

//share
Route::group(['prefix' => 'share'], function() {
  Route::get('/gplus/{resto}', function()
  {
  	return redirect(Share::load('http://www.eatzee.com', 'Eatzee')->gplus());
  })->name('gplus');

  Route::get('/twitter/{resto}', function()
  {
    return redirect(Share::load('http://www.eatzee.com', 'Eatzee')->twitter());
  })->name('twitter');

  Route::get('/facebook/{resto}', function()
  {
    return redirect(Share::load('http://www.eatzee.com', 'Eatzee')->facebook());
  })->name('facebook');
});

Route::group(['prefix' => 'user'], function() {
  //index
  Route::get('/', function () {
      return redirect('/');
  });

  //verify registration
  Route::get('/verifyemail/{token}', [
      'uses' => 'UserController@verify',
      'as' => 'user.verify'
  ]);

  //FOR GUEST
  Route::group(['middleware' => 'guest'], function(){
    //create new account
    Route::post('/signup', [
        'uses' => 'UserController@register',
        'as' => 'user.signup'
    ]);

    //login proses
    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);

    //view Password reset
    Route::get('/reset', [
      'uses' => 'ForgotPasswordController@showLinkRequestForm',
      'as' => 'user.forgot'
    ]);

    //send email reset password
    Route::post('/email', [
      'uses' => 'ForgotPasswordController@sendResetLinkEmail',
      'as' => 'user.forgot'
    ]);

    //view change password
    Route::get('/reset/{token}', [
      'uses' => 'ResetPasswordController@showResetForm',
      'as' => 'user.reset'
    ]);

    //Password reset
    Route::post('/reset', [
      'uses' => 'ResetPasswordController@reset',
      'as' => 'user.reset'
    ]);
  });


  //FOR LOGIN USER
  Route::group(['middleware' => 'auth'], function(){
    //My Profile
    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);

    //update profile
    Route::post('/profile', [
        'uses' => 'UserController@postProfile',
        'as' => 'user.profile'
    ]);

    //update profile password
    Route::post('/profile/pass', [
        'uses' => 'UserController@postPass',
        'as' => 'user.profile.password'
    ]);

    //logout
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
  });
});
