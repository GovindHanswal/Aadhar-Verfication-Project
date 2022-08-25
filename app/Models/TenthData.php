<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenthData extends Model
{
    use HasFactory;

    protected $table = 'tenth_data';

    protected $fillable = [
        '10th_roll', 'name', 'father_name', 'mother_name', 'dob'
    ];
}
