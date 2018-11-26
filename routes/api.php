<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','API\ApiController@register');
Route::middleware('auth:api')->get('/token', function (Request $request) {
    return response()->json(Auth::user()->createToken("test"));
});
Route::middleware('auth:api')->post('/newpost','Api\ApiController@store');
Route::middleware('auth:api')->get('/pages/{id}','Api\ApiController@show');
Route::get('/pages','ApiController@index');
