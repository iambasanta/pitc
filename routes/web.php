<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

// routes for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('form');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group([
        'middleware' => ['auth', 'check-permissions']
    ], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('PreventBackToHistory');

        Route::get('/profile', [HomeController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [HomeController::class, 'update'])->name('profile.update');

        Route::resource('users', UserController::class);

        Route::resource('members', MemberController::class)->except('show');

        Route::resource('categories', CategoryController::class)->except('show');

        Route::patch('posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('posts/force-destroy/{post}', [PostController::class, 'forceDestroy'])->name('posts.force-destroy');
        Route::resource('posts', PostController::class)->except('show');

        Route::resource('events', EventController::class)->except('show');
    });
});

Route::get('/', function () {
    return view('welcome');
});
