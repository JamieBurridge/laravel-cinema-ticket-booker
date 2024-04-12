<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScreeningController;

Route::get("/", [HomeController::class, "show"]);

Route::get('/movies', [MovieController::class, "show"]);
Route::get('/movies/{id}', [MovieController::class, "showSingle"]);

Route::get("/movies/{id}/book/{screening_id}", [ScreeningController::class, "showSingle"]);
Route::post("/movies/{id}/book/{screening_id}", [ScreeningController::class, "add"]);
Route::get("/movies/{id}/book/{screening_id}/success", [ScreeningController::class, "showSuccess"]);

Route::get("/about", [AboutController::class, "show"]);
