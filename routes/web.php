<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "web" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 
