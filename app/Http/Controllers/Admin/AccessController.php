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
        
        // Validasi request (opsional boleh kosong)
        $request->validate([
            'operations' => 'nullable|array',
            'operations.*' => 'in:create,read,update,delete'
        ]);

        $operations = $request->input('operations', []);

        // Simpan hak akses dalam format JSON di kolom meta
        $user->meta = [
            'product_operations' => $operations
        ];
        $user->save();

        // Buat notifikasi manual di tabel notifications kustom
        CustomNotification::create([
            'user_id' => $user->user_id,
            'type' => 'event',
            'title' => 'Hak Akses Diubah',
            'message' => 'Hak akses produk Anda telah diubah oleh admin.',
            'url' => null,
        ]);

        return response()->json([
            'message' => 'Hak akses berhasil diperbarui',
            'operations' => $operations
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
