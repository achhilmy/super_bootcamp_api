<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/// Get Data api for item
Route::get('/items', 'App\Http\Controllers\Api\ItemController@index');

/// Post Data Item 
Route::post('/items/create', 'App\Http\Controllers\Api\ItemController@store');

///Get Data By Id
Route::get('/items/{item}', 'App\Http\Controllers\Api\ItemController@show');

///Update Data memakai put untuk edit data 
Route::put('/items/{id}/update', 'App\Http\Controllers\Api\ItemController@update');

/// method delete untuk menghapus data 
Route::delete('/items/{id}/delete', 'App\Http\Controllers\Api\ItemController@destroy');


