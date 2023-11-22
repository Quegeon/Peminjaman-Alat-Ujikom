<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Jenis;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AlatController extends Controller
{
    public function index()
    {
        if (Auth::user()->level === 'Admin'){
            $alat = Alat::all();
            
            confirmDelete('Konfirmasi Hapus Data');
    
            return view('Alat.index', compact(['alat']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function create()
    {
        if (Auth::user()->level === 'Admin'){
            $jenis = Jenis::all();
            $alat = Alat::all();
    
            if ($jenis->first() === null) {
                Alert::error('Invalid Reference Data');
                return redirect('/alat');
    
            } else {
                return view('Alat.create', compact(['jenis','alat']));
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenis' => 'required|numeric',
            'nama_alat' => 'required|max:50',
            'stok' => 'required|numeric',
            'denda' => 'required|numeric',
            'batas_pinjam' => 'required|numeric'
        ]);

        try {
            Alat::create([
                'id_jenis' => $request->id_jenis,
                'nama_alat' => $request->nama_alat,
                'stok' => $request->stok,
                'denda' => $request->denda,
                'batas_pinjam' => $request->batas_pinjam,
                $request->except(['_token'])
            ]);

            Alert::success('Data Berhasil di Buat');
            return redirect('/alat');

        } catch (\Throwable $th) {
            Alert::error('Error Store Data');
            return redirect('/alat');
        }
    }

    public function show($id)
    {
        if (Auth::user()->level === 'Admin'){
            $alat = Alat::find($id);
    
            if ($alat !== null) {
                $jenis = Jenis::all();
    
                if ($jenis->first() !== null ) {
                    return view('Alat.show', compact(['alat','jenis']));
    
                } else {
                    Alert::error('Invalid Reference Data');
                    return redirect('/alat');
                }
    
            } else {
                Alert::error('Invalid Target Data');
                return redirect('/alat');
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::find($id);

        if ($alat === null) {
            Alert::error('Invalid Target Data');
            return redirect('/alat');

        } else {
            $request->validate([
                'id_jenis' => 'required|numeric',
                'nama_alat' => 'required|max:50',
                'stok' => 'required|numeric',
                'denda' => 'required|numeric',
                'batas_pinjam' => 'required|numeric'
            ]);
            
            
            try {
                $alat->update([
                    'id_jenis' => $request->id_jenis,
                    'nama_alat' => $request->nama_alat,
                    'stok' => $request->stok,
                    'denda' => $request->denda,
                    'batas_pinjam' => $request->batas_pinjam,
                    $request->except(['_token'])
                ]);
                
                Alert::success('Data Berhasil di Edit');
                return redirect('/alat');

            } catch (\Throwable $th) {
                Alert::error('Error Update Data');
                return redirect('/alat');
            }
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level === 'Admin'){
            $alat = Alat::find($id);
    
            if ($alat === null) {
                Alert::error('Invalid Target Data');
                return redirect('/alat');
    
            } else {
                try {
                    $alat->delete();
    
                    Alert::warning('Data Berhasil di Hapus');
                    return redirect('/alat');
    
                } catch (\Throwable $th) {
                    Alert::error('Error Destroy Data');
                    return redirect('/alat');
                }
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }
}
