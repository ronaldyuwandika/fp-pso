<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Controller Buat Login Page And Authentication
 */
class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        // Validate the user
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        // Sign the user in
        if(!auth()->attempt($request->only('username', 'password'), $request->remember)){
            return back()->withErrors([
                'status' => 'Invalid credentials',
            ]);
        }

        // Redirect
        return redirect()->route('home');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
