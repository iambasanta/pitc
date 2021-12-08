<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;

// routes for admin
Route::group(['prefix'=>'admin'],function(){
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/',[HomeController::class,'index'])->name('admin.home')->middleware('PreventBackToHistory');

        Route::get('members',[MemberController::class,'index'])->name('members.index');
        Route::get('members/create',[MemberController::class,'create'])->name('members.create');
        Route::post('members/create',[MemberController::class,'store'])->name('members.store');
    });
});

Route::get('/', function () {
    return view('welcome');
});
