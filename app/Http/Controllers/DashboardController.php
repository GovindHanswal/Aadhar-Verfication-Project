<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JecrcStudents;

class DashboardController extends Controller
{
    //
    public function jnuDashboard() {
        return view('Dashboard.dashboard');
    }

    public function jecrcDashboard() {
        
        $requestList = JecrcStudents::where('is_active', false)->get();

        return view('Jecrc.dashboard', [
            'requestList' =>$requestList
        ]);
    }
}
