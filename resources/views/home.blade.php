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

<div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
    @foreach($kategori as $kat)
        @if($kat->nama == 'Dewasa')
            <a href="{{ route('panduan.daftar', $kat->id) }}" class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 border border-gray-100 transition-all duration-300 overflow-hidden cursor-pointer">
                <div class="absolute inset-0 bg-gradient-to-br from-transparent to-emerald-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out"></div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-20 h-20 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white group-hover:rotate-6 transition-all duration-300 shadow-sm">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-emerald-700 transition-colors">Mode Dewasa</h3>
                    <p class="text-gray-500 text-center text-sm leading-relaxed">
                        Panduan komprehensif dengan teks formal, rujukan dalil kitab lengkap.
                    </p>
                </div>
            </a>
        @else
            <a href="{{ route('panduan.daftar', $kat->id) }}" class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 border border-gray-100 transition-all duration-300 overflow-hidden cursor-pointer">
                <div class="absolute inset-0 bg-gradient-to-br from-transparent to-yellow-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-yellow-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out"></div>
                
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-20 h-20 bg-yellow-100 rounded-2xl flex items-center justify-center mb-6 text-yellow-500 group-hover:bg-yellow-400 group-hover:text-white group-hover:-rotate-6 transition-all duration-300 shadow-sm">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-800 mb-3 group-hover:text-yellow-600 transition-colors">Mode Anak-anak</h3>
                    <p class="text-gray-500 text-center text-sm leading-relaxed">
                        Panduan yang menyenangkan dengan bahasa ceria, ilustrasi visual, dan terjemahan sederhana.
                    </p>
                </div>
            </a>
        @endif
    @endforeach
</div>

@endsection
