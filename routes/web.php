<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypesController;
use App\Http\Controllers\SuppliersController;

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

Route::get('/', [DashboardController::class,'index'])->middleware('auth');
// product types routes
Route::get('product-types', [ProductTypesController::class,'index'])->name('product-types')->middleware('auth');
Route::get('get-types', [ProductTypesController::class,'get_types'])->name('get-data')->middleware('auth');
Route::post('store-types', [ProductTypesController::class,'store_types'])->name('store-types')->middleware('auth');
Route::get('update-type/{id}', [ProductTypesController::class,'update'])->name('update-type')->middleware('auth');
Route::delete('delete-type/{id}', [ProductTypesController::class,'destroy'])->name('delete-type')->middleware('auth');
// end of product types routes


// suppliers routes
Route::get('suppliers', [SuppliersController::class,'index'])->name('suppliers')->middleware('auth');
Route::get('get-suppliers', [SuppliersController::class,'get_suppliers'])->name('get-suppliers')->middleware('auth');
Route::post('store-suppliers', [SuppliersController::class,'store'])->name('store-suppliers')->middleware('auth');
Route::get('update-supplier/{id}', [SuppliersController::class,'update'])->name('update-supplier')->middleware('auth');
Route::delete('delete-supplier/{id}', [SuppliersController::class,'destroy'])->name('delete-supplier')->middleware('auth');
// end of suppliers routes

// Products routes
Route::get('products', [ProductController::class,'index'])->name('products')->middleware('auth');
Route::get('get-products', [ProductController::class,'get_products'])->name('get-products')->middleware('auth');
Route::post('store-products', [ProductController::class,'store'])->name('store-products')->middleware('auth');
Route::get('update-product/{id}', [ProductController::class,'update'])->name('update-product')->middleware('auth');
Route::delete('delete-product/{id}', [ProductController::class,'destroy'])->name('delete-product')->middleware('auth');
// end of Products routes

//Authentication routes
Auth::routes();
