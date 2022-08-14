<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function index() {
        return view('Image');
    }

   
    public function faceMatch(Request $req) {

        $APP_ID = "62e8d352d1b5713085660d2c";

        // add image url
        $imageObject1 = $req['image-1'];
        $imageObject2 = $req['image-2'];

        $request = curl_init();
        $queryUrl = "http://facexapi.com/compare_faces?face_det=1"; // face compare url
        $imageObject =  array("img_1" => $imageObject1, "img_2" => $imageObject2);
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "content-type: multipart/form-data",
            "user_id:" . $APP_ID,
        )
            );
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($request);  // curl response
            dd($response);
            curl_close($request);
    }

    // public function makecUrlFile($file){
    //     $mime = mime_content_type($file);
    //     $info = pathinfo($file);
    //     $name = $info['basename'];
    //     $output = new CURLFile($file, $mime, $name);
    //     return $output;
    // }

}
