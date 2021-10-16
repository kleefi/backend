<?php

use Illuminate\Http\Request;

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

Route::middleware(['cors'])->group(function () {

    Route::get('/','apicontroller@get_pegawai');
    Route::get('/{id}','apicontroller@single_pegawai');
    Route::post('/','apicontroller@insert_pegawai');
    Route::put('/{id}', 'apicontroller@update_pegawai');
    Route::delete('/{id}', 'apicontroller@delete_pegawai');
});