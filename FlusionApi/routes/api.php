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

Route::resource('sendflux','Send',[ 'only'=>['index','show', 'store'] ]);
Route::resource('receiveflux','Receive',[ 'only'=>['index','show', 'store'] ]);
