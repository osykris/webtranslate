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
Route::get('/search_au', function () {
    return view('au');
});
Route::get('/search_ad', function () {
    return view('ad');
});
Route::get('/search_al', function () {
    return view('al');
});
Auth::routes();

Route::get('/search',[App\Http\Controllers\SearchController::class, 'search']);
Route::get('/au',[App\Http\Controllers\SearchController::class, 'search_au']);
Route::get('/ad',[App\Http\Controllers\SearchController::class, 'search_ad']);
Route::get('/al',[App\Http\Controllers\SearchController::class, 'search_al']);
Route::get('/read',[App\Http\Controllers\SearchController::class, 'read']);
Route::get('detail/{id}', [App\Http\Controllers\SearchController::class, 'detail']);
Route::get('/word-of-the-day', [App\Http\Controllers\SearchController::class, 'word']);
Route::get('/popular', [App\Http\Controllers\SearchController::class, 'populer']);
Route::get('/marker/',  [App\Http\Controllers\SearchController::class, 'gambar']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/add/save', 'App\Http\Controllers\KataController@store');
    Route::get('/edit/',  'App\Http\Controllers\KataController@edit');
    Route::post('/update/',  'App\Http\Controllers\KataController@update');
    Route::get('/hapus/', 'App\Http\Controllers\KataController@delete');
    Route::post('/destroy/', 'App\Http\Controllers\KataController@destroy');
});
