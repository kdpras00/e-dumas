<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\PengaduanHeader;
use App\Models\PengaduanDetail;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function create()
    {
        $kategoris = Kategori::all();
        return view('warga.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:45',
            'kategori_id' => 'required|exists:kategori,id',
            'detail_masalah' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // Create Header
            $header = PengaduanHeader::create([
                'subject' => $request->subject,
                'kategori_id' => $request->kategori_id,
                'no_pengaduan' => time(), // Simple unique number
            ]);

            // Handle File Upload
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('pengaduan_images', 'public');
            }

            // Create Detail (Initial Complaint)
            PengaduanDetail::create([
                'detail_masalah' => $request->detail_masalah,
                'pengaduan_header_id' => $header->id,
                'users_id' => Auth::id(),
                'status_id' => 1, // Pending
                'foto' => $fotoPath,
            ]);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Pengaduan berhasil dikirim.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $pengaduan = PengaduanHeader::with(['details.user', 'details.status', 'kategori'])->findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        
        // Warga: Only own complaints
        if ($user->user_level_id == 1) {
            $creator = $pengaduan->details->sortBy('id')->first()->users_id;
            if ($creator != $user->id) {
                 abort(403);
            }
        }

        // Determine allowed statuses for the dropdown (Only for Petugas)
        $statuses = collect([]);
        
        if ($user->user_level_id == 2) {
            $currentStatusId = $pengaduan->latestDetail->status_id;
            
            // Logic:
            // 1 (Open) -> 2 (On Progress), 3 (Done), 5 (Cancel)
            // 2 (On Progress) -> 3 (Done), 5 (Cancel)
            // 3 (Done) -> 4 (Close)
            // 4 (Close) -> Terminal
            // 5 (Cancel) -> Terminal
            
            $allowedIds = [$currentStatusId]; // Always allow remaining on current status
            
            if ($currentStatusId == 1) {
                // Open can go to On Progress, Done, Close, Cancel
                $allowedIds = array_merge($allowedIds, [2, 3, 4, 5]);
            } elseif ($currentStatusId == 2) {
                // On Progress can go to Done, Close, Cancel
                $allowedIds = array_merge($allowedIds, [3, 4, 5]);
            } elseif ($currentStatusId == 3) {
                 // Done can go to Close
                 $allowedIds = array_merge($allowedIds, [4]);
            }
            
            $statuses = Status::whereIn('id', $allowedIds)->get();
        }

        return view('warga.show', compact('pengaduan', 'statuses'));
    }

    public function storeResponse(Request $request, $id)
    {
        // Ensure only Petugas (2) can respond. Admin (3) is View Only.
        if (Auth::user()->user_level_id != 2) {
            abort(403, 'Unauthorized action. Only Petugas can act on complaints.');
        }

        $request->validate([
            'status_id' => 'required|exists:status,id',
            'tanggapan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $pengaduan = PengaduanHeader::findOrFail($id);

            // Handle File Upload
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('pengaduan_images', 'public');
            }

            $currentStatusId = $pengaduan->latestDetail->status_id;
            $requestedStatusId = $request->status_id;

            // Strict Transition Check
            $isValidTransition = false;
            
            if ($requestedStatusId == $currentStatusId) {
                $isValidTransition = true; // Just adding a comment/response without changing status
            } elseif ($currentStatusId == 1 && in_array($requestedStatusId, [2, 3, 4, 5])) {
                $isValidTransition = true;
            } elseif ($currentStatusId == 2 && in_array($requestedStatusId, [3, 4, 5])) {
                $isValidTransition = true;
            } elseif ($currentStatusId == 3 && $requestedStatusId == 4) {
                $isValidTransition = true;
            }
            
            if (!$isValidTransition) {
                 return back()->with('error', 'Status transition not allowed.');
            }

            // Create new detail
            PengaduanDetail::create([
                'pengaduan_header_id' => $id,
                'users_id' => Auth::id(),
                'status_id' => $requestedStatusId,
                'detail_masalah' => $request->tanggapan,
                'foto' => $fotoPath,
            ]);
            
            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Tanggapan berhasil dikirim.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
