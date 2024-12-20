<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesReportController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->middleware('guest');


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::post('/profile/picture', [AuthController::class, 'updateProfilePicture'])->name('profile.picture.update');
});

Route::resource('users', UserController::class);
Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('stocks', StockController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('staffs', StaffController::class);
Route::resource('sales', SaleController::class);


Route::get('/sales_reports/generate', [SalesReportController::class, 'generateReports'])->name('sales_reports.generate');
Route::resource('sales_reports', SalesReportController::class)->only(['index', 'show']);


Route::get('orders/{order}/payment', [PaymentController::class, 'create'])->name('payments.create');
Route::post('orders/{order}/payment', [PaymentController::class, 'store'])->name('payments.store');

