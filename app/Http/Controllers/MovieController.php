<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screening;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * Show all movies
     *
     * @return void
     */
    public function show()
    {
        return view('movies', [
            "movies" => Movie::all()
        ]);
    }

    /**
     * Show a single movie
     *
     * @param number $id
     * @return void
     */
    public function showSingle($id)
    {
        $movie = Movie::find($id);
        $screenings = Screening::with("room")->where("movie_id", $id)->get();

        return view("movie", [
            "movie" => $movie,
            "screenings" => $screenings
        ]);
    }
}
