<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request, $artikel_id)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:feedback,feedback_id'
        ]);

        $artikel = Artikel::findOrFail($artikel_id);

        Feedback::create([
            'komentar' => $request->komentar,
            'user_id' => Auth::id(),
            'artikel_id' => $artikel->artikel_id,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('artikel.show', $artikel->artikel_id)
            ->with('success', 'Feedback berhasil dikirim.');
    }
}