<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;

// All movies
Route::get('/', function () {
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
