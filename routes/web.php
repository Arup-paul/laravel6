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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','StaticController@show')->name('home');
Route::get('/show','StaticController@showTour')->name('showTour');
Route::get('/show','StaticController@showTour')->name('showTour');
Route::get('/posts','StaticController@allPost')->name('posts.all');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
  Route::put('/profile','ProfileController@profileUpdate')->name('profile.update');
  Route::get('/logout','DashboardController@logout')->name('logout');

  Route::get('/posts/create','PostController@showFrom')->name('posts.create');
  Route::post('/posts','PostController@storePost')->name('posts.store');
});



Route::group(['namespace' => 'Frontend'], function () {
   Route::get( '/register', 'AuthController@register' )->name( 'register' );
   Route::get( '/userLogin', 'AuthController@userLogin' )->name( 'userLogin' );
   Route::post( '/userLogin', 'AuthController@processLogin' )->name( 'userLogin' );
   Route::get( '/logout', 'AuthController@logout' )->name( 'logout' );

   Route::post( '/register', 'AuthController@processRegister' )->name( 'register' );
   Route::get( '/userList', 'AuthController@showUserList' )->name( 'userList' );
   Route::get( '/{id}', 'AuthController@showUser' )->name( 'details' );
   Route::put( '/{id}', 'AuthController@updateUser' )->name( 'updateUser' );
   Route::delete( '/{id}', 'AuthController@deleteUser' )->name( 'delete' );
   Route::get( '/verify/{token}', 'AuthController@verifyEmail' )->name( 'verify.email' );

});

