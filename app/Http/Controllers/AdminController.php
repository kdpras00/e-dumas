<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\UserLevel;
use App\Models\PengaduanHeader;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Users Management
    public function indexUsers(Request $request)
    {
        $query = User::with(['level', 'rt.rw']);

        if ($request->has('role')) {
            if ($request->role == 'warga') {
                $query->where('user_level_id', 1); // Assuming 1 is Masyarakat
            } elseif ($request->role == 'petugas') {
                $query->where('user_level_id', 2); // Assuming 2 is Petugas
            }
        }

        $users = $query->get();
        return view('admin.users.index', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::with(['level', 'rt.rw', 'kategori'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function createUser()
    {
        $levels = UserLevel::all();
        $rts = Rt::with('rw')->get();
        $categories = Kategori::all();
        return view('admin.users.create', compact('levels', 'rts', 'categories'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:45',
            'nama_lengkap' => 'required|max:45',
            'nik' => 'required|unique:users|max:25',
            'email' => 'required|email|unique:users|max:45',
            'no_hp' => 'required|unique:users|max:25',
            'password' => 'required|min:6',
            'alamat' => 'required|max:500',
            'rt_id' => 'required|exists:rt,id',
            'user_level_id' => 'required|exists:user_level,id',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        // Validate kategori_id if user_level is Petugas
        $petugasLevel = UserLevel::where('user_level', 'Petugas')->first();
        if ($petugasLevel && $request->user_level_id == $petugasLevel->id) {
            $request->validate([
                'kategori_id' => 'required|exists:kategori,id',
            ]);
        }

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Use input password
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'user_level_id' => $request->user_level_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $rts = Rt::with('rw')->get();
        $levels = UserLevel::all();
        $categories = Kategori::all();
        return view('admin.users.edit', compact('user', 'rts', 'levels', 'categories'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:45|unique:users,username,' . $id,
            'nama_lengkap' => 'required|max:45',
            'nik' => 'required|max:25|unique:users,nik,' . $id,
            'email' => 'required|email|max:45|unique:users,email,' . $id,
            'no_hp' => 'required|max:25|unique:users,no_hp,' . $id,
            'alamat' => 'required|max:500',
            'rt_id' => 'required|exists:rt,id',
            'user_level_id' => 'required|exists:user_level,id',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        // Validate kategori_id if user_level is Petugas
        $petugasLevel = UserLevel::where('user_level', 'Petugas')->first();
        if ($petugasLevel && $request->user_level_id == $petugasLevel->id) {
            $request->validate([
                'kategori_id' => 'required|exists:kategori,id',
            ]);
        }

        $user = User::findOrFail($id);
        $user->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'user_level_id' => $request->user_level_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil direset.');
    }

    // Categories Management
    public function indexCategories()
    {
        $categories = Kategori::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'kategori' => 'required|unique:kategori',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function editCategory($id)
    {
        $category = Kategori::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|unique:kategori,kategori,' . $id,
        ]);

        $category = Kategori::findOrFail($id);
        $category->update([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroyCategory($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }

    // RW Management
    public function indexRw()
    {
        $rws = Rw::all();
        return view('admin.rw.index', compact('rws'));
    }

    public function createRw()
    {
        return view('admin.rw.create');
    }

    public function storeRw(Request $request)
    {
        $request->validate([
            'rw' => 'required|unique:rw|max:3',
        ]);

        Rw::create([
            'rw' => $request->rw,
        ]);

        return redirect()->route('admin.rw.index')->with('success', 'RW created successfully');
    }

    public function editRw($id)
    {
        $rw = Rw::findOrFail($id);
        return view('admin.rw.edit', compact('rw'));
    }

    public function updateRw(Request $request, $id)
    {
        $request->validate([
            'rw' => 'required|max:3|unique:rw,rw,' . $id,
        ]);

        $rw = Rw::findOrFail($id);
        $rw->update([
            'rw' => $request->rw,
        ]);

        return redirect()->route('admin.rw.index')->with('success', 'RW updated successfully');
    }

    public function destroyRw($id)
    {
        $rw = Rw::findOrFail($id);
        $rw->delete();

        return redirect()->route('admin.rw.index')->with('success', 'RW deleted successfully');
    }

    // RT Management
    public function indexRt()
    {
        $rts = Rt::with('rw')->get();
        return view('admin.rt.index', compact('rts'));
    }

    public function createRt()
    {
        $rws = Rw::all();
        return view('admin.rt.create', compact('rws'));
    }

    public function storeRt(Request $request)
    {
        $request->validate([
            'rt' => 'required|max:3',
            'rw_id' => 'required|exists:rw,id',
        ]);

        // Prevent duplicate RT in the same RW
        if (\App\Models\Rt::where('rt', $request->rt)->where('rw_id', $request->rw_id)->exists()) {
            return back()->withErrors(['rt' => 'RT ' . $request->rt . ' sudah ada di RW ini.']);
        }

        \App\Models\Rt::create([
            'rt' => $request->rt,
            'rw_id' => $request->rw_id,
        ]);

        return redirect()->route('admin.rt.index')->with('success', 'RT created successfully');
    }

    public function editRt($id)
    {
        $rt = Rt::findOrFail($id);
        $rws = Rw::all();
        return view('admin.rt.edit', compact('rt', 'rws'));
    }

    public function updateRt(Request $request, $id)
    {
        $request->validate([
            'rt' => 'required|max:3',
            'rw_id' => 'required|exists:rw,id',
        ]);

        $rt = Rt::findOrFail($id);
        $rt->update([
            'rt' => $request->rt,
            'rw_id' => $request->rw_id,
        ]);

        return redirect()->route('admin.rt.index')->with('success', 'RT updated successfully');
    }

    public function destroyRt($id)
    {
        $rt = Rt::findOrFail($id);
        $rt->delete();

        return redirect()->route('admin.rt.index')->with('success', 'RT deleted successfully');
    }

    // Petugas Management
    public function indexPetugas()
    {
        // Assuming 'Petugas' is level 2 or fetch by name
        $levelId = UserLevel::where('user_level', 'Petugas')->value('id') ?? 2;
        $petugas = User::where('user_level_id', $levelId)->with(['level', 'rt.rw', 'kategori'])->get();
        return view('admin.petugas.index', compact('petugas'));
    }

    public function createPetugas()
    {
        $rts = Rt::with('rw')->get();
        $categories = Kategori::all();
        return view('admin.petugas.create', compact('rts', 'categories'));
    }

    public function storePetugas(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:45',
            'nama_lengkap' => 'required|max:45',
            'nik' => 'required|unique:users|max:25',
            'email' => 'required|email|unique:users|max:45',
            'no_hp' => 'required|unique:users|max:25',
            'alamat' => 'required|max:500',
            'rt_id' => 'required|exists:rt,id',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $levelId = UserLevel::where('user_level', 'Petugas')->value('id') ?? 2;
        $password = 'password123';

        User::create([
            'username' => $request->username,
            'password' => bcrypt($password),
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'kategori_id' => $request->kategori_id,
            'user_level_id' => $levelId,
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas created successfully');
    }

    public function editPetugas($id)
    {
        $petugas = User::findOrFail($id);
        $rts = Rt::with('rw')->get();
        $categories = Kategori::all();
        return view('admin.petugas.edit', compact('petugas', 'rts', 'categories'));
    }

    public function updatePetugas(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:45|unique:users,username,' . $id,
            'nama_lengkap' => 'required|max:45',
            'nik' => 'required|max:25|unique:users,nik,' . $id,
            'email' => 'required|email|max:45|unique:users,email,' . $id,
            'no_hp' => 'required|max:25|unique:users,no_hp,' . $id,
            'alamat' => 'required|max:500',
            'rt_id' => 'required|exists:rt,id',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas updated successfully');
    }

    public function destroyPetugas($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas deleted successfully');
    }

    public function resetPasswordPetugas(Request $request, $id)
    {
        // If the request has a password field, use it. Otherwise default.
        // The screenshot shows a modal with "Password" and "Password Baru".
        // I'll assume the user inputs a new password.
        
        $request->validate([
            'password' => 'required|min:6',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password reset successfully');
    }

    // Report Management
    public function indexLaporan()
    {
        // Aggregate data: Year-Month, Status, RW, RT, Count
        // We need to join tables to get RW/RT names and Status names
        
        $reports = \App\Models\PengaduanHeader::selectRaw('
                DATE_FORMAT(pengaduan_header.created_at, "%Y-%m") as periode,
                status.status as status_name,
                rt.rt as rt_name,
                rw.rw as rw_name,
                COUNT(*) as jumlah
            ')
            ->join('pengaduan_detail', function($join) {
                $join->on('pengaduan_header.id', '=', 'pengaduan_detail.pengaduan_header_id')
                     ->whereRaw('pengaduan_detail.id = (select max(id) from pengaduan_detail where pengaduan_detail.pengaduan_header_id = pengaduan_header.id)');
            })
            ->join('status', 'pengaduan_detail.status_id', '=', 'status.id')
            ->join('pengaduan_detail as pd_first', function($join) {
                 $join->on('pengaduan_header.id', '=', 'pd_first.pengaduan_header_id')
                      ->whereRaw('pd_first.id = (select min(id) from pengaduan_detail where pengaduan_detail.pengaduan_header_id = pengaduan_header.id)');
            })
            ->join('users', 'pd_first.users_id', '=', 'users.id')
            ->join('rt', 'users.rt_id', '=', 'rt.id')
            ->join('rw', 'rt.rw_id', '=', 'rw.id')
            ->groupBy('periode', 'status_name', 'rt_name', 'rw_name')
            ->orderBy('periode', 'desc')
            ->get();

        return view('admin.laporan.index', compact('reports'));
    }

    // Complaint Management (List View)
    public function indexPengaduan()
    {
        // Retrieve all complaints with latest status, category, and user (pelapor)
        $pengaduans = \App\Models\PengaduanHeader::with(['latestDetail.status', 'kategori', 'details.user'])
            ->latest()
            ->get();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }
}
