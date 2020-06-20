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


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/khatma/', 'KhatmaController@index');
Route::get('/khatma/create', 'KhatmaController@create');
Route::post('/khatma', 'KhatmaController@store');
Route::get('/khatma/show', 'KhatmaController@show');
 


/*
Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show'); 
Route::post('follow/{user}',  'FollowsController@store');
Route::post('/p', 'PostsController@store');
*/