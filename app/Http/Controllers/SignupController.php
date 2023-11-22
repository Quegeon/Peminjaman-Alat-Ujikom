<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function postsignup(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|max:25|unique:users,username',
            'password' => 'required|max:20',
            'no_telp' => 'required|max:9999999999999|numeric',
            'email' => 'required|max:50|email',
            'alamat' => 'max:225'
        ]);

        $rand_num = random_int(1000,9999);
        $id_member = 'M' . $rand_num;

        try {
            User::create([
                'id_member' => $id_member,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                $request->except(['_token'])
            ]);

            Alert::success('Akun Berhasil di Buat');
            return redirect('/');

        } catch (\Throwable $th) {
            Alert::error('Error Signup');
            return redirect('/');
        }
    }
}
