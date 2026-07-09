<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Gerakan;

class GerakanController extends Controller
{
    /**
     * Menampilkan halaman awal untuk memilih Mode (Dewasa / Anak-anak)
     */
    public function pilihMode()
    {
        $kategori = Kategori::all();
        
        // Akan memanggil file view: resources/views/home.blade.php
        return view('home', compact('kategori')); 
    }

    /**
     * Menampilkan daftar urutan gerakan berdasarkan mode yang dipilih
     */
    public function daftarGerakan($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        
        // Mengambil semua gerakan pada kategori tersebut, diurutkan berdasarkan kolom 'urutan'
        $gerakan = Gerakan::where('id_kategori', $id_kategori)
                          ->orderBy('urutan', 'asc')
                          ->get();

        // Akan memanggil file view: resources/views/daftar_gerakan.blade.php
        return view('daftar_gerakan', compact('kategori', 'gerakan'));
    }

    /**
     * Menampilkan halaman detail 1 gerakan (termasuk 4 lapis bacaan dan media)
     */
    public function detailGerakan($id_gerakan)
    {
        // Mengambil detail gerakan sekaligus memuat relasi 'bacaan' (Eager Loading)
        $gerakan = Gerakan::with('bacaan')->findOrFail($id_gerakan);
        
        // Logika untuk tombol NEXT: Cari gerakan dengan urutan lebih besar di kategori yang sama
        $next = Gerakan::where('id_kategori', $gerakan->id_kategori)
                       ->where('urutan', '>', $gerakan->urutan)
                       ->orderBy('urutan', 'asc')
                       ->first();
                       
        // Logika untuk tombol PREVIOUS: Cari gerakan dengan urutan lebih kecil di kategori yang sama
        $prev = Gerakan::where('id_kategori', $gerakan->id_kategori)
                       ->where('urutan', '<', $gerakan->urutan)
                       ->orderBy('urutan', 'desc')
                       ->first();

        // Akan memanggil file view: resources/views/detail_gerakan.blade.php
        return view('detail_gerakan', compact('gerakan', 'next', 'prev'));
    }
}