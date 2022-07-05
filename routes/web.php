<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;
use App\Http\Controllers\portal;
use App\Http\Controllers\shop;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
    Route::group(['middleware' => ['auth','prevent-back-history','cors']], function () {
        Route::get('/',[portal::class,'main']);
        Route::get('/table',[test::class,'LoadTable'])->middleware('only.ajax')->name('table');
       

   
    
    });

