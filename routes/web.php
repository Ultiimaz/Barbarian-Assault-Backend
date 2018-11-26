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

// get links
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pages/{id}','Pages\PageController@show');
Route::get('/pages','Pages\PageController@index')->name('pages'); // index of all the pages that currently exists
Route::get('/token', function () {
  return Auth::user()->createToken("fdgdfgfdg");
});
Route::get('/', function () {
    return view('welcome');
});

// post links
Route::post('deploy', 'DeployController@deploy');

// middleware
Route::middleware('auth:web')->get('/newpage',function () {
    return view('pages.create');
})->name('addpage');
Route::middleware('auth:web')->get('/settings','SettingsController@index')->name('settings');
Route::middleware('auth:web')->put('/settings','SettingsController@store');
Route::middleware('auth:web')->post('/newpage','Pages\PageController@create');
Route::middleware('auth:web')->post('/pages/{pageId}/create','Pages\PostController@create');
Route::middleware('auth:web')->post('/pages/{pageId}/update','Pages\PostController@update');
Route::middleware('auth:web')->post('/pages/{pageId}/delete','Pages\PostController@delete');
Auth::routes();

