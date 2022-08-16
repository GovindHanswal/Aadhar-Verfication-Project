<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\JecrcStudents;
use App\Models\RegisteredAadhaar;

class DashboardController extends Controller
{
    //
    public function jnuDashboard() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                $requestList = Students::where('is_active', false)->get();
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
                $requestList = JecrcStudents::where('is_active', false)->get();
                return view('Jecrc.dashboard', [
                    'requestList' =>$requestList
                ]);
            }
        }
        return redirect()->route('login');
        
    }

    public function jnuApproveStudents($id) {
        $userCheck = false;
        
        if($id) {

            $duplicacyCheck = RegisteredAadhaar::where('aadhaar_no', $id)->first();
            
            if(!$duplicacyCheck) {
                $userCheck = true;
            }

            if($userCheck) {
                $user = Students::where('aadhaar_no', $id)->first();
                $user->update(['is_active' => true]);

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

    public function jecrcApproveStudents($id) {
        $userCheck = false;
        
        if($id) {

            $duplicacyCheck = RegisteredAadhaar::where('aadhaar_no', $id)->first();
            
            if(!$duplicacyCheck) {
                $userCheck = true;
            }

            if($userCheck) {
                $user = jecrcStudents::where('aadhaar_no', $id)->first();
                $user->update(['is_active' => true]);

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
}
