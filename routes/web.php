<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //for admin
    Route::group(['prefix' => 'category','middleware'=> 'admin_auth'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name("category#list");
        Route::get('create/page', [CategoryController::class, 'createPage'])->name("category#createPage");
        Route::post('create', [CategoryController::class, 'create'])->name("category#create");

    });

    //for user
    Route::group(['prefix' => 'user','middleware'=> 'user_auth'], function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });
});

Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
// Route::post('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');


