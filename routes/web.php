<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get("/", function () {
    return view("home");
});

// All movies
Route::get('/movies', function () {
    return view('movies', [
        "movies" => Movie::all()
    ]);
});

// Single movie
Route::get('/movies/{id}', function ($id) {
    return view('movie', [
        "movie" => Movie::find($id)
    ]);
});

// About
Route::get("/about", function () {
    return view("about");
});
