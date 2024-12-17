<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get("/", [PostController::class, "index"])->name("posts.index");;
Route::get("/create", [PostController::class, "create"])->name("posts.create");
Route::get("/store", [PostController::class, "store"])->name("posts.store");
Route::get("/edit/{post}", [PostController::class, "edit"])->name("posts.edit");
Route::get("/update/{post}", [PostController::class, "update"])->name("posts.update");
Route::get("/show/{post}", [PostController::class, "show"])->name("posts.show");
Route::get("/destroy/{post}", [PostController::class, "destroy"])->name("posts.delete");
