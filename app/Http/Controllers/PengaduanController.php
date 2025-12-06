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
        
        // Authorization check (optional but recommended)
        // For Warga: can only view their own complaints? Or public?
        // Assuming Warga can view their own.
        // But header doesn't have user_id, detail does.
        // We check if the first detail (creator) is the current user.
        $creator = $pengaduan->details->first()->users_id;
        if (Auth::user()->user_level_id == 1 && $creator != Auth::id()) {
             abort(403);
        }

        // Determine allowed statuses for the dropdown
        $currentStatusId = $pengaduan->latestDetail->status_id;
        $allStatuses = Status::all();
        
        // Logic: Only allow current status and the immediate next status
        $statuses = $allStatuses->filter(function($status) use ($currentStatusId) {
            // Check if it's the current status
            if ($status->id == $currentStatusId) return true;
            
            // Check if it's the next sequential status
            // Sequence: 1 -> 2 -> 3 -> 4
            if ($currentStatusId == 1 && $status->id == 2) return true;
            if ($currentStatusId == 2 && $status->id == 3) return true;
            if ($currentStatusId == 3 && $status->id == 4) return true;
            
            return false;
        });

        return view('warga.show', compact('pengaduan', 'statuses'));
    }

    public function storeResponse(Request $request, $id)
    {
        // Ensure only Petugas (2) or Admin (3) can respond
        if (!in_array(Auth::user()->user_level_id, [2, 3])) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status_id' => 'required|exists:status,id',
            'tanggapan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        try {
            // Handle File Upload
            $pengaduan = PengaduanHeader::findOrFail($id);

            // Handle File Upload
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('pengaduan_images', 'public');
            }

            // Logic enforcement: Status must move sequentially: 1->2, 2->3, 3->4.
            // Assuming 'latestDetail' is a relationship on PengaduanHeader that gets the most recent detail.
            // If not, you might need to fetch it like: $pengaduan->details()->latest()->first()->status_id;
            $currentStatusId = $pengaduan->latestDetail->status_id;
            $requestedStatusId = $request->status_id;

            $allowedNextStatus = match($currentStatusId) {
                1 => 2, // Open -> On Progress
                2 => 3, // On Progress -> Resolved
                3 => 4, // Resolved -> Close
                4 => 4, // Closed -> Closed (or nothing, or no further changes)
                default => null
            };

            // Allow staying on the same status (e.g., just adding a comment) OR moving to the next allowed status.
            if ($requestedStatusId != $currentStatusId && $requestedStatusId != $allowedNextStatus) {
                 // If we want to strictly enforce it:
                 return back()->with('error', 'Status harus berurutan: Open -> On Progress -> Resolved -> Close.');
            }

            // Create new detail
            PengaduanDetail::create([
                'pengaduan_header_id' => $id,
                'users_id' => Auth::id(),
                'status_id' => $requestedStatusId,
                'detail_masalah' => $request->tanggapan,
                'foto' => $fotoPath, // Use fotoPath for consistency
            ]);

            return redirect()->route('dashboard')->with('success', 'Tanggapan berhasil dikirim.'); // Changed route to dashboard as 'site.show' is not defined in this context

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
