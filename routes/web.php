<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

//welcome
Route::get('/', function () {
    return ('welcome');
});

//home
Route::prefix('home')->group(function () {
        Route::resource('/', HomeController::class, ['names' => 'home']);
        Route::get('/search', [HomeController::class, 'search'])->name('search-home');
        Route::get('/page-show/{id}', [HomeController::class, 'show'])->name('home-show-page');
        Route::get('/page-categories/{id}', [CategoryController::class, 'show'])->name('home-category-page');
        Route::resource('/products', ProductController::class,['names' => 'product-index']);
        Route::get('/page-card',[HomeController::class, 'pageCard'])->name('page-card');
    });

// add to card
Route::post('/add-to-card/{id}', [CardController::class, 'addToCard'])->name('add-to-card');

// Register
Route::prefix('register')->group(function () {
    Route::get('/create', [RegisterController::class, 'create'])->name('register');
    Route::post('/', [RegisterController::class,'store'])->name('register-store');
});


// Login
route::get('/login', [LoginController::class,'index'])->name('page-login');
   



//admin
Route::prefix('admin')->group(function () {
        Route::resource('users', App\Http\Controllers\admin\UserController::class, ['names' => 'admin.users']);
});
    

