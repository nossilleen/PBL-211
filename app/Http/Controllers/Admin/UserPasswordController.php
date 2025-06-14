<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make('password'),
            'force_password_change' => true
        ]);

        // Tambahkan flash message untuk user yang passwordnya direset
        session()->flash('password_reset', 'Password telah direset. Gunakan password: "password" untuk login.');
        return redirect()->back()->with('success', 'Password berhasil direset.');
    }

    public function showForceChangeForm()
    {
        return view('auth.passwords.force-change');
    }

    public function forceChange(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        
        $user->update([
            'password' => Hash::make($request->password),
            'force_password_change' => false
        ]);

        return redirect('/')->with('success', 'Password berhasil diubah.');
    }
}
