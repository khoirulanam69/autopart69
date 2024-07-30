<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'store']);
  Route::get('/forgotpassword', [ForgotPasswordController::class, 'index'])->name('forgotpassword');
  Route::post('/forgotpassword', [ForgotPasswordController::class, 'store']);
  Route::get('/newpassword/{email}', [ForgotPasswordController::class, 'newPassword'])->name('newpassword');
  Route::post('/newpassword', [ForgotPasswordController::class, 'storeNewPassword']);
});

Route::middleware('auth')->group(function () {
  Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard');
  Route::get('/products', [ProductController::class, 'index'])->name('products');
  Route::get('/api/products', [ProductController::class, 'getProducts'])->name('api.products');
  Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
  Route::post('/products', [ProductController::class, 'store'])->name('products.store');
  Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
  Route::get('/orders', [PagesController::class, 'order'])->name('order');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
