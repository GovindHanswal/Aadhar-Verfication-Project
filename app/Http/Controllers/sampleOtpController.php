<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    //
    // private $otpController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(OtpController $otpController){
    //     $this->otpController = $otpController;
    // }

    /**
     * Function to generate otp
     * @param  Request $request
     * @return Response
     */
    // public function generateOtp(Request $request) {

    //     $validator = Validator::make($request->all(), [
    //         'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10'
    //     ]);

    //     if ($validator->fails()) {
    //         $code = 400;
    //         $msg = $validator->errors();
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }

    //     $user = User::where('mobile_no', $request['mobile_no'])->first();

    //     if($user) {
    //         try{
    //             $userId = new \MongoDB\BSON\ObjectId($user['_id']);
    //             // genrate OTP
    //             $this->otpController->genrateOtp($userId);

    //         }
    //         catch(Exception $ex) {
    //             $code = 400;
    //             $msg = $ex->getMessage();
    //             return $this->formattedResponse([], $msg, $code, false);
    //         }

    //         $code = 200;
    //         $msg = "otp generated";
    //         return $this->formattedResponse([], $msg, $code, true);
    //     }
    //     else {
    //         $code = 204;
    //         $msg = "User not found";
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }
    // }

    /**
     * Function to register user and generate otp
     * @param  Request $request
     * @return Response
     */
    // public function register(Request $request) {

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:200',
    //         'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:users',
    //     ]);

    //     // check if validation fails
    //     if ($validator->fails()) {

    //         $failedValidations = $validator->failed();

    //         if(isset($failedValidations['mobile_no']['Unique'])){
    //             return $this->generateOtp($request);
    //         }
    //         else {
    //             $code = 400;
    //             $msg = $validator->errors();
    //             return $this->formattedResponse([], $msg, $code, false);
    //         }
    //     }

    //     $data = [
    //         'name' => $request['name'],
    //         'email' => '',
    //         'role_id' => 4,
    //         'password' => '',
    //         'is_active' => true
    //     ];

    //     try{

    //         $user = User::updateOrCreate(
    //             ['mobile_no' => $request['mobile_no']], $data
    //         );

    //         $userId = new \MongoDB\BSON\ObjectId($user['_id']);
    //         // genrate OTP
    //         $this->otpController->genrateOtp($userId);
    //     }
    //     catch(Exception $ex) {
    //         $code = 400;
    //         $msg = $ex->getMessage();
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }

    //     $code = 200;
    //     $msg = "user successfully register";
    //     return $this->formattedResponse([], $msg, $code, true);
    // }

     /**
     * Function to verify otp and genrate JWT token
     * @param  Request $request
     * @return Response
     */
    // public function verifyOtp(Request $request) {

    //     $token = '';
    //     $otp_match = false;

    //     $validator = Validator::make($request->all(), [
    //         'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
    //         'otp' => 'required|integer|numeric|digits:4'
    //     ]);

    //     if ($validator->fails()) {
    //         $code = 400;
    //         $msg = $validator->errors();
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }

    //     $otp = $request['otp'];

    //     $userData = User::raw(function($collection) use($request){
    //         return $collection->aggregate([
    //             [
    //                 '$match' => [
    //                     'mobile_no' => $request['mobile_no'],
    //                     'is_active' => true
    //                 ]
    //             ],
    //             [
    //                 '$lookup' => [
    //                     'as' => 'otpDetails',
    //                     'from' => 'app_otp',
    //                     'localField' => '_id',
    //                     'foreignField' => 'user_id'
    //                 ]
    //             ],
    //             [
    //                 '$unwind' => [
    //                     'path' => '$otpDetails',
    //                     'preserveNullAndEmptyArrays' => true
    //                 ]
    //             ],
    //             [
    //                 '$project' => [
    //                     'otpDetails.is_active' => 0,
    //                     'otpDetails.updated_at' => 0,
    //                     'otpDetails.created_at' => 0,
    //                     'otpDetails._id' => 0,
    //                     'otpDetails.user_id' => 0
    //                 ]
    //             ],
    //         ]);
    //     });

    //     if(count($userData)) {
    //         $userData = $userData[0];

    //         if($userData['otpDetails'] && $userData['otpDetails']['otp']) {

    //             if(true || $otp == $userData['otpDetails']['otp']) {
    //                 $otp_match = true;

    //                 unset($userData->_id);
    //                 unset($userData->role_id);
    //                 unset($userData->is_active);
    //                 unset($userData->otpDetails);
    //                 $token = auth()->setTTL(87658)->login($userData);
    //             }

    //             if($otp_match) {
    //                 $code = 200;
    //                 $user = auth()->user();
    //                 $data = [
    //                     'token' => $token,
    //                     'user' => $user
    //                 ];
    //                 return $this->formattedResponse($data, '', $code, true);
    //             }
    //             else {
    //                 $code = 401;
    //                 $msg = "OTP is not verified";
    //                 return $this->formattedResponse([], $msg, $code, false);
    //             }
    //         }
    //         else {
    //             $code = 204;
    //             $msg = "Otp not found";
    //             return $this->formattedResponse([], $msg, $code, false);
    //         }
    //     }
    //     else {
    //         $code = 204;
    //         $msg = "User not found";
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }
    // }
    
    /**
     * Function to validate JWT token
     * @param  Token 
     * @return Response
     */
    // public function validateToken() {

    //     $token = JWTAuth::getToken();
        
    //     if($token) {
    //         $validate = JWTAuth::setToken($token)->check();

    //         if ($validate) {
    //             $code = 200;
    //             $msg = "valid token";
    //             return $this->formattedResponse([], $msg, $code, true);
    //         }
    //         else {
    //             $code = 401;
    //             $msg = "invalid token";
    //             return $this->formattedResponse([], $msg, $code, false);
    //         }
    //     }
    //     else {
    //         $code = 204;
    //         $msg = "token not found";
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }
    // }

    /**
     * Function to invalidate JWT token and logout
     * @param  Token 
     * @return Response
     */
    // public function logout() {
        
    //     $token = JWTAuth::getToken();
        
    //     if ($token) {
    //         $removeToken = JWTAuth::setToken($token)->invalidate();

    //         if($removeToken) {
    //             $code = 200;
    //             $msg = "logout successful";
    //             return $this->formattedResponse([], $msg, $code, true);
    //         }
    //         else {
    //             $code = 401;
    //             $msg = "some error occur";
    //             return $this->formattedResponse([], $msg, $code, false);
    //         }
    //     }
    //     else {
    //         $code = 204;
    //         $msg = "token not found";
    //         return $this->formattedResponse([], $msg, $code, false);
    //     }
    // }
}
