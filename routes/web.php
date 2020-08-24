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
Auth::routes([
    'register' => false
]);


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    
    Route::resource('data-barang','DataBarangController');
});

Route::get('detail-barang/{kode}','HomeController@detail_barang')->name('beranda');
Route::get('/','HomeController@index')->name('beranda');
Route::get('dashboard',function(){
    return redirect('user-profil');
});

//USER LOGIN
Route::get('user-profil','UserController@profil')->name('user-profil');
Route::get('user-login','UserController@index')->name('user-login');
Route::post('user-login-proses','UserController@proses')->name('login-proses');
Route::get('user-logout',function(){
    Auth::logout();
    return redirect('/');
});

Route::get('images/{dir1}/{dir2}/{filename}', 'Controller@displayImages')->name('images.displayImage');
Route::get('show-file/{dir}/{filename}', 'Controller@displayFiles');
Route::get('download-file/{dir}/{filename}', 'Controller@downloadFiles');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
