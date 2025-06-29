<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Upgrade;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Check if user is admin
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // This is the main dashboard/beranda page
        return view('admin.beranda.index');
    }

    public function artikel()
    {
        $events = Event::latest()->get();
        return view('admin.artikel.index', compact('events'));
    }

    public function pengajuan()
    {
        $pengajuan = Upgrade::where('status', 'pending')->get();

        return view('admin.pengajuan.index', compact('pengajuan'));
    }
    public function approvePengajuan($id)
    {
        $pengajuan = Upgrade::findOrFail($id);

        // Update the user's role to 'pengelola' and set default permissions
        $user = User::findOrFail($pengajuan->user_id);
        $user->update([
            'role' => 'pengelola',
            'can_view_product' => true,
            'can_create_product' => true,
            'can_edit_product' => true,
            'can_delete_product' => true
        ]);

        // Mark the submission as approved
        $pengajuan->update(['status' => 'approved']);

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil disetujui.');
    }

        public function rejectPengajuan($id)
    {
        $pengajuan = Upgrade::findOrFail($id);

        // Mark the submission as rejected
        $pengajuan->update(['status' => 'rejected']);

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil ditolak.');
    }
    
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function getUserPermissions(User $user)
    {
        return response()->json([
            'can_view_product' => $user->can_view_product,
            'can_create_product' => $user->can_create_product,
            'can_edit_product' => $user->can_edit_product,
            'can_delete_product' => $user->can_delete_product
        ]);
    }

    public function updateUserPermissions(Request $request, User $user)
    {
        if ($user->role !== 'pengelola') {
            return back()->with('error', 'Can only update permissions for pengelola users.');
        }

        $user->update([
            'can_view_product' => $request->boolean('can_view_product'),
            'can_create_product' => $request->boolean('can_create_product'),
            'can_edit_product' => $request->boolean('can_edit_product'),
            'can_delete_product' => $request->boolean('can_delete_product')
        ]);

        return back()->with('success', 'Permissions updated successfully.');
    }
}