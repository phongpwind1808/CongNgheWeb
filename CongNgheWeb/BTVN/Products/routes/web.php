<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get("/", [ProductController::class,"index"])->name("product.index");

Route::get("/products/create", [ProductController::class,"create"])->name("product.create");

Route::post("/products",[ProductController::class,"store"])->name("product.store");

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put("/products/{products}", [ProductController::class,"update"])->name("product.update");

Route::delete("/products/{products}", [ProductController::class,"destroy"])->name("product.destroy");

