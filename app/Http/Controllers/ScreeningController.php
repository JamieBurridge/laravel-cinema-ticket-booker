<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screening;
use App\Models\Booking;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    /**
     * Show single screening
     *
     * @param number $id
     * @param number $screening_id
     * @return void
     */
    public function showSingle($id, $screening_id)
    {
        $movie = Movie::find($id);
        $screening = Screening::with("room")->find($screening_id);

        if ($screening->seats_available == 0) {
            return redirect("/");
        }

        return view("book", [
            "movie" => $movie,
            "screening" => $screening
        ]);
    }


    /**
     * Add booking
     *
     * @param Request $request
     * @param number $id
     * @param number $screening_id
     * @return void
     */
    public function add(Request $request, $id, $screening_id)
    {
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

        // Update seats available
        $screening = Screening::findOrFail($screening_id);
        $screening->update([
            "seats_available" => $screening["seats_available"] - $validatedData['number_of_people']
        ]);


        // Redirect back or to a success page
        return redirect("/movies/$id/book/$screening_id/success")->with('success', "Thank you " . $validatedData["name"] . "! Your booking has been successfull!");
    }

    /**
     * Show success message after booking a ticket
     *
     * @return void
     */
    public function showSuccess()
    {
        if (session("success")) {
            return view("book-success");
        } else {
            return redirect("/");
        }
    }
}
