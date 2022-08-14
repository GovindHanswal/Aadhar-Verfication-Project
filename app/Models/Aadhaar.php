<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aadhaar extends Model
{
    use HasFactory;

    protected $table = 'aadhaar';
    
    protected $fillable = ['name', 'adhaar_id', 'age', 'mobile'];
}
