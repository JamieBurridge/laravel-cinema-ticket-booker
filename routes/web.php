<?php

use App\Models\Movie;
use App\Models\Screening;
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
    $movie = Movie::find($id);
    $screenings = Screening::with("room")->where("movie_id", $id)->get();

    return view("movie", [
        "movie" => $movie,
        "screenings" => $screenings
    ]);
});

// Show all screenings
Route::get("/movies/{id}/book/{screening_id}", function ($id, $screening_id) {
    $movie = Movie::find($id);
    $screening = Screening::with("room")->find($screening_id);

    return view("book", [
        "movie" => $movie,
        "screening" => $screening
    ]);
});

// About
Route::get("/about", function () {
    return view("about");
});


