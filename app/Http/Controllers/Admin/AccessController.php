<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccessChangedNotification;

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

        // Kirim notifikasi ke pengelola
        Notification::send($user, new AccessChangedNotification(
            $request->operations,
            auth()->user()
        ));

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
