<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegisteredAadhaar;

class RegisteredAadhaarController extends Controller
{
    //
    public function createPage() {
        return view('Aadhaar.registeredAadhaar');
    }

    public function store(Request $request) {
        $registedData = [
            'aadhaar_no' => $request['aadhaar_no'],
            'college_id' => $request['college_id']
        ];

        $store = RegisteredAadhaar::updateOrCreate(['aadhaar_no' => $request['aadhaar_no']], $registedData);

        if($store) {
            return redirect()->back()->with(['messege' => 'successfully stores', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Some error occur', 'success' => false]);
        }
    }
}
