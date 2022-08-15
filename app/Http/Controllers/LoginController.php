<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    //private $userRepository;

	// public function __construct(UserRepository $userRepository){
	// 	$this->userRepository = $userRepository;
    // }
    
    
    public function loginView() {

        return view('Login.new-login');

        // if(session()->has('data')){

        //     $user = session()->get('data');
            
        //     if($user['token']) {
        //         return redirect()->route('admin.dashboard');
        //     }
        // }
        // return view('Login.login');
    }
    
    public function authenticate(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');


        if(! $token = auth()->attempt($credentials)) {
            
            return redirect()->back()->with('error', 'Credentials did not match');
        }
        else {
            $user = auth()->user();

            $session = [
                'token' => $token,
                'user_id' => $user['id'],
                'name' => $user['name'],
                'role_id' => $user['role'],
                'name' => $user['email'],
            ];
    
            session()->put('data', $session);
    
            return redirect()->route('jnu-dashboard');
        }
    }

    public function logout() {

        session()->forget('data');
        return redirect()->route('login');
    }
}
