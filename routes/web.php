<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AadhaarController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisteredAadhaarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group([ 'prefix' => 'admin' ], function ($router) {

    Route::get('aadhaar-create', [AadhaarController::class, 'aadhaarCreatePage']);
    Route::get('registration-page', [RegisteredAadhaarController::class, 'createPage']);
    Route::post('aadhaar-store', [AadhaarController::class, 'aadhaarStore'])->name('aadhaar-store');
    Route::post('registration-create', [RegisteredAadhaarController::class, 'store'])->name('admin.registration');
});


Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');


Route::post('/verify-aadhaar-details', [AadhaarController::class, 'verifyAadhaarDetails'])->name('verify-aadhaar');
Route::post('/verify-otp', [AadhaarController::class, 'verifyOtp'])->name('verify-otp');
Route::get('/resend-otp/{mobile_no?}', [AadhaarController::class, 'resendOtp']);

Route::post('/registration-create', [RegisterController::class, 'register'])->name('register-create');
Route::get('/credentials', [RegisterController::class, 'credentialPage'])->name('credential-page');

Route::get('/college-create', [CollegeController::class, 'createCollegeList']);
Route::get('/', [CollegeController::class, 'getCollegeList'])->name('college-list');

Route::get('admin/registration-page', [RegisteredAadhaarController::class, 'createPage']);
Route::post('admin/registration-create', [RegisteredAadhaarController::class, 'store'])->name('admin.registration');



Route::group([ 'prefix' => 'jnu' ], function ($router) {

    Route::get('/verify-aadhaar', [AadhaarController::class, 'verifyAadhaarPage'])->name('verify-page');
    Route::get('/verify-mobile', [AadhaarController::class, 'verifyMobilePage'])->name('verify-mobile');
    Route::get('/registration', [RegisterController::class, 'registerCreatePage'])->name('register-createPage');
    Route::get('/dashboard', [DashboardController::class, 'jnuDashboard'])->name('jnu-dashboard');
   
});



Route::group([ 'prefix' => 'jecrc' , 'namespace' => 'Jecrc' ], function ($router) {

    Route::get('registration', [RegisterController::class, 'jecrcRegistrationPage'])->name('jecrc.registration-page');
    Route::post('register-create', [RegisterController::class, 'jecrcRegistrationStore'])->name('jecrc.registration-store');
    Route::get('verify-aadhaar', [AadhaarController::class, 'jecrcAadhaarVerificationPage'])->name('jecrc.aadhaarVerificationPage');
    Route::post('/verify-aadhaar-details', [AadhaarController::class, 'jecrcVerifyAadhaarDetails'])->name('jecrc.verify-details');
    Route::post('/verify-otp', [AadhaarController::class, 'jecrcVerifyOtp'])->name('jecrc.verify-otp');
    Route::get('/dashboard', [DashboardController::class, 'jecrcDashboard'])->name('jecrc-dashboard');
    
   
});



// Route::get('/send', [NotificationController::class, 'index']);

// Route::post('/image-match', [ImageController::class, 'faceMatch'])->name('image-match');
// Route::get('/image', [ImageController::class, 'index']);

