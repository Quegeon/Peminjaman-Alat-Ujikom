<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        if (Auth::user()->level === 'Admin'){
            $member = User::where('level', 'Member')
                ->get();
                
            confirmDelete('Konfirmasi Hapus Data');
    
            return view('User.Member.index', compact(['member']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function create()
    {
        if (Auth::user()->level === 'Admin'){
            return view('User.Member.create');

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

            Alert::success('Data Berhasil di Buat');
            return redirect('/member');

        } catch (\Throwable $th) {
            Alert::error('Error Store Data');
            return redirect('/member');
        }
    }

    public function show($id)
    {
        if (Auth::user()->level === 'Admin'){
            $member = User::where('id_member', $id)
                ->first();
    
            if ($member === null) {
                Alert::error('Invalid Target Data');
                return redirect('/member');
    
            } else {
                return view('User.Member.show', compact(['member']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $member = User::where('id_member', $id)
            ->first();

        if ($member === null) {
            Alert::error('Invalid Target Data');
            return redirect('/member');

        } else {
            $request->validate([
                'nama' => 'required|max:100',
                'username' => 'required|max:25|unique:users,username,'.$id,
                'no_telp' => 'required|max:9999999999999|numeric',
                'email' => 'required|max:50|email',
                'alamat' => 'max:225'
            ]);

            try {
                $member->update([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    $request->except(['_token'])
                ]);

                Alert::success('Data Berhasil di Edit');
                return redirect('/member');

            } catch (\Throwable $th) {
                Alert::error('Error Update Data');
                return redirect('/member');
            }
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level === 'Admin'){
            $member = User::where('id_member', $id)
                ->first();
    
            if ($member === null) {
                Alert::error('Invalid Target Data');
                return redirect('/member');
    
            } else {
                try {
                    $member->delete();
    
                    Alert::success('Data Berhasil di Hapus');
                    return redirect('/member');
    
                } catch (\Throwable $th) {
                    Alert::error('Error Destroy Data');
                    return redirect('/member');
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
        if (Auth::user()->level === 'Admin' || Auth::user()->level === 'Member'){
            $member = User::where('id_member', $id)
                ->first();
    
            if ($member === null) {
                Alert::error('Invalid Target Data');
                return redirect('/member');
    
            } else {
                return view('User.Member.show-password', compact(['member']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function change_password(Request $request, $id)
    {
        $member = User::where('id_member', $id)
            ->first();

        if ($member === null) {
            Alert::error('Invalid Target Data');
            return redirect('/member');

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
                    $member->update([
                        'password' => bcrypt($request->new_password),
                        $request->except(['_token'])
                    ]);

                    Alert::success('Password Berhasil di Ubah');
                    if (Auth::user()->level === 'Member') {
                        return redirect('/member/profile');

                    } else {
                        return redirect('/member');
                    }

                } catch (\Throwable $th) {
                    Alert::error('Error Change Password');
                    return redirect('/member');
                }
            }
        }
    }

    public function index_profile()
    {
        if (Auth::user()->level !== 'Member') {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');

        } else {
            return view('User.Member.index-profile');
        }
    }

    public function show_profile()
    {
        if (Auth::user()->level !== 'Member') {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');

        } else {
            return view('User.Member.show-profile');
        }
    }

    public function change_profile(Request $request)
    {
        $member = User::where('id_member', Auth::user()->id_member)
            ->first();

        $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|max:25|unique:users,username,'.Auth::user()->id,
            'no_telp' => 'required|max:9999999999999|numeric',
            'email' => 'required|max:50|email',
            'alamat' => 'max:225'
        ]);

        try {
            $member->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                $request->except(['_token'])
            ]);

            Alert::success('Profil Berhasil di Perbaharui');
            return redirect('/member/profile');

        } catch (\Throwable $th) {
            Alert::error('Error Change Profile');
            return redirect('/member/profile');
        }
    }

    public function index_borrow()
    {
        if (Auth::user()->level !== 'Member') {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');

        } else {
            $alat = Alat::where('stok','>',0)
                ->get();
    
            return view('User.Member.index-borrow', compact(['alat']));
        }

    }

    public function create_borrow($id)
    {
        if (Auth::user()->level !== 'Member') {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');

        } else {
            $alat = Alat::find($id);
            $petugas = User::where('level','Admin')
                ->orWhere('level','Petugas')
                ->get();
    
            return view('User.Member.create-borrow', compact(['alat','petugas']));

        }
    }

    public function borrow(Request $request)
    {
        $request->validate([
            'id_member' => 'required',
            'id_alat' => 'required',
            'id_petugas' => 'required',
            'jumlah_pinjam' => 'required|numeric',
        ]);

        $alat = Alat::find($request->id_alat);

        if ($request->jumlah_pinjam > $alat->stok) {
            Alert::error('Jumlah Pinjam Melebihi Stok');
            return back();

        } else {
            Cache::put('cache_stok', $alat->stok, now()->addMinutes(30));

            $update_stok = $alat->stok - $request->jumlah_pinjam;
            $tanggal_pinjam = Carbon::today();

            $alat->update(['stok' => $update_stok]);

            Peminjaman::create([
                'id_member' => $request->id_member,
                'id_alat' => $request->id_alat,
                'id_petugas' => $request->id_petugas,
                'tanggal_pinjam' => $tanggal_pinjam,
                'jumlah_pinjam' => $request->jumlah_pinjam,
                $request->except(['_token'])
            ]);

            Alert::success('Data Berhasil di Buat');
            return redirect('/dashboard');
        }
    }
}
