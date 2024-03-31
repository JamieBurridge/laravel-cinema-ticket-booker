<?php

use App\Models\Movie;
use App\Models\Screening;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Show screening
Route::get("/movies/{id}/book/{screening_id}", function ($id, $screening_id) {
    $movie = Movie::find($id);
    $screening = Screening::with("room")->find($screening_id);

    return view("book", [
        "movie" => $movie,
        "screening" => $screening
    ]);
});

// Book 
Route::post("/movies/{id}/book/{screening_id}", function (Request $request, $id, $screening_id) {
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'number_of_people' => 'required|integer|min:1',
    ]);

    // Create a new booking record
    Booking::create([
        'screening_id' => $screening_id,
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'number_of_people' => $validatedData['number_of_people'],
    ]);

    // Redirect back or to a success page
    return redirect()->back()->with('success', "Thank you " . $validatedData["name"] . "! Your booking has been successfull!");
});

// About
Route::get("/about", function () {
    return view("about");
});
