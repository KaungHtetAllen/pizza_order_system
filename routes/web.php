<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //for admin

    Route::middleware(['admin_auth'])->group(function () {
        //category
        Route::group(['prefix' => 'category', 'middleware' => 'admin_auth'], function () {
            Route::get('list', [CategoryController::class, 'list'])->name("category#list");
            Route::get('create/page', [CategoryController::class, 'createPage'])->name("category#createPage");
            Route::post('create', [CategoryController::class, 'create'])->name("category#create");
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');

        });

        //admin account
        Route::prefix('admin')->group(function () {

            //password
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('changePassword', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            //profile
            Route::get('details',[AdminController::class,'details'])->name('admin#details');
            Route::get('edit',[AdminController::class,'edit'])->name('admin#edit');
        });
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


