<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'category'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name("category#list");
    });
});

Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
// Route::post('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');


