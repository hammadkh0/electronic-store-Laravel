<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class,'index'])->name('users.home');

Route::get('/admin', [AdminHomeController::class,'index'])->name('admin.home');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// Route::post('/dashboard',[DashboardController::class,'store']);

Route::get('/register/admin',[RegisterController::class, 'adminRegisterForm'])->name('admin.register');
Route::post('/register/admin',[RegisterController::class, 'storeAdmin']);
Route::get('/register/user',[RegisterController::class, 'userRegisterForm'])->name('user.register');
Route::post('/register/user',[RegisterController::class, 'storeUser']);

Route::get('/login/admin',[LoginController::class, 'adminLoginForm'])->name('login');
Route::post('/login/admin',[LoginController::class, 'storeAdmin']);
Route::get('/login/user',[LoginController::class, 'userLoginForm'])->name('login'); 
Route::post('/login/user',[LoginController::class, 'storeUser']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/admin/form',[ProductController::class, 'index'])->name('form');
Route::post('/admin/form',[ProductController::class, 'store']);

Route::delete('/admin/product/delete/{product}',[ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/admin/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::patch('/admin/product/{product}',[ProductController::class, 'update'])->name('product.update');

Route::patch('/dashboard/users/{user}',[DashboardController::class, 'update'])->name('user.update');

Route::get('/products/{product}',[ProductController::class, 'show'])->name('product.show');

Route::get('/cart',[CartController::class, 'index'])->name('cart');
Route::post('/cart/{product}',[CartController::class, 'store'])->name('cart');