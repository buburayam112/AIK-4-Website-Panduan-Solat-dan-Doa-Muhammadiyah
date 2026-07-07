<?php

namespace App\Http\Controllers;

use App\Models\Bacaan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BacaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $bacaan = Bacaan::with('gerakan')->orderBy('urutan')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar bacaan berhasil diambil',
            'data' => $bacaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_gerakan' => 'required|exists:gerakan,id',
            'urutan' => 'required|integer|min:1',
            'teks_arab' => 'required|string',
            'teks_latin' => 'required|string',
            'terjemahan' => 'required|string',
            'audio_url' => 'nullable|url|max:255',
            'sumber' => 'nullable|string|max:255',
        ]);

        $bacaan = Bacaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Bacaan berhasil dibuat',
            'data' => $bacaan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $bacaan = Bacaan::with('gerakan')->find($id);

        if (!$bacaan) {
            return response()->json([
                'success' => false,
                'message' => 'Bacaan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail bacaan berhasil diambil',
            'data' => $bacaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $bacaan = Bacaan::find($id);

        if (!$bacaan) {
            return response()->json([
                'success' => false,
                'message' => 'Bacaan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'id_gerakan' => 'required|exists:gerakan,id',
            'urutan' => 'required|integer|min:1',
            'teks_arab' => 'required|string',
            'teks_latin' => 'required|string',
            'terjemahan' => 'required|string',
            'audio_url' => 'nullable|url|max:255',
            'sumber' => 'nullable|string|max:255',
        ]);

        $bacaan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Bacaan berhasil diperbarui',
            'data' => $bacaan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $bacaan = Bacaan::find($id);

        if (!$bacaan) {
            return response()->json([
                'success' => false,
                'message' => 'Bacaan tidak ditemukan'
            ], 404);
        }

        $bacaan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bacaan berhasil dihapus'
        ]);
    }
}
