<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserPasswordController extends Controller
{
    public function resetPassword(Request $request, User $user)
    {
        // Generate random password
        $password = Str::random(10);
        
        // Update user password
        $user->update([
            'password' => Hash::make($password),
        ]);
        
        return redirect()->back()->with('success', "Password untuk {$user->nama} telah direset ke: {$password}");
    }
    
    public function showForceChangeForm()
    {
        return view('auth.passwords.force-change');
    }
    
    public function forceChange(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        
        $user = auth()->user();
        
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->intended('/')->with('success', 'Password berhasil diubah');
    }
}
