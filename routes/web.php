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
})->name('home');

Route::resource('participants','ParticipantController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/fetch', 'ProductController@fetch')->name('product.fetch');
Route::get('/product/{product_id}/edit', 'ProductController@edit')->name('product.edit');
Route::get('/product/{product_id}/destroy', 'ProductController@destroy')->name('product.destroy');

Route::get('/participant', 'ParticipantController@index')->name('participant')->middleware('auth');
Route::get('/participant/fetch', 'ParticipantController@fetch')->name('participant.fetch')->middleware('auth');
Route::get('/participant/{participant_id}/edit', 'ParticipantController@edit')->name('participant.edit')->middleware('auth');
Route::get('/participant/{participant_id}/destroy', 'ParticipantController@destroy')->name('participant.destroy')->middleware('auth');
Route::get('/participantgetvideo/{uuid}', 'ParticipantController@getvideofile')->name('participant.getvideo')->middleware('auth');
