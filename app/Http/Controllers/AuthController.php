<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email'=>'required',
                'password'=>'required'
            ]);

            if(auth()->attempt($credentials)){
                return redirect()->route('admin.items.index');
            }
            return back()->with('error', 'Email ou mot de passe incorrect!');
        }
        return view('login');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route("login");
    }
}
