<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lomba - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    <aside class="w-64 bg-white border-r border-slate-200 flex-col justify-between hidden md:flex z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-xl font-bold tracking-tight text-blue-600">LombaPeta</span>
                    <span class="px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold uppercase tracking-wider">Peserta</span>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm">Profil Saya</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm">Keluar</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <h1 class="text-lg font-bold text-slate-800">Detail Lomba</h1>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    <button class="relative text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                    </button>
                    <button class="w-9 h-9 rounded-full bg-blue-600 text-white font-bold text-sm flex items-center justify-center shadow-md shadow-blue-200">
                        PS
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <div class="max-w-6xl mx-auto pb-12">

                <nav class="flex text-sm text-slate-500 mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li><a href="#" class="hover:text-blue-600">Beranda</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li><a href="#" class="hover:text-blue-600">Pencarian</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li class="font-semibold text-slate-800">Sains</li>
                    </ol>
                </nav>

                <div class="relative w-full h-80 md:h-[400px] rounded-3xl overflow-hidden shadow-lg mb-6">
                    <img src="https://placehold.co/1200x400/1e3a8a/60a5fa?text=Ilustrasi+Sains" alt="Banner Lomba" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                        <div class="flex gap-2 mb-4">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-md text-white rounded-full text-xs font-bold uppercase tracking-wider border border-white/30">SMA</span>
                            <span class="px-3 py-1 bg-blue-600 text-white rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">Sains</span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-3 leading-tight max-w-4xl">
                            Olimpiade Sains Nasional (OSN) Tingkat SMA 2026
                        </h1>
                        <div class="flex items-center text-blue-100 gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="font-medium">Kementerian Pendidikan dan Kebudayaan RI</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-slate-100 mb-8">
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Pendaftaran Ditutup</p>
                        <p class="font-bold text-slate-900">15 Agustus 2026</p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Biaya Pendaftaran</p>
                        <p class="font-bold text-green-600">Gratis</p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Target Peserta</p>
                        <p class="font-bold text-slate-900">SMA Nasional</p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center bg-slate-50/50 rounded-b-2xl md:rounded-r-2xl md:rounded-bl-none">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-2 shadow-sm border border-emerald-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Skor Kredibilitas</p>
                        <p class="font-extrabold text-emerald-600 text-lg leading-none">98<span class="text-sm font-medium text-slate-400">/100</span></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 border-b border-slate-100 pb-3">Deskripsi Kompetisi</h3>
                            <div class="prose prose-slate max-w-none text-slate-600 text-sm md:text-base leading-relaxed space-y-4">
                                <p>
                                    Olimpiade Sains Nasional (OSN) adalah ajang kompetisi bidang sains bagi pelajar SD, SMP, dan SMA di seluruh Indonesia. Kompetisi ini diselenggarakan oleh Pusat Prestasi Nasional, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia.
                                </p>
                                <p>
                                    Tujuan dari program ini adalah untuk mengidentifikasi dan membina talenta-bakat siswa dalam bidang sains, serta memotivasi mereka untuk berprestasi di tingkat nasional maupun internasional.
                                </p>
                            </div>

                            <h4 class="text-lg font-bold text-slate-900 mt-8 mb-4">Bidang yang Dilombakan:</h4>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Matematika
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Fisika
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Kimia
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Informatika/Komputer
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Biologi
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Astronomi
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Ekonomi
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div> Kebumian & Geografi
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-slate-900 mb-8 border-b border-slate-100 pb-3">Timeline Kegiatan</h3>

                            <div class="relative border-l-2 border-slate-200 ml-4 space-y-10 pb-4">

                                <div class="relative pl-8">
                                    <div class="absolute -left-[11px] top-1 w-5 h-5 rounded-full bg-white border-4 border-blue-600 flex items-center justify-center"></div>
                                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                        <h4 class="font-bold text-blue-700">Pendaftaran Online</h4>
                                        <p class="text-sm text-slate-500 mt-1 flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            1 - 15 Agustus 2026
                                        </p>
                                    </div>
                                </div>

                                <div class="relative pl-8">
                                    <div class="absolute -left-[11px] top-1 w-5 h-5 rounded-full bg-slate-200 border-4 border-white flex items-center justify-center shadow-sm"></div>
                                    <div>
                                        <h4 class="font-bold text-slate-700">Technical Meeting</h4>
                                        <p class="text-sm text-slate-500 mt-1">20 Agustus 2026</p>
                                    </div>
                                </div>

                                <div class="relative pl-8">
                                    <div class="absolute -left-[11px] top-1 w-5 h-5 rounded-full bg-slate-200 border-4 border-white flex items-center justify-center shadow-sm"></div>
                                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                        <h4 class="font-bold text-slate-700">Penyisihan Tingkat Kabupaten</h4>
                                        <p class="text-sm text-slate-500 mt-1">1 - 3 September 2026</p>
                                    </div>
                                </div>

                                <div class="relative pl-8">
                                    <div class="absolute -left-[11px] top-1 w-5 h-5 rounded-full bg-slate-200 border-4 border-white flex items-center justify-center shadow-sm"></div>
                                    <div>
                                        <h4 class="font-bold text-slate-700">Final Tingkat Nasional</h4>
                                        <p class="text-sm text-slate-500 mt-1">15 Oktober 2026</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="sticky top-6 space-y-6">

                            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-4">
                                <a href="#" class="flex justify-center items-center gap-2 w-full py-3.5 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all text-lg">
                                    Daftar Sekarang
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>

                                <button class="flex justify-center items-center gap-2 w-full py-3.5 bg-white text-slate-700 border-2 border-slate-200 rounded-xl font-bold hover:bg-slate-50 hover:border-slate-300 transition-all">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                    Simpan ke Favorit
                                </button>
                            </div>

                            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                                <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2 border-b border-slate-100 pb-3">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Laporan Kredibilitas
                                </h3>

                                <div class="space-y-4 text-sm mb-6">
                                    <div class="flex justify-between items-center">
                                        <span class="text-slate-500">Status Penyelenggara</span>
                                        <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md font-bold text-xs">Terverifikasi</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-slate-500">Riwayat Lomba</span>
                                        <span class="font-bold text-slate-800">Tahun ke-10</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-slate-500">Kontak Jelas</span>
                                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </div>

                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-xs text-blue-800 leading-relaxed">
                                        Lomba ini diselenggarakan oleh instansi pemerintah resmi. <b>Aman untuk diikuti.</b>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>
