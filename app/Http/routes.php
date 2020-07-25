<?php

// Bagian Authentikasi
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('register');

//Halaman Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profil/{id?}', 'HomeController@profil')->name('profil');

//list Video
Route::get('/video', 'VideoController@index')->name('video');

// View Artikel
Route::get('/artikel', 'ArtikelController@index')->name('artikel');
Route::get('/artikel/{slug}', 'ArtikelController@show')->name('postartikel');
Route::get('/materi', 'ArtikelController@materi')->name('materi');
Route::get('/tips', 'ArtikelController@tips')->name('tips');

Route::get('/logindulu', function()
{
  return view('logindulu');
});



Route::group(['middleware' => 'auth'] ,  function()
{
    //edit profil User
    Route::get('/user/{id}/edit', 'HomeController@edituser');
    Route::put('/user/{id}/save', 'HomeController@updateuser');
    //melihat Video
    Route::get('/video/{id}', 'VideoController@show')->name('postvideo');
    //notifikasi
    Route::get('/notifikasi' , 'HomeController@get_notif');

    //CRUD artikel (untuk user member)
    Route::get('/user/artikel/tambah', 'ArtikelController@createuser');
    Route::post('/user/artikel', 'ArtikelController@storeuser');
    Route::get('/user/artikel/{id}/edit', 'ArtikelController@edituser');
    Route::put('/user/artikel/{id}/save', 'ArtikelController@updateuser');
    Route::get('/user/artikel/{id}/delete', 'ArtikelController@destroyuser')->name('hapusartikel');
    //CRUD komentar artikel
    Route::post('/artikel-comment/{id}' , 'CommentController@store');
    Route::get('/artikel-comment/{id}/edit' , 'CommentController@edit');
    Route::put('/artikel-comment/{id}/save' , 'CommentController@update');
    Route::get('/artikel-comment/{id}/delete' , 'CommentController@destroy');
});


Route::group(['middleware' => 'admin'] ,  function()
{
  //Dashboard admin
  Route::get('/admin/dashboard', 'AdminController@dashboard');

  //CRUD Video
  Route::get('/admin/video', 'VideoController@indexAdmin')->name('adminvideo');
  Route::get('/admin/video/tambah', 'VideoController@create');
  Route::post('/admin/video', 'VideoController@store');
  Route::get('/admin/video/{id}/edit', 'VideoController@edit');
  Route::put('/admin/video/{id}/save', 'VideoController@update');
  Route::get('/admin/video/{id}/delete', 'VideoController@destroy');

  //CRUD ARTIKEL
  Route::get('/admin/artikel', 'ArtikelController@indexAdmin');
  Route::get('/admin/artikel/tambah', 'ArtikelController@create');
  Route::post('/admin/artikel', 'ArtikelController@store');
  Route::get('/admin/artikel/{id}/edit', 'ArtikelController@edit');
  Route::put('/admin/artikel/{id}/save', 'ArtikelController@update');
  Route::get('/admin/artikel/{id}/delete', 'ArtikelController@destroy')->name('hapusartikel');
  //Accept Artikel dari user member
  Route::get('/admin/artikel/{id}/accept', 'AdminController@acceptartikel');
  //search pada artikel
  Route::post('/admin/artikel/search', 'AdminController@search');
  //User
  Route::get('/admin/user', 'UserController@index');
  Route::get('/admin/user/{id}/delete', 'UserController@destroy')->name('hapususer');
});
