<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\College;

class CollegeController extends Controller
{
    //
    public function createCollegeList() {

        $college_id = rand(100000, 999999);

        $data = [
            "college_id" => "C-" . $college_id,
            "college_name" => "Manipal University",
            "is_active" => true,
        ];

        $create = College::insert($data);

        if($create) {
            return "successfully created";
        }
        else {
            return "some rror occur";
        }
    }

    public function getCollegeList() {
        $data = College::all();

        return view('College.collegeList', [
            'collegeList' => $data
        ]);
    }
}
