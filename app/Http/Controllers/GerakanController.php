<?php

namespace App\Http\Controllers;

use App\Models\Gerakan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GerakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $gerakan = Gerakan::with(['kategori', 'bacaan'])->orderBy('urutan')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar gerakan berhasil diambil',
            'data' => $gerakan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'nama' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'gambar_url' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
        ]);

        $gerakan = Gerakan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Gerakan berhasil dibuat',
            'data' => $gerakan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $gerakan = Gerakan::with(['kategori', 'bacaan'])->find($id);

        if (!$gerakan) {
            return response()->json([
                'success' => false,
                'message' => 'Gerakan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail gerakan berhasil diambil',
            'data' => $gerakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $gerakan = Gerakan::find($id);

        if (!$gerakan) {
            return response()->json([
                'success' => false,
                'message' => 'Gerakan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'nama' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'gambar_url' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
        ]);

        $gerakan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Gerakan berhasil diperbarui',
            'data' => $gerakan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $gerakan = Gerakan::find($id);

        if (!$gerakan) {
            return response()->json([
                'success' => false,
                'message' => 'Gerakan tidak ditemukan'
            ], 404);
        }

        $gerakan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gerakan berhasil dihapus'
        ]);
    }
}
