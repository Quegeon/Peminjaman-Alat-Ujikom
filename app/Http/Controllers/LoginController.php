<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:25',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username','password'))) {
            Alert::success('Berhasil Login');
            return redirect('/dashboard');

        } else {
            Alert::error('Invalid Login');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Berhasil Logout');
        return redirect('/');
    }
}
