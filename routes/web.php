<?php

use App\Http\Controllers\Product\ProductsController;
use Illuminate\Support\Facades\Route;




Route::get('/',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products',action: [ProductsController::class,'store'])->name('products.store');
Route::get('/products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');
Route::get('/products/remove/{id}',[ProductsController::class,'remove'])->name('products.remove');
Route::post('/products/update/{id}',[ProductsController::class,'update'])->name('products.update');

