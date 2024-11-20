<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/messages', 'App\Http\Controllers\MessageController@index');
//Route::get('/messages/create', 'App\Http\Controllers\MessageController@create');
Route::post('/messages', 'App\Http\Controllers\MessageController@store');
