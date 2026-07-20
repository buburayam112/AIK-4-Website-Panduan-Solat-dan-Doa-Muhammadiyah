@extends('layout')

@section('title', 'Beranda - Panduan Sholat Tarjih Muhammadiyah')

@section('content')
<div class="relative bg-gradient-to-br from-emerald-900 via-green-800 to-emerald-600 rounded-[2.5rem] shadow-2xl overflow-hidden mb-16">
    <div class="absolute -right-20 -top-20 w-72 h-72 bg-emerald-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
    <div class="absolute -left-20 -bottom-20 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>

    <div class="relative z-10 py-16 px-6 md:px-12 text-center">
        <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-emerald-50 text-xs md:text-sm font-semibold tracking-widest mb-6 backdrop-blur-md shadow-inner">
            Sistem Informasi • Universitas Muhammadiyah Pontianak
        </span>
        
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-md leading-tight">
            Mari Belajar <span class="text-emerald-200">Sholat</span>
        </h1>
        <p class="text-lg md:text-xl text-emerald-50/90 font-light max-w-2xl mx-auto mb-2">
            Panduan tata cara sholat interaktif sesuai dengan Himpunan Putusan Tarjih (HPT) Muhammadiyah.
        </p>
    </div>
</div>

<div class="text-center mb-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-3">Pilih Mode Panduan</h2>
    <p class="text-gray-500 max-w-lg mx-auto">Sesuaikan tampilan, ilustrasi, dan bahasa panduan dengan audiens pengguna.</p>
</div>


@endsection
