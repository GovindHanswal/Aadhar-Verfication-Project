<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Storage;
use App\Models\User;
use App\Models\JnuStudents;
use App\Models\JecrcStudents;
use App\Models\RegisteredAadhaar;

class RegisterController extends Controller
{
    /**
     * function to return jnu registration page
     */
    public function registerCreatePage() {
        return view('Register.new-register');
    }

    /**
     * function to return user credentials after registration
     */
    public function credentialPage() {
        return view('Register.credentials');
    }

    /**
     * function to register jnu students
     */
    public function register(Request $request) {
        
        $this->validate($request, [
            'full_name' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'course' => 'required',
            'gender' => 'required',
            'aadhaar_no' => 'required_without:user_id',
            'user_id' => 'required_without:aadhaar_no',
            '10_marksheet' => 'required',
            '12_marksheet' => 'required',
            'profile_image' => 'required'
        ]);

        $profile = $request['profile_image'];
        $profile_path = Storage::putFile('profile', $profile);

        $marksheet_10 = $request['10_marksheet'];
        $marksheet_10_path = Storage::putFile('marksheet/tenth', $marksheet_10);

        $marksheet_12 = $request['12_marksheet'];
        $marksheet_12_path = Storage::putFile('marksheet/twelth', $marksheet_12);

        $data = [
            'full_name' => $request['full_name'],
            'dob' => $request['dob'],
            'father_name' => $request['father_name'],
            'mobile_no' => $request['mobile_no'],
            'email' => $request['email'],
            'course' => $request['course'],
            'gender' => $request['gender'],
            'role' => 2,
            // 'aadhaar_no' => $request['aadhaar_no'],
            '10_marksheet' => $marksheet_10_path,
            '12_marksheet' => $marksheet_12_path,
            'profile_image' => $profile_path,
            'college_id' => "C-140623",
            'status' => 1,
        ];

        if($request['aadhaar_no']) {
            $data['aadhaar_no'] = $request['aadhaar_no'];
            $data['user_id'] = "";
        }
        
        if($request['user_id']) {
            $data['aadhaar_no'] = "";
            $data['user_id'] = $request['user_id'];
        }

        // $random = rand(10000, 99999);

        // $username = "U" . $random;
        // $password = Hash::make($username);

        // $data['username'] = $username;
        // $data['password'] = $password;

        if($request['aadhaar_no']) {
            $store = JnuStudents::updateOrCreate(['aadhaar_no' => $request['aadhaar_no']], $data);
        }

        if($request['user_id']) {
            $store = JnuStudents::updateOrCreate(['user_id' => $request['user_id']], $data);
        }

        if($store) {

            $registeredData = [
                'aadhaar_no' => $request['aadhaar_no'] ? $request['aadhaar_no'] : "",
                'user_id' =>  $request['user_id'] ? $request['user_id'] : "",
                'college_id' => "",
                'status' => 1
            ];

            RegisteredAadhaar::updateOrCreate(['user_id' => $request['user_id']], $registeredData);

            // $registedData = [
            //     'aadhaar_no' => $request['aadhaar_no'],
            //     'college_id' => $data['college_id']
            // ];

            // RegisteredAadhaar::updateOrCreate(['aadhaar_no' => $request['aadhaar_no']], $registedData);

            // $data = [
            //     'username' => $username,
            //     'password' => $username
            // ];
            // session()->forget('credentials');
            // session()->put('credentials', $data);

            return redirect()->route('credential-page')->with(['message' => 'Your request seccessfully submitted', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Some error occur', 'success' => false]);
        }
    }


    /**
     * function to view jecrc registration page
     */
    public function jecrcRegistrationPage() {
        return view('Jecrc.registration');
    }



    /**
     * function to register jecrc students
     */
    public function jecrcRegistrationStore(Request $request) {

        $this->validate($request, [
            'full_name' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'course' => 'required',
            'gender' => 'required',
            'aadhaar_no' => 'required',
            '10_marksheet' => 'required',
            '12_marksheet' => 'required',
            'profile_image' => 'required'
        ]);

        $profile = $request['profile_image'];
        $profile_path = Storage::putFile('profile', $profile);

        $marksheet_10 = $request['10_marksheet'];
        $marksheet_10_path = Storage::putFile('marksheet/tenth', $marksheet_10);

        $marksheet_12 = $request['10_marksheet'];
        $marksheet_12_path = Storage::putFile('marksheet/twelth', $marksheet_12);

        $data = [
            'full_name' => $request['full_name'],
            'dob' => $request['dob'],
            'father_name' => $request['father_name'],
            'mobile_no' => $request['mobile_no'],
            'email' => $request['email'],
            'course' => $request['course'],
            'gender' => $request['gender'],
            'role' => 2,
            'aadhaar_no' => $request['aadhaar_no'],
            '10_marksheet' => $marksheet_10_path,
            '12_marksheet' => $marksheet_12_path,
            'profile_image' => $profile_path,
            'college_id' => "C-435672",
            'status' => 1,
        ];

        // $random = rand(10000, 99999);

        // $username = "U" . $random;
        // $password = Hash::make($username);

        // $data['username'] = $username;
        // $data['password'] = $password;

        $store = jecrcStudents::updateOrCreate(['aadhaar_no' => $request['aadhaar_no']], $data);

        if($store) {

            // $registedData = [
            //     'aadhaar_no' => $request['aadhaar_no'],
            //     'college_id' => $data['college_id']
            // ];

            // RegisteredAadhaar::updateOrCreate(['aadhaar_no' => $request['aadhaar_no']], $registedData);

            // $data = [
            //     'username' => $username,
            //     'password' => $username
            // ];
            // session()->forget('credentials');
            // session()->put('credentials', $data);

            return redirect()->route('credential-page')->with(['message' => 'Your request seccessfully submitted', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Some error occur', 'success' => false]);
        }
    }
}
