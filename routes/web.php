<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BlogController@index');
// Route::get('/isi-post', function() {
//     return view('frontend.isi_post');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function() {

    Route::get('/dashboard', function() {
        return view('backendmaster.master');
    });

    Route::get('/category','CategoryController@index');
    Route::post('/category/create','CategoryController@create');
    Route::get('/category/{id}/edit','CategoryController@edit');
    Route::post('/category/{id}/update','CategoryController@update');
    Route::get('/category/{id}/destroy','CategoryController@destroy');

    Route::get('/tag','TagController@index');
    Route::post('/tag/create','TagController@create');
    Route::get('/tag/{id}/edit','TagController@edit');
    Route::post('/tag/{id}/update','TagController@update');
    Route::get('/tag/{id}/destroy','TagController@destroy');

    Route::get('/post','PostController@index');
    Route::get('/post/create','PostController@create');
    Route::post('/post/store','PostController@store');
    Route::get('/post/{id}/edit','PostController@edit');
    Route::post('/post/{id}/update','PostController@update');
    Route::get('/post/{id}/destroy','PostController@destroy');
    Route::get('/post/trash','PostController@trash');
    Route::get('/post/{id}/restore','PostController@restore');
    Route::get('/post/{id}/kill','PostController@kill');

    Route::get('/user','UserController@index');
    Route::get('/user/create','UserController@create');
    Route::post('/user/store','UserController@store');
    Route::get('/user/{id}/edit','UserController@edit');
    Route::post('/user/{id}/update','UserController@update');
    Route::get('/user/{id}/destroy','UserController@destroy');

});

Route::get('blog/{slug}','BlogController@isi_blog')->name('blog.isi');
Route::get('artikel/','BlogController@artikel')->name('artikel');
Route::get('/list-category/{category}','BlogController@list_category')->name('blog.category');
Route::get('/cari','BlogController@cari')->name('blog.cari');