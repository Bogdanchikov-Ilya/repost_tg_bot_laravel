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
    \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5045491073:AAGn4ZZuWH9XYxKNf6lj8s-aqnY441KfoDU/sendMessage', [
        'chat_id' => 761657672,
        'text' => 'dsfdsfsd'
    ]);
});
