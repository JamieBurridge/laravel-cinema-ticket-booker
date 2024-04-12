<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = ["seats_available"];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
