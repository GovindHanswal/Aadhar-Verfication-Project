<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Mail;
use App\Models\JnuStudents;
use App\Models\JecrcStudents;
use App\Models\Students;
use App\Models\RegisteredAadhaar;

class DashboardController extends Controller
{
    //
    public function jnuDashboard() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $requestList = JnuStudents::where('status', "1")->get();
                return view('Dashboard.dashboard', [
                    'requestList' => $requestList
                ]);
            }
        }
        return redirect()->route('login');
    }

    public function jecrcDashboard() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $requestList = JecrcStudents::where('status', "1")->get();
                return view('Jecrc.dashboard', [
                    'requestList' =>$requestList
                ]);
            }
        }
        return redirect()->route('jecrc.login');
    }

    /**
     * reject applications list for jnu
     */
    public function jnuRejectStudentList() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $rejectList = JnuStudents::where('status', "3")->get();
                return view('Dashboard.rejectedList', [
                    'rejectList' => $rejectList
                ]);
            }
        }
        return redirect()->route('login');
    }

    /**
     * approve applications list for jnu
     */
    public function jnuApproveStudentList() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $approvedList = JnuStudents::where('status', "2")->get();
                return view('Dashboard.approvedList', [
                    'approvedList' => $approvedList
                ]);
            }
        }
        return redirect()->route('login');
    }

    /**
     * approve applications list for jecrc
     */
    public function jecrcApproveStudentList() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $approvedList = JecrcStudents::where('status', "2")->get();
                return view('Jecrc.approvedList', [
                    'approvedList' => $approvedList
                ]);
            }
        }
        return redirect()->route('login');
    }


    /**
     * function to approve admission request for Jnu
     */
    public function jnuApproveStudents($id) {
        $userCheck = false;
        $user = '';
        
        if($id) {
            
            $checkAadhaar = RegisteredAadhaar::where('aadhaar_no', $id)->first();
            if($checkAadhaar) {
                $user = $checkAadhaar;
            }
            else {
                $checkUserID = RegisteredAadhaar::where('user_id', $id)->first();
                $user = $checkUserID;
            }

            if($user->status == '2') {
                return redirect()->back()->with(['error' => 'This student is already registered in another university', 'success' => false]);
            }
            else {


                $studentData = JnuStudents::where('aadhaar_no', $id)->first();

                if($studentData == null) {
                    $studentData = JnuStudents::where('user_id', $id)->first();
                }
                $studentData->update(['status' => "2"]);

                $user->update(['college_id' => $studentData['college_id']]);
                $user->update(['status' => "2"]);
    
                $random = rand(10000, 99999);
                $username = "U" . $random;
                $password = Hash::make($username);

                $data = [
                    'username' => $username,
                    'password' => $password
                ];

                students::create($data);

                $data = ['data' => 'Your admission request is Approved ', 'username' => $username, 'password' => $password];
                $user['email'] = $studentData->email;
                $user['name']= $studentData->full_name;
                $user['username'] = $username;
                $user['password'] = $username;
    
                Mail::send('Mail.mail', $data, function($messages) use($user) {
                    $messages->to($user['email']);
                    $messages->subject('Hello ' . $user['name']);
                });

                if($user) {
                    return redirect()->back()->with(['message' => 'Successfully approved', 'success' => true]);
                }
                else {
                    return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
                }
                
            }
        }
    }

    /**
     * function to reject admission request for Jnu
     */
    public function jnuRejectStudents($id) {
        if($id) {

            $user = JnuStudents::where('aadhaar_no', $id)->first();
            $user->update(['status' => "3"]);
            
            if($user) {
                return redirect()->back()->with(['message' => 'Request rejected', 'success' => true]);
            }
            else {
                return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
            }
        }else {
            return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
        }
    }

    public function jnuRemovestudents($id) {
        $check = false;
        if($id) {
            $userData = RegisteredAadhaar::where('aadhaar_no', $id)->first();

            if($userData) {
                if($userData->college_id == 'C-140623') {
                    dd("collage matched");
                }
                else {
                    dd('college id not match');
                }
            }

            
        }
    }

    /**
     * function to approve admission request for Jecrc
     */
    public function jecrcApproveStudents($id) {
        $userCheck = false;
        
        if($id) {

            $duplicacyCheck = RegisteredAadhaar::where('aadhaar_no', $id)->first();
            
            if(!$duplicacyCheck) {
                $userCheck = true;
            }

            if($userCheck) {
                $user = jecrcStudents::where('aadhaar_no', $id)->first();
                $user->update(['status' => "2"]);

                $data = [
                    'aadhaar_no' => $id,
                    'college_id' => $user['college_id']
                ];

                RegisteredAadhaar::insert($data);
            }
            else {
                return redirect()->back()->with(['error' => 'This student is already registered in another university', 'success' => false]);
            }

            if($user) {
                return redirect()->back()->with(['message' => 'Successfully approved', 'success' => true]);
            }
            else {
                return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
            }
        }
    }

    /**
     * function to reject admission request for jecrc
     */
    public function jecrcRejectStudents($id) {
        if($id) {

            $user = JecrcStudents::where('aadhaar_no', $id)->first();
            $user->update(['status' => "3"]);
            
            if($user) {
                return redirect()->back()->with(['message' => 'Request rejected', 'success' => true]);
            }
            else {
                return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
            }
        }else {
            return redirect()->back()->with(['error' => 'some error occur', 'success' => false]);
        }
    }

    /**
     * reject applications list for jecrc
     */
    public function jecrcRejectStudentList() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $rejectList = JecrcStudents::where('status', "3")->get();
                return view('Jecrc.rejectedList', [
                    'rejectList' => $rejectList
                ]);
            }
        }
        return redirect()->route('jecrc.login');
    }

    public function studentDashboard() {
        return view('Students.dashboard');
    }
}
