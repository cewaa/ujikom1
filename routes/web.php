<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

// Home route
Route::get('/', function () {
    return view('home');
});

// Login routes
Route::get('/login', function () {
    return view('auth.login');
})->name('user.login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route dengan middleware auth
Route::get('/dashboard', [DashboardController::class, 'index'])->name('index')->middleware('auth');


Route::resource('products', ProductController::class);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


