@extends('layout')

@section('title', 'Detail Gerakan - ' . $gerakan->nama)

@section('content')
@php
    // Deteksi jika kategori saat ini adalah Anak-anak berdasarkan nama kategori
    $isAnak = strtolower($gerakan->kategori->nama) === 'anak-anak';

    // Konfigurasi Tema Bunglon berbasis Tailwind
    $themeHeaderBg   = $isAnak ? 'bg-gradient-to-r from-yellow-400 to-orange-400' : 'bg-green-600';
    $themeHeaderTeks = $isAnak ? 'text-blue-900 font-extrabold text-3xl dynamic-bounce' : 'text-white text-2xl font-bold';
    $themeCardBorder = $isAnak ? 'border-4 border-dashed border-yellow-400 rounded-3xl shadow-xl' : 'rounded-xl shadow-md border border-gray-200';
    $themeNavBtnNext = $isAnak ? 'bg-pink-500 hover:bg-pink-600 text-white rounded-full px-6 py-3 font-bold shadow-[0_4px_0_rgb(190,24,74)] transform hover:-translate-y-0.5 transition' : 'bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-2 font-semibold transition';
    $themeNavBtnPrev = $isAnak ? 'bg-blue-400 hover:bg-blue-500 text-white rounded-full px-6 py-3 font-bold shadow-[0_4px_0_rgb(29,78,216)] transform hover:-translate-y-0.5 transition' : 'bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg px-4 py-2 font-semibold transition';
    $themeBacaanBox  = $isAnak ? 'bg-amber-50 border-2 border-amber-200 rounded-2xl' : 'bg-gray-50 border border-gray-200 rounded-lg';
    $themeIndicator  = $isAnak ? 'border-b-4 border-pink-400 text-pink-500' : 'border-b-2 border-green-500 text-gray-800';
@endphp

@if($isAnak)
<style>
    @keyframes bounceLittle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }
    .dynamic-bounce {
        animation: bounceLittle 2s infinite ease-in-out;
    }
</style>
@endif

<div class="mb-4">
    <a href="{{ route('panduan.daftar', $gerakan->id_kategori) }}" class="inline-flex items-center {{ $isAnak ? 'text-blue-500 hover:text-blue-700 font-bold' : 'text-green-700 hover:text-green-900 font-semibold' }}">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        {{ $isAnak ? '🎈 Kembali ke Daftar Seru' : 'Kembali ke Daftar Gerakan' }}
    </a>
</div>

<div class="bg-white overflow-hidden mb-6 {{ $themeCardBorder }}">
    <div class="p-4 text-center {{ $themeHeaderBg }}">
        <h2 class="{{ $themeHeaderTeks }}">
            {{ $isAnak ? '🌟 Gerakan ' . $gerakan->urutan . ': ' . $gerakan->nama . ' 🌟' : 'Urutan ' . $gerakan->urutan . ': ' . $gerakan->nama }}
        </h2>
    </div>

    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6 mb-8">
            @if($gerakan->gambar_url)
            <div class="flex-1">
                <p class="text-sm font-semibold text-gray-500 mb-2">Ilustrasi Gerakan:</p>
                <img src="{{ asset($gerakan->gambar_url) }}" alt="{{ $gerakan->nama }}" class="w-full h-auto rounded-xl shadow border border-gray-100 object-cover">
            </div>
            @endif

            <div class="flex-1 flex flex-col justify-center">
                <p class="text-gray-700 leading-relaxed mb-4 text-lg">
                    <strong>Panduan:</strong> {{ $gerakan->deskripsi }}
                </p>
                
                @if($gerakan->video_url)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-500 mb-2">🎞 Video Tutorial:</p>
                    <video controls class="w-full shadow border border-gray-200 {{ $isAnak ? 'rounded-2xl border-4 border-sky-200' : 'rounded-lg' }}">
                        <source src="{{ asset($gerakan->video_url) }}" type="video/mp4">
                        Browser Anda tidak mendukung elemen video.
                    </video>
                </div>
                @endif
            </div>
        </div>

        @if($gerakan->bacaan->count() > 0)
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-xl font-bold mb-4 inline-block pb-1 {{ $themeIndicator }}">
                    {{ $isAnak ? '📢 Ayo Membaca! 📢' : 'Bacaan Sholat' }}
                </h3>
                
                @foreach($gerakan->bacaan as $bacaan)
                <div class="p-5 mb-4 {{ $themeBacaanBox }}">
                    @if($bacaan->teks_arab)
                        <p class="text-3xl text-right font-arabic leading-loose mb-4 text-gray-900" dir="rtl">{{ $bacaan->teks_arab }}</p>
                    @endif
                    
                    @if($bacaan->teks_latin)
                        <p class="text-lg italic text-gray-700 mb-2 font-medium">"{{ $bacaan->teks_latin }}"</p>
                    @endif
                    
                    @if($bacaan->terjemahan)
                        <p class="text-gray-600 mb-4 text-base"><strong>Artinya:</strong> {{ $bacaan->terjemahan }}</p>
                    @endif

                    @if($bacaan->audio_url)
                        <div class="mt-4">
                            <audio controls class="w-full audio-player">
                                <source src="{{ asset($bacaan->audio_url) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung elemen audio.
                            </audio>
                        </div>
                    @endif
                    
                    <p class="text-xs text-gray-400 mt-3 text-right">Sumber: {{ $bacaan->sumber }}</p>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="flex justify-between items-center bg-white p-4 rounded-xl shadow-md border border-gray-200">
    <div>
        @if($prev)
            <a href="{{ route('panduan.detail', $prev->id) }}" class="inline-flex items-center duration-200 {{ $themeNavBtnPrev }}">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Sebelumnya
            </a>
        @endif
    </div>
    
    <div>
        @if($next)
            <a href="{{ route('panduan.detail', $next->id) }}" class="inline-flex items-center duration-200 {{ $themeNavBtnNext }}" id="btn-next">
                {{ $isAnak ? 'Lanjut Lagi 🚀' : 'Selanjutnya' }}
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const audios = document.querySelectorAll('.audio-player');
        const btnNext = document.getElementById('btn-next');
        
        if(audios.length > 0) {
            // Mainkan audio otomatis (jika diizinkan browser)
            audios[0].play().catch(e => console.log("Autoplay ditangguhkan kebijakan browser."));
            
            // Pindah otomatis ke rute selanjutnya saat durasi audio terakhir habis
            audios[audios.length - 1].addEventListener('ended', function() {
                if(btnNext) {
                    setTimeout(() => {
                        window.location.href = btnNext.href;
                    }, 1500); // Memberi jeda waktu 1.5 detik
                }
            });
        }
    });
</script>
@endsection