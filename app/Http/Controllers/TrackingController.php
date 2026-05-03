<?php

namespace App\Http\Controllers;

use App\Models\PengaduanHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking');
    }

    public function track(Request $request)
    {
        $request->validate([
            'no_pengaduan' => 'required',
            'captcha' => 'required|captcha'
        ], [
            'captcha.captcha' => 'Kode captcha tidak sesuai.',
            'captcha.required' => 'Silahkan isi kode captcha.',
            'no_pengaduan.required' => 'Nomor pengaduan wajib diisi.'
        ]);

        $pengaduan = PengaduanHeader::where('no_pengaduan', $request->no_pengaduan)->first();

        if (!$pengaduan) {
            return back()->with('error', 'Nomor pengaduan tidak ditemukan.')->withInput();
        }

        return redirect()->route('tracking.result', $pengaduan->no_pengaduan);
    }

    public function showResult($no_pengaduan)
    {
        $pengaduan = PengaduanHeader::with(['details.status', 'details.user', 'kategori'])
            ->where('no_pengaduan', $no_pengaduan)
            ->firstOrFail();

        return view('tracking-result', compact('pengaduan'));
    }
}
