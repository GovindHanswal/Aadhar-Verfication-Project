<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwelvethData extends Model
{
    use HasFactory;

    protected $table = 'twelveth_data';

    protected $fillable = [
        '12th_roll', 'name', 'father_name', 'mother_name', 'dob'
    ];
}
