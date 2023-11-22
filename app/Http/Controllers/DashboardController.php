<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $sum_member = User::where('level', 'Member')
            ->count();
        $sum_alat = Alat::count();
        $sum_peminjaman = Peminjaman::count();

        if (Auth::user()->level === 'Member') {
            $history = Peminjaman::select()
                ->where('id_member', Auth::user()->id_member)
                ->orderBy('tanggal_pinjam','desc')
                ->get();

        } else {
            $history = Peminjaman::select()
                ->orderBy('tanggal_pinjam','desc')
                ->limit(5)
                ->get();
        }
                    
        return view('dashboard', compact(['sum_member','sum_alat','sum_peminjaman','history']));
    }
}
