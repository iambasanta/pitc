<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;

// routes for admin
Route::group(['prefix'=>'admin'],function(){
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/',[HomeController::class,'index'])->name('admin.home')->middleware('PreventBackToHistory');

        Route::resource('members',MemberController::class)->except('show');

        Route::resource('categories',CategoryController::class)->except('show');
    });
});

Route::get('/', function () {
    return view('welcome');
});
