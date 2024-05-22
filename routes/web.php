<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search-home');
Route::get('/page-show/{id}', [HomeController::class, 'show'])->name('home-show-page');
Route::get('/page-categories/{id}', [CategoryController::class, 'show'])->name('home-category-page');
Route::get('/products', [ProductController::class, 'index'])->name('product-index');
Route::get('/contact-page', [HomeController::class, 'contact'])->name('contact-page');
Route::get('/filter-products', [ProductController::class, 'filterPrice'])->name('filter');
Route::get('/filter-search', [HomeController::class, 'filter'])->name('filter-search');
Route::get('/filter-categories', [CategoryController::class, 'filter'])->name('filter-categories');

// add to card
Route::post('/add-to-card/{id}', [CardController::class, 'addToCard'])->name('add-to-card');
Route::get('/page-card', [CardController::class, 'showCard'])->name('page-card');
Route::delete('/delete-card/{id}', [CardController::class, 'deleteCard'])->name('delete-card');
Route::put('/update-card/{id}', [CardController::class, 'updateCard'])->name('update-card');

//checkout
Route::get('/checkout-page', [CardController::class, 'showCardCheckout'])->name('checkout-page');
Route::post('/checkout', [CheckoutController::class, 'handleCheckout'])->name('checkout');


// admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\admin\HomeAdminController::class, 'index'])->name('dashboard-admin');
    Route::resource('users', App\Http\Controllers\admin\UserController::class, ['names' => 'admin.users']);
    Route::resource('products', App\Http\Controllers\admin\ProductController::class, ['names' => 'admin.products']);
    Route::resource('categories', App\Http\Controllers\admin\CategoryController::class, ['names' => 'admin.categories']);
    Route::resource('orders', App\Http\Controllers\admin\OrderController::class, ['names' => 'admin.orders']);
    Route::resource('order-items', App\Http\Controllers\admin\OrderItemController::class, ['names' => 'admin.order-items']);
});

// validate
Route::get('/login-vali', [HomeController::class, 'vali'])->name('vali');
Route::post('/login-handlevali', [HomeController::class, 'handleVali'])->name('handleVali');

