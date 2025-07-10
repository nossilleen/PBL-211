<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Upgrade;
use App\Models\Artikel;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Check if user is admin
        $this->middleware(function ($request, $next) {
            if (!in_array(Auth::user()->role, ['admin', 'superadmin'])) {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // Mengambil data untuk aktivitas terbaru
        $recentUsers = User::latest()->take(5)->get();
        $recentArticles = Artikel::where('kategori', '!=', 'event')->latest('created_at')->take(5)->get();
        $recentEvents = Event::latest()->take(5)->get();
        $recentUpgrades = Upgrade::with('user')->where('status', 'pending')->latest()->take(5)->get();
        
        // Menggabungkan semua aktivitas dan mengurutkan berdasarkan waktu terbaru
        $activities = collect();
        
        // Menambahkan pengguna baru
        foreach ($recentUsers as $user) {
            $activities->push([
                'type' => 'user',
                'title' => 'Pengguna Baru Terdaftar',
                'description' => $user->nama . ' telah mendaftar sebagai ' . $user->role . ' baru',
                'time' => $user->created_at,
                'icon' => 'user',
                'color' => 'blue'
            ]);
        }
        
        // Menambahkan artikel baru
        foreach ($recentArticles as $article) {
            $activities->push([
                'type' => 'article',
                'title' => 'Artikel Baru Dipublikasikan',
                'description' => $article->judul . ' telah dipublikasikan',
                'time' => $article->created_at,
                'icon' => 'article',
                'color' => 'green'
            ]);
        }
        
        // Menambahkan event baru
        foreach ($recentEvents as $event) {
            $activities->push([
                'type' => 'event',
                'title' => 'Acara Baru Dipublikasikan',
                'description' => $event->title . ' telah dipublikasikan',
                'time' => $event->created_at,
                'icon' => 'event',
                'color' => 'purple'
            ]);
        }
        
        // Menambahkan pengajuan baru
        foreach ($recentUpgrades as $upgrade) {
            $activities->push([
                'type' => 'upgrade',
                'title' => 'Pengajuan Baru',
                'description' => $upgrade->user->nama . ' mengajukan diri sebagai pengelola bank sampah',
                'time' => $upgrade->created_at,
                'icon' => 'upgrade',
                'color' => 'yellow'
            ]);
        }
        
        // Mengurutkan berdasarkan waktu terbaru dan mengambil 6 aktivitas terbaru
        $recentActivities = $activities->sortByDesc('time')->take(6);
        
        // Statistik untuk cards
        $totalUsers = User::count();
        $totalArticles = Artikel::where('kategori', '!=', 'event')->count();
        $totalEvents = Event::count();
        $pendingUpgrades = Upgrade::where('status', 'pending')->count();

        // Data awal untuk statistik kunjungan
        $period = $request->input('period', '7d');
        $visitStats = $this->prepareVisitStats($period);

        // Ambil semua lokasi bank sampah untuk map
        $locations = \App\Models\Lokasi::whereNotNull('latitude')->whereNotNull('longitude')->get();

        return view('admin.beranda.index', compact(
            'recentActivities', 'totalUsers', 'totalArticles', 'totalEvents', 'pendingUpgrades',
            'visitStats', 'period', 'locations'
        ));
    }

    /**
     * Endpoint API untuk mengambil data statistik kunjungan.
     */
    public function getVisitStats(Request $request)
    {
        $period = $request->input('period', '7d');
        $stats = $this->prepareVisitStats($period);
        return response()->json($stats);
    }

    /**
     * Helper function untuk menyiapkan data statistik kunjungan.
     */
    private function prepareVisitStats(string $period): array
    {
        $query = Visit::query();
        $visitLabels = [];
        $visitCounts = [];

        if ($period === '7d') {
            $startDate = Carbon::now()->subDays(6)->startOfDay();
            $visitData = $query->where('date', '>=', $startDate->toDateString())
                ->select('date', DB::raw('COUNT(DISTINCT user_id) as visits'))
                ->groupBy('date')->orderBy('date', 'asc')->pluck('visits', 'date');

            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $visitLabels[] = $date->translatedFormat('D, j M');
                $visitCounts[] = $visitData[$date->format('Y-m-d')] ?? 0;
            }
        } elseif ($period === '30d') {
            $startDate = Carbon::now()->subDays(29)->startOfDay();
            $visitData = $query->where('created_at', '>=', $startDate)
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as visits'))
                ->groupBy('date')->orderBy('date', 'asc')->pluck('visits', 'date');

            $dateRange = Carbon::parse($startDate)->toPeriod(Carbon::now());
            foreach ($dateRange as $date) {
                $visitLabels[] = $date->translatedFormat('j M');
                $visitCounts[] = $visitData[$date->format('Y-m-d')] ?? 0;
            }
        } else { // 'all'
            $visitData = $query->select(DB::raw("DATE_FORMAT(date, '%Y-%m') as month"), DB::raw('COUNT(DISTINCT user_id) as visits'))
                ->groupBy('month')->orderBy('month', 'asc')->pluck('visits', 'month');

            if ($visitData->isNotEmpty()) {
                $startDate = Carbon::parse($visitData->keys()->first() . '-01');
                $endDate = Carbon::now()->endOfMonth();
                $dateRange = $startDate->toPeriod($endDate, '1 month');
                foreach ($dateRange as $date) {
                    $visitLabels[] = $date->translatedFormat('M Y');
                    $visitCounts[] = $visitData[$date->format('Y-m')] ?? 0;
                }
            }
        }

        return [
            'labels' => $visitLabels,
            'counts' => $visitCounts,
            'total' => array_sum($visitCounts)
        ];
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

        // Update the user's role to 'pengelola'
        $user = User::findOrFail($pengajuan->user_id);
        $user->update(['role' => 'pengelola']);

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
    
    public function user(Request $request)
    {
        $query = User::query();

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $allowedSorts = ['nama', 'email', 'role', 'created_at'];
        $sort = $request->query('sort');
        $direction = $request->query('direction', 'asc') === 'desc' ? 'desc' : 'asc';

        if ($sort && in_array($sort, $allowedSorts)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderByDesc('created_at');
        }

        $users = $query->get();

        return view('admin.user.index', compact('users', 'search'));
    }

    // Add method to delete user
    public function deleteUser($id)
    {
        // Prevent admin from deleting themselves
        if (Auth::id() === (int)$id) {
            return redirect()->route('admin.user')->with([
                'message' => 'Anda tidak dapat menghapus akun Anda sendiri.',
                'type' => 'error'
            ]);
        }

        $user = User::findOrFail($id);
        
        // Prevent admin from deleting other admins or superadmins
        if (Auth::user()->role === 'admin' && in_array($user->role, ['admin', 'superadmin'])) {
            return redirect()->route('admin.user')->with([
                'message' => 'Anda tidak memiliki izin untuk menghapus akun admin atau superadmin lain.',
                'type' => 'error'
            ]);
        }
        
        $user->delete();

        return redirect()->route('admin.user')->with([
            'message' => 'User berhasil dihapus.',
            'type' => 'success'
        ]);
    }

    /* =========================================================
     *  Fitur SUPERADMIN
     * =======================================================*/

    /**
     * Simpan akun admin baru. Hanya superadmin yang boleh memanggil.
     */
    public function storeAdmin(Request $request)
    {
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required|string|min:10|max:15',
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'no_hp' => $validated['no_hp'],
            'role' => 'admin',
            // izin default true
            'can_create_article' => true,
            'can_create_event' => true,
        ]);

        return redirect()->route('admin.user')->with([
            'message' => 'Akun admin berhasil dibuat.',
            'type' => 'success'
        ]);
    }

    /**
     * Promote admin menjadi superadmin.
     */
    public function promoteAdmin($id)
    {
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id);

        if ($user->role !== 'admin') {
            return redirect()->route('admin.user')->with([
                'message' => 'Hanya admin yang dapat dipromosikan.',
                'type' => 'error'
            ]);
        }

        $user->update(['role' => 'superadmin']);

        return redirect()->route('admin.user')->with([
            'message' => 'Admin berhasil dipromosikan menjadi superadmin.',
            'type' => 'success'
        ]);
    }

    /**
     * Update akses per admin (artikel & event create toggle).
     */
    public function updatePermissions(Request $request, $id)
    {
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id);

        // pastikan target user admin (atau superadmin lain?)
        if (!in_array($user->role, ['admin', 'superadmin'])) {
            return redirect()->route('admin.user')->with([
                'message' => 'Target user bukan admin/superadmin.',
                'type' => 'error'
            ]);
        }

        $user->update([
            'can_create_article' => $request->boolean('can_create_article'),
            'can_create_event' => $request->boolean('can_create_event'),
        ]);

        return redirect()->route('admin.user')->with([
            'message' => 'Hak akses berhasil diperbarui.',
            'type' => 'success'
        ]);
    }
}