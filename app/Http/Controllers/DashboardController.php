<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\JecrcStudents;

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
}
