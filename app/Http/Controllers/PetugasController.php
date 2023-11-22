<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{

    public function index()
    {
        if (Auth::user()->level === 'Admin'){
            $petugas = User::where('level','Admin')
                ->orWhere('level','Petugas')
                ->get();

            confirmDelete('Konfirmasi Hapus Data');
    
            return view('User.Petugas.index', compact(['petugas']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function create()
    {
        if (Auth::user()->level === 'Admin'){
            return view('User.Petugas.create');

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|max:25|unique:users,username',
            'password' => 'required|max:20',
            'no_telp' => 'required|max:9999999999999|numeric',
            'email' => 'required|max:50|email'
        ]);

        try {
            User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'level' => 'Petugas',
                $request->except(['_token'])
            ]);

            Alert::success('Data Berhasil di Buat');
            return redirect('/petugas');

        } catch (\Throwable $th) {
            return redirect('/petugas');
        }
    }

    public function show($id)
    {
        if (Auth::user()->level === 'Admin'){
            $petugas = User::find($id);
    
            if ($petugas === null) {
                Alert::error('Invalid Target Data');
                return redirect('/petugas');
    
            } else {
                return view('User.Petugas.show', compact(['petugas']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $petugas = User::find($id);

        if ($petugas === null) {
            Alert::error('Invalid Target Data');
            return redirect('/petugas');

        } else {
            $request->validate([
                'nama' => 'required|max:100',
                'username' => 'required|max:25|unique:users,username,'.$id,
                'no_telp' => 'required|max:9999999999999|numeric',
                'email' => 'required|max:50|email',
                'level' => 'required'
            ]);
    
            try {
                $petugas->update([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'level' => $request->level,
                    $request->except(['_token'])
                ]);
    
                Alert::success('Data Berhasil di Edit');
                return redirect('/petugas');
    
            } catch (\Throwable $th) {
                Alert::error('Error Update Data');
                return redirect('/petugas');
            }
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level === 'Admin'){
            $petugas = User::find($id);
    
            if ($petugas === null) {
                Alert::error('Invalid Target Data');
                return redirect('/petugas');
    
            } else {
                try {
                    $petugas->delete();
    
                    Alert::success('Data Berhasil di Hapus');
                    return redirect('/petugas');
    
                } catch (\Throwable $th) {
                    Alert::error('Error Destroy Data');
                    return redirect('/petugas');
                }
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function show_password($id)
    {
        if (Auth::user()->level === 'Admin'){
            $petugas = User::find($id);
    
            if ($petugas === null) {
                Alert::error('Invalid Target Data');
                return redirect('/petugas');
    
            } else {
                return view('User.Petugas.show-password', compact(['petugas']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }

    }

    public function change_password(Request $request, $id)
    {
        $petugas = User::find($id);

        if ($petugas === null) {
            Alert::error('Invalid Target Data');
            return redirect('/petugas');

        } else {
            $request->validate([
                'new_password' => 'required|max:20',
                'confirm_password' => 'required|max:20'
            ]);

            if ($request->new_password !== $request->confirm_password) {
                Alert::error('Error Confirm Password','Konfirmasi Password Tidak Sesuai');
                return back();

            } else {
                try {
                    $petugas->update([
                        'password' => bcrypt($request->new_password),
                        $request->except(['_token'])
                    ]);

                    Alert::success('Password Berhasil di Ubah');
                    
                    if (Auth::user()->level === 'Petugas') {
                        return redirect('/petugas/profile');

                    } else {
                        return redirect('/petugas');
                    }

                } catch (\Throwable $th) {
                    Alert::error('Error Change Password');
                    return redirect('/petugas');
                }
            }
        }
    }

    public function index_profile()
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            return view('User.Petugas.index-profile');

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function show_profile()
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            return view('User.Petugas.show-profile');

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }

    }

    public function change_profile(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|max:25|unique:users,username,'.Auth::user()->id,
            'no_telp' => 'required|max:9999999999999|numeric',
            'email' => 'required|max:50|email'
        ]);
        
        $petugas = User::find(Auth::user()->id);

        try {
            $petugas->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                $request->except(['_token'])
            ]);

            Alert::success('Profile Berhasil di Perbaharui');
            return redirect('/petugas/profile');

        } catch (\Throwable $th) {
            Alert::error('Error Change Profile');
            return redirect('/petugas/profile');
        }
    }
}
