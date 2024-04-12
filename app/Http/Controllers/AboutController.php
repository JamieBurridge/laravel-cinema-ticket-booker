<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show about page
     *
     * @return void
     */
    public function show()
    {
        return view("about");
    }
}
