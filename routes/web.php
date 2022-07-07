<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserRightsController;
use App\Http\Controllers\RoleRightsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
    Route::group(['middleware' => ['auth','prevent-back-history','cors']], function () {
        // Route::get('/',[portal::class,'main']);
        // Route::get('/table',[test::class,'LoadTable'])->middleware('only.ajax')->name('table');
     // Route::get('/table',[test::class,'LoadTable'])->middleware('only.ajax')->name('table');

        // Route::get('/',function(){return view('master');});
        Route::get('/dashboard',[UserManagementController::class,'loadHome'])->middleware('only.ajax')->name('dashboard');
        Route::get('/alluser',[UserManagementController::class,'loadHome'])->middleware('only.ajax')->name('alluser');
        Route::get('/',[PortalController::class,'main']);
        Route::get('/assignuserrights/{id}/{f_name}/{l_name}',[UserRightsController::class,'showMenus'])->middleware('only.ajax');
        Route::post('/assignUserRightsSubmit',[UserRightsController::class,'assignRiights'])->middleware('only.ajax');
        Route::get('/allroles',[RoleRightsController::class,'AllRoles'])->middleware('only.ajax')->name('allroles');
        Route::get('/assignrolerights/{id}/{role_name}',[RoleRightsController::class,'showMenus'])->middleware('only.ajax');
        Route::post('/assignRoleRightsSubmit',[RoleRightsController::class,'assignRoleRiights'])->middleware('only.ajax');

   
    
    });

