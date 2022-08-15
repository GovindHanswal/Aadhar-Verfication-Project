<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    //
    public function adminCreate(Request $request) {
       
        $data = [
            'name' => 'Admin',
            'role' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123')
        ];

        $store = User::insert($data);

        if($store) {
            return "successfully created";
        }
        else {
            return "some error occur";
        }
    }
}
