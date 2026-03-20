<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Lomba - Peserta</title>
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

        /* Memastikan baris kalender memiliki tinggi minimum agar seragam */
        .calendar-cell { min-height: 100px; }
        @media (max-width: 768px) { .calendar-cell { min-height: 80px; } }
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
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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
            <h1 class="text-lg font-bold text-slate-800">Jadwal & Agenda</h1>

            <div class="flex items-center gap-6">
                <div class="relative hidden sm:block">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari jadwal lomba..." class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 w-64 transition-all">
                </div>

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
            <div class="max-w-7xl mx-auto">

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Kalender Lomba 📅</h2>
                    <p class="text-slate-500">Pantau jadwal pendaftaran, technical meeting, dan pelaksanaan kompetisi yang kamu ikuti.</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                    <div class="xl:col-span-2">
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

                            <div class="p-6 flex items-center justify-between border-b border-slate-100">
                                <h3 class="text-xl font-bold text-slate-800">Agustus 2026</h3>
                                <div class="flex items-center gap-4">
                                    <button class="px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition">Hari Ini</button>
                                    <div class="flex items-center gap-1">
                                        <button class="p-2 rounded-lg text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                        </button>
                                        <button class="p-2 rounded-lg text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-slate-100">
                                <div class="grid grid-cols-7 gap-px bg-slate-200 border-b border-slate-200">
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Sen</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Sel</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Rab</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Kam</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Jum</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest">Sab</div>
                                    <div class="bg-slate-50 text-center py-3 text-xs font-bold text-slate-500 uppercase tracking-widest text-red-400">Min</div>
                                </div>

                                <div class="grid grid-cols-7 gap-px bg-slate-200">

                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>

                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                        <span class="text-sm font-semibold text-slate-700">1</span>
                                        <div class="mt-1 px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded shadow-sm border border-green-200 leading-tight">Buka Daftar OSN</div>
                                    </div>
                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                        <span class="text-sm font-semibold text-red-500">2</span>
                                    </div>

                                    @for ($i = 3; $i <= 14; $i++)
                                        <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                            <span class="text-sm font-semibold {{ $i % 7 == 2 ? 'text-red-500' : 'text-slate-700' }}">{{ $i }}</span>
                                        </div>
                                    @endfor

                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                        <span class="text-sm font-semibold text-slate-700">15</span>
                                        <div class="mt-1 px-2 py-1 bg-red-100 text-red-700 text-[10px] font-bold rounded shadow-sm border border-red-200 leading-tight mb-1">Tutup Daftar OSN</div>
                                        <div class="px-2 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded shadow-sm border border-blue-200 leading-tight">TM Lomba Puisi</div>
                                    </div>

                                    @for ($i = 16; $i <= 19; $i++)
                                        <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                            <span class="text-sm font-semibold {{ $i % 7 == 2 ? 'text-red-500' : 'text-slate-700' }}">{{ $i }}</span>
                                        </div>
                                    @endfor

                                    <div class="bg-blue-50/50 calendar-cell p-2 flex flex-col group cursor-pointer ring-inset ring-2 ring-blue-500">
                                        <span class="w-6 h-6 flex items-center justify-center bg-blue-600 text-white rounded-full text-sm font-bold shadow-md shadow-blue-200">20</span>
                                        <div class="mt-2 px-2 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold rounded shadow-sm border border-amber-200 leading-tight">Technical Meeting OSN</div>
                                    </div>

                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50"><span class="text-sm font-semibold text-slate-700">21</span></div>
                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50"><span class="text-sm font-semibold text-slate-700">22</span></div>
                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50"><span class="text-sm font-semibold text-red-500">23</span></div>

                                    <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                        <span class="text-sm font-semibold text-slate-700">24</span>
                                        <div class="mt-1 px-2 py-1 bg-purple-100 text-purple-700 text-[10px] font-bold rounded shadow-sm border border-purple-200 leading-tight relative overflow-hidden">
                                            <div class="absolute inset-y-0 left-0 w-1 bg-purple-500"></div>
                                            <span class="ml-1">Pelaksanaan OSN</span>
                                        </div>
                                    </div>

                                    @for ($i = 25; $i <= 31; $i++)
                                        <div class="bg-white calendar-cell p-2 flex flex-col group cursor-pointer hover:bg-slate-50">
                                            <span class="text-sm font-semibold {{ $i % 7 == 2 ? 'text-red-500' : 'text-slate-700' }}">{{ $i }}</span>
                                        </div>
                                    @endfor

                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>
                                    <div class="bg-white/50 calendar-cell p-2"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="xl:col-span-1">
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6 md:p-8 sticky top-6">
                            <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Agenda Terdekat
                            </h3>

                            <div class="space-y-4">

                                <div class="flex items-start gap-4">
                                    <div class="flex flex-col items-center justify-center w-12 h-12 bg-blue-50 border border-blue-200 rounded-xl shrink-0">
                                        <span class="text-xs font-bold text-blue-600 uppercase">Ags</span>
                                        <span class="text-lg font-extrabold text-blue-900 leading-none">20</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">Technical Meeting OSN</h4>
                                        <p class="text-xs text-slate-500 mt-1 line-clamp-1">Kementerian Pendidikan RI</p>
                                        <span class="inline-block mt-2 px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded">Hari Ini</span>
                                    </div>
                                </div>

                                <hr class="border-slate-100">

                                <div class="flex items-start gap-4">
                                    <div class="flex flex-col items-center justify-center w-12 h-12 bg-slate-50 border border-slate-200 rounded-xl shrink-0">
                                        <span class="text-xs font-bold text-slate-500 uppercase">Ags</span>
                                        <span class="text-lg font-extrabold text-slate-700 leading-none">24</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">Pelaksanaan OSN</h4>
                                        <p class="text-xs text-slate-500 mt-1 line-clamp-1">Sains & Matematika</p>
                                        <span class="inline-block mt-2 px-2 py-0.5 bg-purple-100 text-purple-700 text-[10px] font-bold rounded">Ujian / Lomba</span>
                                    </div>
                                </div>

                                <hr class="border-slate-100">

                                <div class="flex items-start gap-4 opacity-75">
                                    <div class="flex flex-col items-center justify-center w-12 h-12 bg-slate-50 border border-slate-200 rounded-xl shrink-0">
                                        <span class="text-xs font-bold text-slate-500 uppercase">Sep</span>
                                        <span class="text-lg font-extrabold text-slate-700 leading-none">01</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">Penyisihan Cipta Puisi</h4>
                                        <p class="text-xs text-slate-500 mt-1 line-clamp-1">Komunitas Sastra Muda</p>
                                        <span class="inline-block mt-2 px-2 py-0.5 bg-slate-100 text-slate-600 text-[10px] font-bold rounded">Menunggu Jadwal</span>
                                    </div>
                                </div>

                            </div>

                            <button class="w-full mt-8 py-3 border border-slate-200 text-sm font-bold text-slate-600 rounded-xl hover:bg-slate-50 transition-colors">
                                Lihat Semua Jadwal
                            </button>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>
