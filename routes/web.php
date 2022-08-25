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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarksheetController;


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

    Route::get('user/create', [AdminController::class, 'adminCreate'])->name('admin.create');
});


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
    
    Route::get('admin/login', [LoginController::class, 'loginView'])->name('login');
    Route::post('admin/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard', [DashboardController::class, 'jnuDashboard'])->name('jnu-dashboard'); 

    Route::get('admin/approve/{id?}', [DashboardController::class, 'jnuApproveStudents'])->name('jnu-approve-students');
    Route::get('admin/reject/{id?}', [DashboardController::class, 'jnuRejectStudents'])->name('jnu-reject-students');
    Route::get('admin/remove/{id?}', [DashboardController::class, 'jnuRemoveStudents'])->name('jnu-remove-students');

    Route::get('admin/reject-list', [DashboardController::class, 'jnuRejectStudentList'])->name('jnu-reject-list');
    Route::get('admin/approve-list', [DashboardController::class, 'jnuApproveStudentList'])->name('jnu-approve-list');
   
});



Route::group([ 'prefix' => 'jecrc' , 'namespace' => 'Jecrc' ], function ($router) {

    Route::get('registration', [RegisterController::class, 'jecrcRegistrationPage'])->name('jecrc.registration-page');
    Route::post('register-create', [RegisterController::class, 'jecrcRegistrationStore'])->name('jecrc.registration-store');
    Route::get('verify-aadhaar', [AadhaarController::class, 'jecrcAadhaarVerificationPage'])->name('jecrc.aadhaarVerificationPage');
    Route::post('/verify-aadhaar-details', [AadhaarController::class, 'jecrcVerifyAadhaarDetails'])->name('jecrc.verify-details');
    Route::post('/verify-otp', [AadhaarController::class, 'jecrcVerifyOtp'])->name('jecrc.verify-otp');
    
    Route::get('admin/login', [LoginController::class, 'jecrcLoginView'])->name('jecrc.login');
    Route::post('admin/login-authenticate', [LoginController::class, 'jecrcAuthenticate'])->name('jecrc.login-authenticate');
    Route::get('admin/logout', [LoginController::class, 'jecrcLogout'])->name('jecrc.logout');
    Route::get('admin/dashboard', [DashboardController::class, 'jecrcDashboard'])->name('jecrc-dashboard');

    Route::get('admin/approve/{id?}', [DashboardController::class, 'jecrcApproveStudents'])->name('jecrc-approve-students');
    Route::get('admin/reject/{id?}', [DashboardController::class, 'jecrcRejectStudents'])->name('jecrc-reject-students');

    Route::get('admin/reject-list', [DashboardController::class, 'jecrcRejectStudentList'])->name('jecrc-reject-list');
    Route::get('admin/approve-list', [DashboardController::class, 'jecrcApproveStudentList'])->name('jecrc-approve-list');


   
});

Route::get('admin/create-marksheet', [MarksheetController::class, 'createMarksheetData'])->name('admin.create-10th-data');
Route::post('admin/create-marksheet/store', [MarksheetController::class, 'storeMarksheetData'])->name('admin.store-marksheet-data');

Route::get('jnu/marksheet-verification', [MarksheetController::class, 'jnuMarksheetVerifyPage'])->name('jnu-marksheet-verify-page');
Route::post('jnu/verify-marksheet-details', [MarksheetController::class, 'jnuMarkeetVerify'])->name('jnu-marksheet-verify');





// Route::get('/send', [NotificationController::class, 'index']);

// Route::post('/image-match', [ImageController::class, 'faceMatch'])->name('image-match');
// Route::get('/image', [ImageController::class, 'index']);

