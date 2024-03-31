<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // use HasFactory;
    protected $fillable = [
        'screening_id',
        'name',
        'email',
        'number_of_people',
    ];
}
