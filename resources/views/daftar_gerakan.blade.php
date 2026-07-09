@extends('layout')

@section('title', 'Daftar Gerakan - Mode ' . $kategori->nama)

@section('content')
<div class="mb-6">
    <a href="{{ route('home') }}" class="inline-flex items-center text-green-700 hover:text-green-900 mb-4 font-semibold">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Kembali ke Pilih Mode
    </a>
    
    <h2 class="text-2xl font-bold text-gray-800">
        Panduan Sholat (Mode {{ $kategori->nama }})
    </h2>
    <p class="text-gray-600 mt-1">Pilih urutan gerakan di bawah ini untuk melihat detail bacaan dan panduannya.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <ul class="divide-y divide-gray-200">
        
        @forelse($gerakan as $g)
            <li>
                <a href="{{ route('panduan.detail', $g->id) }}" class="block hover:bg-green-50 transition duration-200 p-4 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold text-lg border border-green-300">
                                {{ $g->urutan }}
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800">{{ $g->nama }}</p>
                            </div>
                        </div>
                        
                        <div class="text-gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
        @empty
            <li class="p-6 text-center text-gray-500">
                Belum ada data gerakan untuk kategori ini. Silakan tambahkan melalui Seeder atau Database.
            </li>
        @endforelse
        
    </ul>
</div>
@endsection