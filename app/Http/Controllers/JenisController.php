<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JenisController extends Controller
{
    public function index()
    {
        if (Auth::user()->level === 'Admin'){
            $jenis = Jenis::all();
            
            confirmDelete('Konfirmasi Hapus Data');
    
            return view('Jenis.index', compact(['jenis']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function create()
    {
        if (Auth::user()->level === 'Admin'){
            return view('Jenis.create');

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|max:50',
            'keterangan' => 'required|max:225'
        ]);

        try {
            Jenis::create([
                'nama_jenis' => $request->nama_jenis,
                'keterangan' => $request->keterangan,
                $request->except(['_token'])
            ]);

            Alert::success('Data Berhasil di Buat');
            return redirect('/jenis');

        } catch (\Throwable $th) {
            Alert::error('Error Store Data');
            return redirect('/jenis');
        }
    }

    public function show($id)
    {
        if (Auth::user()->level === 'Admin'){
            $jenis = Jenis::find($id);
    
            if ($jenis === null) {
                Alert::error('Invalid Target Data');
                return redirect('/jenis');
    
            } else {
                return view('Jenis.show', compact(['jenis']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $jenis = Jenis::find($id);

        if ($jenis === null) {
            Alert::error('Invalid Target Data');
            return redirect('/jenis');

        } else {
            $request->validate([
                'nama_jenis' => 'required|max:50',
                'keterangan' => 'required|max:225'
            ]);

            try {
                $request->except(['_token']);
                $jenis->update($request->all());

                Alert::success('Data Berhasil di Edit');
                return redirect('/jenis');

            } catch (\Throwable $th) {
                
                Alert::error('Error Update Data');
                return redirect('/jenis');
            }
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level === 'Admin'){
            $jenis = Jenis::find($id);
    
            if ($jenis === null) {
                Alert::error('Invalid Target Data');
                return redirect('/jenis');
    
            } else {
                try {
                    $jenis->delete();
    
                    Alert::success('Data Berhasil di Hapus');
                    return redirect('/jenis');
    
                } catch (\Throwable $th) {
                    Alert::error('Error Destroy Data');
                    return redirect('/jenis');
                }
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }
}
