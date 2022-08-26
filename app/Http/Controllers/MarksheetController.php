<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TenthData;
use App\Models\TwelvethData;
use App\Models\RegisteredAadhaar;

class MarksheetController extends Controller
{
    //
    public function createMarksheetData() {
        return view('Marksheet.marksheetCreate');
    }

    public function storeMarksheetData(Request $request) {
        $this->validate($request, [
            '10th_roll' => 'required',
            '12th_roll' => 'required',
            'name' => 'required',
            'father_name'=> 'required',
            'mother_name' => 'required',
            'dob' => 'required'
        ]);

        $tenthData = [
            '10th_roll' => $request['10th_roll'],
            'name' => $request['name'],
            'father_name' => $request['father_name'],
            'mother_name' => $request['mother_name'],
            'dob' => $request['dob']
        ];

        $twelevethData = [
            '12th_roll' => $request['12th_roll'],
            'name' => $request['name'],
            'father_name' => $request['father_name'],
            'mother_name' => $request['mother_name'],
            'dob' => $request['dob']
        ];

        TenthData::create($tenthData);
        TwelvethData::create($twelevethData);
    }



    public function jnuMarksheetVerifyPage() {
        return view('Verify.verify-marksheet');
    }

    public function jnuMarkeetVerify(Request $request) {
       
        $name_check = false;
        $father_name_check = false;
        $mother_name_check = false;
        $dob_check = false;

        $this->validate($request, [
            '10th_roll' => 'required',
            '12th_roll' => 'required'
        ]);

        $id = $request['10th_roll'] . $request['12th_roll'];

        $check_if_exits = RegisteredAadhaar::where('user_id', $id)->first();

        if(!$check_if_exits) {
            $tenthData = TenthData::where('10th_roll', $request['10th_roll'])->first();
            $twelvethData = TwelvethData::where('12th_roll' , $request['12th_roll'])->first();
    
            if($tenthData['name'] == $twelvethData['name']) {
                $name_check = true;
            }
    
            if($tenthData['father_name'] == $twelvethData['father_name']) {
                $father_name_check = true;
            }
    
            if($tenthData['mother_name'] == $twelvethData['mother_name']) {
                $mother_name_check = true;
            }
    
            if($tenthData['dob'] == $twelvethData['dob']) {
                $dob_check = true;
            }
    
            if($name_check && $father_name_check && $mother_name_check && $dob_check) {
    
                $userData = [
                    'user_id' => $id,
                ];
                session()->forget('userData');
                session()->put('userData', $userData);

                $marksheetData = [
                    '10th_roll' => $request['10th_roll'],
                    '12th_roll' => $request['12th_roll']
                ];

                session()->forget('marksheetData');
                session()->put('marksheetData', $marksheetData);

                return redirect()->route('register-createPage')->with(['message' => 'Successfully verified', 'success' => true]);
            }
            else {
                return redirect()->back()->with(['error' => 'Authentication failed', 'success' => false]);
            }
        }
        else {
            return redirect()->back()->with(['error' => 'User already exists', 'success' => false]);
        }



        
    }
}
