<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'pengelola')->get();
        return view('admin.users.permissions', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'can_create_product' => 'boolean',
            'can_edit_product' => 'boolean',
            'can_delete_product' => 'boolean',
            'can_view_product' => 'boolean'
        ]);

        $user->update([
            'can_create_product' => $request->has('can_create_product'),
            'can_edit_product' => $request->has('can_edit_product'),
            'can_delete_product' => $request->has('can_delete_product'),
            'can_view_product' => $request->has('can_view_product')
        ]);

        return redirect()->back()->with('success', 'Hak akses pengelola berhasil diperbarui');
    }
}
