<?php

namespace App\Http\Controllers;
use User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function post(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            return response()->json('ok');
        }
        return response()->json('dssad');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
