<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationOtp extends Model
{
    use HasFactory;

    protected $table = 'verification_otp';
    
    protected $fillable = ['mobile_no', 'otp'];
}
