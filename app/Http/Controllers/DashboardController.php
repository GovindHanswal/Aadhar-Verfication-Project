<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JecrcStudents;

class DashboardController extends Controller
{
    //
    public function jnuDashboard() {

        if(session()->has('data')){

            $user = session()->get('data');
            
            if($user['token']) {
                return view('Dashboard.dashboard');
            }
        }
        return redirect()->route('login');
    }

    public function jecrcDashboard() {
        
        $requestList = JecrcStudents::where('is_active', false)->get();

        return view('Jecrc.dashboard', [
            'requestList' =>$requestList
        ]);
    }
}
