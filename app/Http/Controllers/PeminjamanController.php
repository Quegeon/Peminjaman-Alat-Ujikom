<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Alat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    public function index()
    {        
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            $peminjaman = Peminjaman::all();

            confirmDelete('Konfirmasi Hapus Data');
    
            return view('Peminjaman.index', compact(['peminjaman']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');

            return redirect('/');
        }

    }

    public function create()
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            $member = User::where('level', 'Member')
                ->get();
                
            $petugas = User::where('level', 'Admin')
                ->orWhere('level', 'Petugas')
                ->get();
    
            $alat = Alat::where('stok', '>', 0)
                ->get();
    
            if ($member->first() === null || $petugas->first() === null || $alat->first() === null) {
                Alert::error('Invalid Reference Data');
                return redirect('/peminjaman');
    
            } else {
                return view('Peminjaman.create', compact(['member','petugas','alat']));
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
            'id_member' => 'required',
            'id_alat' => 'required',
            'id_petugas' => 'required',
            'jumlah_pinjam' => 'required|numeric',
        ]);

        $alat = Alat::find($request->id_alat);

        if ($request->jumlah_pinjam > $alat->stok) {
            Alert::error('Jumlah Pinjam Melebihi Stok Alat');
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
            return redirect('/peminjaman');
        }
    }

    public function show($id)
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            $peminjaman = Peminjaman::find($id);
    
            if ($peminjaman === null) {
            Alert::error('Invalid Target Data');
            return redirect('/peminjaman');
    
            } else {
                $member = User::where('level', 'Member')
                    ->get();
                    
                $petugas = User::where('level', 'Admin')
                    ->orWhere('level', 'Petugas')
                    ->get();
    
                $alat = Alat::all();
    
                if ($member->first() === null || $petugas->first() === null || $alat->first() === null) {
                    Alert::error('Invalid Reference Data');
                    return redirect('/peminjaman');
    
                } else {
                    return view('Peminjaman.show', compact(['member','petugas','alat','peminjaman']));
                }
            }
            
        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);

        if ($peminjaman === null) {
            Alert::error('Invalid Target Data');
            return redirect('/peminjaman');

        } else {
            $request->validate([
                'id_member' => 'required',
                'id_alat' => 'required',
                'id_petugas' => 'required',
                'tanggal_pinjam' => 'required|date',
                'jumlah_pinjam' => 'required|numeric',
            ]);

            $cache = Cache::get('cache_stok');
            $alat = Alat::find($request->id_alat);

            $update_stok = $cache - $request->jumlah_pinjam;

            if ($peminjaman->status === 'Pinjam') {

                if ($request->jumlah_pinjam > $cache) {
                    Alert::error('Jumlah Pinjam Melibihi Stok Alat');
                    return back();
        
                } else {
                    $alat->update(['stok' => $update_stok]);

                    $peminjaman->update([
                        'id_member' => $request->id_member,
                        'id_alat' => $request->id_alat,
                        'id_petugas' => $request->id_petugas,
                        'tanggal_pinjam' => $request->tanggal_pinjam,
                        'jumlah_pinjam' => $request->jumlah_pinjam,
                        $request->except(['_token'])
                    ]);

                    Alert::success('Data Berhasil di Edit');
                    return redirect('/peminjaman');
                }
    
            } else {
                $request->validate(['tanggal_kembali' => 'required|date']);

                if ($request->tanggal_kembali < $request->tanggal_pinjam) {
                    Alert::error('Invalid Tanggal Kembali');
                    return back();
    
                } else {
                    if ($request->jumlah_pinjam > $cache) {
                        Alert::error('Jumlah Pinjam Melibihi Stok Alat');
                        return back();
            
                    } else {
                        $start = Carbon::parse($request->tanggal_pinjam);
                        $end = Carbon::parse($request->tanggal_kembali);
                        $diff_day = $end->diffInDays($start);

                        if ($diff_day > $peminjaman->Alat->batas_pinjam) {
                            $total_denda = ($diff_day - $peminjaman->Alat->batas_pinjam) * $peminjaman->Alat->denda;
    
                            $peminjaman->update([
                                'id_member' => $request->id_member,
                                'id_alat' => $request->id_alat,
                                'id_petugas' => $request->id_petugas,
                                'tanggal_pinjam' => $request->tanggal_pinjam,
                                'tanggal_kembali' => $request->tanggal_kembali,
                                'jumlah_pinjam' => $request->jumlah_pinjam,
                                'total_denda' => $total_denda,
                                $request->except(['_token'])
                            ]);
        
                            Alert::success('Data Berhasil di Edit');
                            return redirect('/peminjaman');
    
                        } else {        
                            $peminjaman->update([
                                'id_member' => $request->id_member,
                                'id_alat' => $request->id_alat,
                                'id_petugas' => $request->id_petugas,
                                'tanggal_pinjam' => $request->tanggal_pinjam,
                                'tanggal_kembali' => $request->tanggal_kembali,
                                'jumlah_pinjam' => $request->jumlah_pinjam,
                                $request->except(['_token'])
                            ]);
            
                            Alert::success('Data Berhasil di Edit');
                            return redirect('/peminjaman');
                        }
                    }
                }
            }
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            $peminjaman = Peminjaman::find($id);
    
            if ($peminjaman === null) {
            Alert::error('Invalid Target Data');
            return redirect('/peminjaman');
    
            } else {
                $peminjaman->delete();
    
                Alert::warning('Data Berhasil di Hapus');
                return redirect('/peminjaman');
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function change_status($id)
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin') {
            $peminjaman = Peminjaman::find($id);

            if ($peminjaman === null) {
                Alert::error('Invalid Target Data');
                return redirect('/peminjaman');

            } else {
                $alat = Alat::find($peminjaman->id_alat);

                if ($peminjaman->status === 'Pinjam') {
                    $tanggal_kembali = Carbon::today();

                    $start = Carbon::parse($peminjaman->tanggal_pinjam);
                    $end = Carbon::parse($tanggal_kembali);
                    $diff_day = $end->diffInDays($start);

                    $update_stok = $alat->stok + $peminjaman->jumlah_pinjam;

                    if ($diff_day > $peminjaman->Alat->batas_pinjam) {
                        $total_denda = ($diff_day - $peminjaman->Alat->batas_pinjam) * $peminjaman->Alat->denda;

                        $alat->update(['stok' => $update_stok]);

                        $peminjaman->update([
                            'tanggal_kembali' => $tanggal_kembali,
                            'total_denda' => $total_denda,
                            'status' => 'Kembali'
                        ]);

                        Alert::success('Status Berhasil di Ubah');
                        return back();

                    } else {
                        $alat->update(['stok' => $update_stok]);

                        $peminjaman->update([
                            'tanggal_kembali' => $tanggal_kembali,
                            'status' => 'Kembali'
                        ]);

                        Alert::success('Status Berhasil di Ubah');
                        return back();
                    }

                } else {
                    $update_stok = $alat->stok - $peminjaman->jumlah_pinjam;

                    $alat->update(['stok' => $update_stok]);

                    $peminjaman->update([
                        'tanggal_kembali' => null,
                        'total_denda' => 0,
                        'status' => 'Pinjam'
                    ]);

                    Alert::success('Status Berhasil di Ubah');
                    return back();
                }
            }

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }
    }

    public function print()
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin'){
            $peminjaman = Peminjaman::all();
    
            return view('Peminjaman.print', compact(['peminjaman']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }

    }

    public function receipt($id)
    {
        if (Auth::user()->level === 'Petugas' || Auth::user()->level === 'Admin'){
            $peminjaman = Peminjaman::find($id);
    
            return view('Peminjaman.receipt', compact(['peminjaman']));

        } else {
            Auth::logout();
            Alert::error('Gagal Mengakses Halaman','User Tidak Memiliki Hak Akses');
            return redirect('/');
        }

    }
}
