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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('join', function () {
//     return view('join');
// });
 

Route::get('/','KhatmaController@index');

Route::get('/khatma/', 'KhatmaController@index');
Route::get('/khatma/create', 'KhatmaController@create');
Route::post('/khatma', 'KhatmaController@store');
Route::get('/khatma/{khatma}', 'KhatmaController@show');
Route::delete('/khatma/{khatma}', 'KhatmaController@destroy');


Route::get('/khatma/{khatma}/join', 'KhatmaController@join');
Route::patch('/khatma/{khatma}', 'KhatmaController@update');


Route::resource('khatma', 'KhatmaController');