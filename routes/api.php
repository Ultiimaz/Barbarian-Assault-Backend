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

Route::middleware('auth:api')->get('/buildings','CityController@index');
Route::post('/login',function(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials))
    {
        Auth::user()->createToken("test")->accessToken;
        return response()->json('success');
    }

    return response('username or password incorrect',403);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','API\ApiController@register');
Route::middleware('auth:api')->get('/token', function (Request $request) {
    return response()->json(Auth::user()->createToken("test"));
});


Route::middleware(['timer','auth:api'])->post('/upgrade','UpgradeController@store'); // handles all the upgrades