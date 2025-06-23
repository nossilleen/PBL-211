<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated($request, $user)
    {
        // Logic statistik kunjungan login unik per user per hari
        \App\Models\Visit::firstOrCreate([
            'user_id' => $user->user_id,
            'date' => now()->toDateString(),
        ]);

        if ($user->force_password_change) {
            return redirect()->route('password.force-change')
                ->with('warning', 'Anda harus mengganti password default sebelum melanjutkan.');
        }

        // Redirect admin ke dashboard admin
        if ($user->role === 'admin') {
            session()->flash('welcome', 'Selamat datang kembali, ' . $user->nama . ' Senang melihatmu lagi di EcoZense.');
            return redirect()->intended('/admin');
        }

        // Set flash message untuk notifikasi selamat datang dengan nama user
        // Memastikan pesan menampilkan nama user yang sedang login
        $userName = $user->name ?? ''; // Fallback jika nama tidak tersedia
        session()->flash('welcome', 'Selamat datang kembali, ' . $userName . ' Senang melihatmu lagi di EcoZense.');
        
        return redirect()->intended($this->redirectPath());
    }
}
