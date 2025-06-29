<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification as CustomNotification;

class AccessController extends Controller
{
    public function manageAccess(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        
        // Validasi request
        $request->validate([
            'operations' => 'required|array',
            'operations.*' => 'in:create,read,update,delete'
        ]);

        // Simpan hak akses dalam format JSON di kolom meta
        $user->meta = [
            'product_operations' => $request->operations
        ];
        $user->save();

        // Buat notifikasi manual di tabel notifications kustom
        CustomNotification::create([
            'user_id' => $user->user_id,
            'type' => 'event', // gunakan salah satu enum yang sudah ada
            'title' => 'Hak Akses Diubah',
            'message' => 'Hak akses produk Anda telah diubah oleh admin.',
            'url' => null,
        ]);

        return response()->json([
            'message' => 'Hak akses berhasil diperbarui',
            'operations' => $request->operations
        ]);
    }

    public function getAccess($userId)
    {
        $user = User::findOrFail($userId);
        return response()->json([
            'operations' => $user->meta['product_operations'] ?? []
        ]);
    }
}
