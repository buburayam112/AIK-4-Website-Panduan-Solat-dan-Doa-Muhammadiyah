<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerakanController;

Route::get('/', [GerakanController::class, 'pilihMode'])->name('home');

Route::get('/panduan/{id_kategori}', [GerakanController::class, 'daftarGerakan'])->name('panduan.daftar');
Route::get('/panduan/detail/{id_gerakan}', [GerakanController::class, 'detailGerakan'])->name('panduan.detail');

Route::get('/inject-data', function() {
    // Menghapus data lama agar tidak duplikat
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    \App\Models\Kategori::truncate();
    \App\Models\Gerakan::truncate();
    \App\Models\Bacaan::truncate();
    \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Membuat Kategori Baru
    $dewasa = \App\Models\Kategori::create(['nama' => 'Dewasa']);
    $anak   = \App\Models\Kategori::create(['nama' => 'Anak-anak']);

    // Membuat 1 Contoh Gerakan (Memasukkan Video MP4)
    $gerakan = \App\Models\Gerakan::create([
        'id_kategori' => $dewasa->id,
        'nama'        => 'Takbiratul Ihram',
        'urutan'      => 1,
        'deskripsi'   => 'Mengangkat kedua tangan sejajar dengan bahu atau telinga seraya mengucapkan takbir.',
        'video_url'   => 'assets/videos/takbir.mp4',
        'gambar_url'  => null,
    ]);

    // Membuat 1 Contoh Bacaan
    \App\Models\Bacaan::create([
        'id_gerakan' => $gerakan->id,
        'urutan'     => 1,
        'teks_arab'  => 'اللهُ أَكْبَرُ',
        'teks_latin' => 'Allāhu akbar',
        'terjemahan' => 'Allah Maha Besar.',
        'sumber'     => 'HPT Muhammadiyah',
        'audio_url'  => 'assets/audios/takbir.mp3',
    ]);

    // Duplikasi untuk Mode Anak-anak
    $gerakanAnak = $gerakan->replicate();
    $gerakanAnak->id_kategori = $anak->id;
    $gerakanAnak->deskripsi = "Ayo perhatikan gerakan ini: " . $gerakan->deskripsi;
    $gerakanAnak->save();

    $bacaanAnak = \App\Models\Bacaan::where('id_gerakan', $gerakan->id)->first()->replicate();
    $bacaanAnak->id_gerakan = $gerakanAnak->id;
    $bacaanAnak->save();

    return "Data awal beserta video berhasil disuntikkan ke database!";
});
Route::get('/cek-data', function() {
    return \App\Models\Kategori::all();
});
