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
            'username' => 'required',
            'password' => 'required|string'
        ]);

        $user = User::where('username', $request['username'])->first();

        $check = Hash::check($request['password'], $user->password);

        dd([$request['password'], $user->password]);
        // $credentials = $request->only(['username', 'password']);

        // $token = auth()->attempt($credentials);

        // // dd([$credentials, $token]);

        // if(! $token = auth()->attempt($credentials)) {
        //     return redirect()->back()->with(['error' => 'User credentials are incorrect', 'success' => false]);
        // }

        $user = auth()->user();

        // if($user['is_active']) {
        //     $data = [
        //         'token' => $token,
        //         'user' => $user
        //     ];
        //     return $this->formattedResponse($data, '', 200, true);
        // }
        // else {
        //     $code = 401;
        //     $msg = "not authorized";
        //     return $this->formattedResponse([], $msg, $code, false);
        // }

        if($user && $user['token']) {
            $session = [
                'token' => $user['token'],
                'user_id' => $user['user']['_id'],
                'role_id' => $user['user']['role_id'],
                'name' => $user['user']['name'],
                'email' => $user['user']['email']
            ];

            session()->put('data', $session);

            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Credentials did not match');
        }
    }

    // public function logout() {

    //     session()->forget('data');
    //     return redirect()->route('admin.loginView');
    // }
}
