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
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow { animation: spin-slow 3s linear infinite; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    @auth
    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-700 opacity-70 text-[10px] font-bold uppercase tracking-wider">{{ auth()->user()->role == 'peserta' ? 'Peserta' : 'Admin' }}</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ auth()->user()->role == 'peserta' ? route('peserta.dashboard') : route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm sidebar-text">Info Lomba</span>
                </a>

                @if(auth()->user()->role == 'peserta')
                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm sidebar-text">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm sidebar-text">Profil Saya</span>
                </a>
                @endif
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="text-sm sidebar-text">Keluar</span>
                </button>
            </form>
        </div>
    </aside>
    @else
    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-700 opacity-70 text-[10px] font-bold uppercase tracking-wider">Guest</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="text-sm sidebar-text">Beranda</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100">
            <a href="{{ route('login') }}" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-blue-600 hover:bg-blue-50 font-bold transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm sidebar-text">Masuk / Daftar</span>
            </a>
        </div>
    </aside>
    @endauth

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Detail Lomba</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @auth
                        @include('partials.profile_avatar')
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100">Masuk</a>
                    @endauth
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <div class="max-w-6xl mx-auto pb-12 animate-fade-in-up">

                @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-2xl text-sm font-bold border border-green-200">
                    {{ session('success') }}
                </div>
                @endif

                <nav class="flex text-sm text-slate-500 mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li><a href="{{ route('home') }}#lomba" class="hover:text-blue-600">Pencarian</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li class="font-semibold text-slate-800">{{ $competition->category_id && $competition->category_relation ? $competition->category_relation->name : $competition->category }}</li>
                    </ol>
                </nav>

                <div class="relative w-full h-80 md:h-[400px] rounded-3xl overflow-hidden shadow-lg mb-6 text-white">
                    <img src="{{ $competition->poster_url }}" alt="{{ $competition->title }}" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                        <div class="flex gap-2 mb-4 text-white">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-wider border border-white/30">{{ $competition->level }}</span>
                            @if($competition->category_id && $competition->category_relation)
                                <span class="px-3 py-1 bg-blue-600 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">{{ $competition->category_relation->name }}</span>
                            @else
                                <span class="px-3 py-1 bg-blue-600 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">{{ $competition->category }}</span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-5xl font-extrabold mb-3 leading-tight max-w-4xl">
                            {{ $competition->title }}
                        </h1>
                        <div class="flex items-center text-blue-100 gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="font-medium">{{ $competition->user->name ?? 'Penyelenggara' }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-slate-100 mb-8">
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Tenggat Pendaftaran</p>
                        <p class="font-bold text-slate-900">{{ \Carbon\Carbon::parse($competition->deadline)->format('d F Y') }}</p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Biaya Pendaftaran</p>
                        <p class="font-bold {{ $competition->registration_fee > 0 ? 'text-slate-900' : 'text-green-600' }}">
                            {{ $competition->registration_fee > 0 ? 'Rp ' . number_format($competition->registration_fee, 0, ',', '.') : 'Gratis' }}
                        </p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center">
                        <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Target Peserta</p>
                        <p class="font-bold text-slate-900">{{ $competition->level }}</p>
                    </div>
                    <div class="p-5 flex flex-col items-center justify-center text-center bg-slate-50/50 rounded-b-2xl md:rounded-r-2xl md:rounded-bl-none">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-2 shadow-sm border border-emerald-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mb-1">Skor Kredibilitas</p>
                        <p class="font-extrabold text-emerald-600 text-lg leading-none">{{ $competition->credibility_score }}<span class="text-sm font-medium text-slate-400">/100</span></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                        <div class="lg:col-span-2 space-y-6">

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-slate-900 mb-4 border-b border-slate-100 pb-3">Deskripsi Kompetisi</h3>
                            <div class="prose prose-slate max-w-none text-slate-600 text-sm md:text-base leading-relaxed space-y-4 break-words whitespace-pre-line">
                                {!! nl2br(e($competition->description)) !!}
                            </div>

                            <h4 class="text-sm font-bold text-slate-900 mt-8 mb-4 uppercase tracking-wider">Lokasi / Keterangan:</h4>
                            <p class="text-slate-600 bg-slate-50 px-4 py-2.5 rounded-xl border border-slate-100 flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $competition->location }}
                            </p>

                            @if($competition->guidebook_link)
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <h4 class="text-sm font-bold text-slate-900 mb-4 uppercase tracking-wider">Guidebook / Panduan Lomba:</h4>
                                <a href="{{ $competition->guidebook_link }}" target="_blank" class="inline-flex items-center gap-3 px-6 py-3 bg-blue-50 text-blue-700 rounded-2xl border border-blue-100 font-bold hover:bg-blue-100 transition-all group">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    Buka Dokumen Panduan Official
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-slate-900 mb-8 border-b border-slate-100 pb-3">Kontak Panitia</h3>
                            <p class="text-slate-600 mb-2">WhatsApp / Narahubung:</p>
                            <a href="https://wa.me/{{ $competition->contact_info }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-500 text-white rounded-xl font-bold">
                                <img src="{{ asset('images/whatsapp.png') }}" class="w-5 h-5 object-contain" alt="WhatsApp">
                                {{ $competition->contact_info }}
                            </a>
                        </div>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="sticky top-6 space-y-6">

                            <div class="bg-white rounded-3xl shadow-xl shadow-blue-50 border border-blue-50 p-6 space-y-4 transition-all hover:shadow-blue-100">
                                @if($competition->status !== 'approved')
                                    <div class="w-full py-4 bg-slate-100 text-slate-400 rounded-2xl font-black text-center border-2 border-slate-200 flex flex-col items-center gap-1 shadow-inner opacity-70">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                            <span class="text-sm sidebar-text">Lomba Menunggu Verifikasi</span>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-[0.2em] opacity-60">Admin belum menyetujui lomba ini</span>
                                    </div>
                                @elseif(!$myRegistration)
                                    @auth
                                        @if(auth()->user()->role == 'peserta')
                                        <a href="{{ route('peserta.pendaftaran', $competition->id) }}" class="flex justify-center items-center gap-2 w-full py-4 bg-blue-600 text-white rounded-2xl font-black shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all text-lg active:scale-95">
                                            Daftar Sekarang
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                        @else
                                        <div class="w-full py-4 bg-slate-100 text-slate-400 rounded-2xl font-black text-center border-2 border-slate-200 opacity-70">
                                            <span class="text-sm">Hanya Peserta yang bisa Daftar</span>
                                        </div>
                                        @endif
                                    @else
                                    <a href="{{ route('login') }}" class="flex justify-center items-center gap-2 w-full py-4 bg-blue-600 text-white rounded-2xl font-black shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all text-lg active:scale-95">
                                        Login untuk Daftar
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </a>
                                    @endauth
                                @elseif($myRegistration->status == 'approved')
                                    <a href="{{ $myRegistration->group_link ?? '#' }}" target="_blank" class="flex justify-center items-center gap-3 w-full py-4 bg-[#25D366] text-white rounded-2xl font-black shadow-lg shadow-green-100 hover:scale-[1.02] hover:bg-[#20bd5c] transition-all text-lg active:scale-95">
                                        <img src="{{ asset('images/whatsapp.png') }}" class="w-7 h-7 object-contain" alt="WhatsApp">
                                        Masuk GB Lomba
                                    </a>
                                @elseif($myRegistration->status == 'pending')
                                    <div class="w-full py-4 bg-slate-100 text-slate-500 rounded-2xl font-black text-center border-2 border-slate-200 flex flex-col items-center gap-1 shadow-inner opacity-80">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                            <span class="text-sm sidebar-text">Tunggu Disetujui</span>
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-[0.2em] opacity-60">Status: Verifikasi Pending</span>
                                    </div>
                                @elseif($myRegistration->status == 'rejected')
                                    <div class="w-full py-4 bg-red-50 text-red-600 rounded-3xl font-black text-center border-2 border-dashed border-red-200 flex flex-col items-center gap-1 shadow-inner">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Pendaftaran Ditolak
                                        </div>
                                        <span class="text-[9px] font-black uppercase tracking-[0.2em] opacity-60 italic">Hubungi Panitia Segera</span>
                                    </div>
                                @endif

                                <form action="{{ auth()->check() ? route('peserta.bookmark.toggle', $competition->id) : route('login') }}" method="{{ auth()->check() ? 'POST' : 'GET' }}">
                                    @csrf
                                    <button type="submit" class="flex justify-center items-center gap-2 w-full py-3.5 bg-white text-slate-700 border-2 {{ $isBookmarked ? 'border-red-200 bg-red-50 text-red-600 hover:bg-red-100 hover:border-red-300' : 'border-slate-200 hover:bg-slate-50 hover:border-slate-300' }} rounded-xl font-bold transition-all">
                                        <svg class="w-5 h-5 {{ $isBookmarked ? 'text-red-500 fill-red-500' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        @guest Login untuk @endguest
                                        {{ $isBookmarked ? 'Hapus dari Favorit' : 'Simpan ke Favorit' }}
                                    </button>
                                </form>
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
                                        <span class="text-slate-500">Skor Peta</span>
                                        <span class="font-bold text-slate-800">{{ $competition->credibility_score }} / 100</span>
                                    </div>
                                </div>

                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-xs text-blue-800 leading-relaxed">
                                        Lomba ini telah divalidasi oleh tim LombaPeta. Periksa guidebook resmi sebelum pendaftaran.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>


<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            const computedDisplay = window.getComputedStyle(sidebar).display;
            if (computedDisplay === "none") {
                sidebar.style.display = "flex";
            } else {
                sidebar.style.display = "none";
            }
        } else {
            if (sidebar.classList.contains("w-64")) {
                sidebar.classList.remove("w-64");
                sidebar.classList.add("w-20");
                document.querySelectorAll(".sidebar-text").forEach(el => el.classList.add("hidden"));
            } else {
                sidebar.classList.remove("w-20");
                sidebar.classList.add("w-64");
                document.querySelectorAll(".sidebar-text").forEach(el => el.classList.remove("hidden"));
            }
        }
    }
</script>
</body>
</html>
