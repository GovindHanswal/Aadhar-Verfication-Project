<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Students;

class LoginController extends Controller
{
      
    /**
     * function to view jnu login page
     */
    public function loginView() {
        return view('Login.new-login');
    }
    
    /**
     * function to authenticate jnu admin
     */
    public function authenticate(Request $request) {

        $this->validate($request, [
            'login_role' => 'required',
            'email' => 'required',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if ($request['login_role'] == '1') {
            \Config::set('auth.providers.users.model', User::class);

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
        else {

            $credentials = [
                'username' => $request['email'],
                'password' => $request['password']
            ];

            \Config::set('auth.providers.users.model', Students::class);

            if(! $token = auth()->attempt($credentials)) {
                
                return redirect()->back()->with('error', 'Credentials did not match');
            }
            else {
                $user = auth()->user();

                $session = [
                    'token' => $token,
                    'username' => $user['username'],
                ];
        
                session()->put('studentLoginData', $session);
        
                return redirect()->route('student-dashboard');
            }
        }

      

    }

    /**
     * function to logout from jnu dashboard
     */
    public function logout() {

        session()->forget('data');
        return redirect()->route('login');
    }

    /**
     * function to view jecrc login page
     */
    public function jecrcLoginView() {
        return view('Jecrc.login');
    }

    /**
     * function to authenticate jecrc admin
     */
    public function jecrcAuthenticate(Request $request) {

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
    
            return redirect()->route('jecrc-dashboard');
        }
    }

    /**
     * function to logout from jecrc dashboard
     */
    public function jecrcLogout() {
        session()->forget('data');
        return redirect()->route('jecrc.login');
    }
}
