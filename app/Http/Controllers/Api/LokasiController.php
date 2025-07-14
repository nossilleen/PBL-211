<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Mengembalikan daftar lokasi bank sampah terdekat berdasarkan koordinat pengguna.
     * Endpoint: GET /api/nearest-locations?lat={lat}&lng={lng}&limit={optional}
     */
    public function nearest(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'lat'   => 'required|numeric',
            'lng'   => 'required|numeric',
            'limit' => 'sometimes|integer|min:1|max:100',
        ]);

        $lat   = $validated['lat'];
        $lng   = $validated['lng'];
        $limit = $validated['limit'] ?? 20;

        // Formula Haversine untuk menghitung jarak (dalam kilometer)
        // 6371 adalah radius bumi dalam KM
        $locations = Lokasi::selectRaw(
            'lokasi.*, (
                6371 * acos(
                    cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) +
                    sin(radians(?)) * sin(radians(latitude))
                )
            ) AS distance',
            [$lat, $lng, $lat]
        )
            ->orderBy('distance')
            ->limit($limit)
            ->get();

        return response()->json([
            'data' => $locations,
        ]);
    }
} 