<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi tambahan untuk elemen melayang */ # Animasi perbagus web
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <nav class="bg-white/80 backdrop-blur-md shadow-sm fixed w-full z-50 top-0 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-gradient-to-br from-emerald-500 to-green-700 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-green-200">
                        AIK
                    </div>
                    <span class="font-extrabold text-xl bg-clip-text text-transparent bg-gradient-to-r from-green-700 to-emerald-500">
                        Panduan Sholat Tarjih Muhammadiyah
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-28 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        @yield('content')
    </main>

    <footer class="bg-slate-800 text-slate-300 py-8 text-center text-sm border-t border-slate-700">
        <p class="font-semibold text-slate-200">Proyek Pembelajaran Berbasis Proyek (PjBL) - 2026</p>
        <p class="text-slate-400 mt-1 mb-4">Dosen Pengampu: Dedy Susanto, S.Pd.I., M.M.</p>
        
        <div class="max-w-md mx-auto pt-4 border-t border-slate-700/50 text-slate-400">
            <p class="text-xs uppercase tracking-wider font-bold text-emerald-400 mb-2">Dibuat Oleh Kelompok:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1 text-left max-w-xs mx-auto text-xs md:text-sm">
                <div>• Syafiq Indirwan <span class="text-slate-500">(241230065)</span></div>
                <div>• Ferry Dharmawansyah <span class="text-slate-500">(221230041)</span></div>
                <div>• Iksan Nugraha <span class="text-slate-500">(241230057)</span></div>
                <div>• Abiyyu Farras <span class="text-slate-500">(221230029)</span></div>
            </div>
        </div>
    </footer>

</body>
</html>
