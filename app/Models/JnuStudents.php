<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class JnuStudents extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'jnu_students';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'full_name', 'username', 'password', 'aadhaar_no', 'father_name', 'mobile_no', 'dob', 'college_id', 'college_name', 'role', 'profile_image', 'status', 'email', 'course', 'gender', '10_marksheet', '12_marksheet'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
