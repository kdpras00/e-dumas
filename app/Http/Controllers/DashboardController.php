<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // 1: Masyarakat, 2: Petugas, 3: Admin, 4: Kepala Kelurahan
        switch ($user->user_level_id) {
            case 1:
                $pengaduans = \App\Models\PengaduanHeader::whereHas('details', function ($query) use ($user) {
                    $query->where('users_id', $user->id);
                })->with(['latestDetail.status', 'kategori'])->latest()->get();
                return view('warga.dashboard', compact('pengaduans'));
            case 2:
                $pengaduans = \App\Models\PengaduanHeader::where('kategori_id', $user->kategori_id)
                    ->with(['latestDetail.status', 'kategori', 'details.user'])
                    ->latest()
                    ->get();
                return view('petugas.dashboard', compact('pengaduans'));
            case 3:
                $totalPengaduan = \App\Models\PengaduanHeader::count();
                $pengaduans = \App\Models\PengaduanHeader::with('latestDetail.status')->get();
                // Status IDs: 1: Open, 2: On Progress, 3: Done, 4: Cancel
                $open = $pengaduans->where('latestDetail.status_id', 1)->count();
                $onProgress = $pengaduans->where('latestDetail.status_id', 2)->count();
                $done = $pengaduans->where('latestDetail.status_id', 3)->count();
                $cancel = $pengaduans->where('latestDetail.status_id', 4)->count();
                
                return view('admin.dashboard', compact('totalPengaduan', 'open', 'onProgress', 'done', 'cancel'));
            case 4:
                $totalPengaduan = \App\Models\PengaduanHeader::count();
                $pengaduans = \App\Models\PengaduanHeader::with(['latestDetail.status', 'kategori'])->latest()->get();
                $open = $pengaduans->where('latestDetail.status_id', 1)->count();
                $onProgress = $pengaduans->where('latestDetail.status_id', 2)->count();
                $done = $pengaduans->where('latestDetail.status_id', 3)->count();
                $cancel = $pengaduans->where('latestDetail.status_id', 4)->count();
                
                return view('kepala.dashboard', compact('totalPengaduan', 'open', 'onProgress', 'done', 'cancel', 'pengaduans'));
            default:
                return abort(403, 'Unauthorized action.');
        }
    }
}
