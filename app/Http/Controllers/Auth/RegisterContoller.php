<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterContoller extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // Validate the user
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'plate_number' => 'required',
            'email' => 'required|email',
            'nrp' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'plate_number' => $request->plate_number,
            'nrp' => $request->nrp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Sign the user in
        if(!auth()->attempt($request->only('username', 'email', 'password'), $request->remember)){
            return back()->withErrors([
                'status' => 'Invalid credentials',
            ]);
        }

        // Redirect
        return redirect()->route('home');
    }
}
