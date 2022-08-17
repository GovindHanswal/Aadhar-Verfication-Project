<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JnuStudents;
use App\Models\JecrcStudents;
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
     * function to approve admission request for Jnu
     */
    public function jnuApproveStudents($id) {
        $userCheck = false;
        
        if($id) {

            $duplicacyCheck = RegisteredAadhaar::where('aadhaar_no', $id)->first();
            
            if(!$duplicacyCheck) {
                $userCheck = true;
            }

            if($userCheck) {
                $user = JnuStudents::where('aadhaar_no', $id)->first();
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
}
