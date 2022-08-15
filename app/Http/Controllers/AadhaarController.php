<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\User;
use App\Models\Aadhaar;
use App\Models\College;
use App\Models\VerificationOtp;
use App\Http\Controllers\OtpController;
use App\Models\RegisteredAadhaar;
use App\Models\JecrcStudents;
use App\Models\Students;

use Illuminate\Http\Request;

class AadhaarController extends Controller
{
    private $otpController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OtpController $otpController){
        $this->otpController = $otpController;
    }

    public function aadhaarCreatePage() {
        return view('Aadhaar.aadhaar');
    }

    public function aadhaarStore(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'father_name' => 'required',
            'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            'gender' => 'required',
            'aadhaar_no' => 'required',
            'age' => 'required'
        ]);

        $file = $request['image'];
        $image = Storage::putFile('aadhaar', $file);

        $data = [
            'aadhaar_no' => $request['aadhaar_no'],
            'name' => $request['name'],
            'father_name' => $request['father_name'],
            'image' => $image,
            'mobile_no' => $request['mobile_no'],
            'age' => $request['age'],
            'gender' => $request['gender'],
        ];

        $store = Aadhaar::insert($data);

        if($store) {
            return redirect()->back()->with(['message' => 'Data successfully created', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Some error occur', 'success' => false]);
        }
    }

    public function verifyAadhaarPage() {

        return view('Aadhaar.new-aadhaarValidate', [
            'aadhaarData' => [],
        ]);
    }

    public function verifyMobilePage() {

        $registration = session()->get('registration');

        if($registration) {
            return view('Aadhaar.new-verifyOtp', [
                'aadhaarData' => []
            ]);
        }
        else {
            return redirect()->route('verify-page');
        }
    }

    public function verifyAadhaarDetails(Request $request) {
        $userCheck = false;
        
        $this->validate($request, [
            'aadhaar_no' => 'required'
        ]);

        $user = Students::where('aadhaar_no', $request['aadhaar_no'])->first();

        if($user == null) {
            $userCheck = true;
        }

        if($userCheck) {

            session()->put('registration', true);

            $data = Aadhaar::where('aadhaar_no', $request['aadhaar_no'])->first();
    
            if($data) {
                $mobile_no = $data->mobile_no;
    
                // genrate otp function call
                $genrateOtp = $this->otpController->genrateOtp($mobile_no);
    
                if($genrateOtp) {
    
                    $userData = [
                        'mobile_no' => $mobile_no,
                        'aadhaar_no' => $data->aadhaar_no,
                        'name' => $data->name,
                    ];
                    session()->forget('userData');
                    session()->put('userData', $userData);
    
                    return redirect()->route('verify-mobile');
                }
                else {
                    return redirect()->back()->with(['error' => 'Authentication failed', 'success' => false]);
                }
            }
            else {
                return redirect()->back()->with(['error' => 'Invalid aadhaar details', 'success' => false]);
            }
        }
        else {
            return redirect()->back()->with(['error' => 'User already registered', 'success' => false]);
        }
    }

    public function verifyOtp(Request $request) {

        $otpMatch = false;

        $this->validate($request, [
            'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            'otp' => 'required|integer|numeric|digits:6'
        ]);

        $getData = VerificationOtp::where('mobile_no', $request->mobile_no)->first();

        if($getData->otp == $request->otp) {
            $otpMatch = true;
        }
        
        if($otpMatch) {
            return redirect()->route('register-createPage')->with(['message' => 'Successfully verified', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Authentication failed', 'success' => false]);
        }
    }

    public function resendOtp(Request $request) {

        $mobile_no = $request['value'];
        $genrateOtp = $this->otpController->genrateOtp($mobile_no);

        if($genrateOtp) {
            return true;
        }
        else {
            return false;
        }
    }


    public function jecrcAadhaarVerificationPage() {
        return view('Jecrc.aadhaarVerification');
    }

    public function jecrcVerifyAadhaarDetails(Request $request) {

        $userCheck = false;
        
        $this->validate($request, [
            'aadhaar_no' => 'required'
        ]);

        $user = jecrcStudents::where('aadhaar_no', $request['aadhaar_no'])->first();

        if($user == null) {
            $userCheck = true;
        }

        if($userCheck) {

            session()->put('registration', true);

            $data = Aadhaar::where('aadhaar_no', $request['aadhaar_no'])->first();
    
            if($data) {
                $mobile_no = $data->mobile_no;
    
                // genrate otp function call
                $genrateOtp = $this->otpController->genrateOtp($mobile_no);
    
                if($genrateOtp) {
    
                    $userData = [
                        'mobile_no' => $mobile_no,
                        'aadhaar_no' => $data->aadhaar_no,
                        'name' => $data->name,
                    ];
                    session()->forget('userData');
                    session()->put('userData', $userData);
    
                    return view('Jecrc.otpVerification');
                }
                else {
                    return redirect()->back()->with(['error' => 'Authentication failed', 'success' => false]);
                }
            }
            else {
                return redirect()->back()->with(['error' => 'Invalid aadhaar details', 'success' => false]);
            }
        }
        else {
            return redirect()->back()->with(['error' => 'User already registered', 'success' => false]);
        }
    }

    public function jecrcVerifyOtp(Request $request) {

        $otpMatch = false;

        $this->validate($request, [
            'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
            'otp' => 'required|integer|numeric|digits:6'
        ]);

        $getData = VerificationOtp::where('mobile_no', $request->mobile_no)->first();

        if($getData->otp == $request->otp) {
            $otpMatch = true;
        }
        
        if($otpMatch) {
            return redirect()->route('jecrc.registration-page')->with(['message' => 'Successfully verified', 'success' => true]);
        }
        else {
            return redirect()->back()->with(['error' => 'Authentication failed', 'success' => false]);
        }
    }
}
