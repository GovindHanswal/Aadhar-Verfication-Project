<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredAadhaar extends Model
{
    use HasFactory;
    
    protected $table = 'registered_aadhaar';

    protected $fillable = ['aadhaar_no', 'college_id'];
}
