<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lomba - Peserta</title>
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

    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-700 opacity-70 text-[10px] font-bold uppercase tracking-wider">Peserta</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm sidebar-text">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm sidebar-text">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm sidebar-text">Profil Saya</span>
                </a>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0 font-sans">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Eksplorasi Lomba</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')
                </div>

            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <div class="max-w-7xl mx-auto animate-fade-in-up">

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Cari Lomba 🎯</h2>
                    <p class="text-slate-500">Temukan kompetisi yang sesuai dengan minat dan jenjang pendidikanmu.</p>
                </div>

                <form action="{{ route('peserta.dashboard') }}" method="GET" class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="relative">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Pencarian</label>
                            <svg class="w-5 h-5 absolute left-3 top-[38px] text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white text-sm transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Kategori</label>
                            <select name="category_id" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white text-sm transition-all appearance-none cursor-pointer text-slate-700">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Jenjang</label>
                            <select name="level" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white text-sm transition-all appearance-none cursor-pointer text-slate-700">
                                <option value="">Semua Jenjang</option>
                                <option value="SD" {{ request('level') == 'SD' ? 'selected' : '' }}>SD/Sederajat</option>
                                <option value="SMP" {{ request('level') == 'SMP' ? 'selected' : '' }}>SMP/Sederajat</option>
                                <option value="SMA" {{ request('level') == 'SMA' ? 'selected' : '' }}>SMA/SMK/Sederajat</option>
                                <option value="Universitas" {{ request('level') == 'Universitas' ? 'selected' : '' }}>Universitas/Umum</option>
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="w-full py-2.5 bg-blue-600 text-white rounded-xl text-sm font-bold hover:bg-blue-700 transition">Terapkan Filter</button>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-6 pt-5 border-t border-slate-100">
                        <p class="text-sm font-medium text-slate-500">Menampilkan <span class="font-bold text-slate-900">{{ $competitions->count() }}</span> lomba relevan</p>
                        <a href="{{ route('peserta.dashboard') }}" class="text-sm font-bold text-slate-400 hover:text-red-500 transition-colors flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Reset Filter
                        </a>
                    </div>
                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    @forelse($competitions as $index => $l)
                    <div class="bg-white rounded-[2rem] border border-slate-200 overflow-hidden hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 group flex flex-col justify-between animate-fade-in-up cursor-pointer" 
                         style="animation-delay: {{ $index * 75 }}ms">
                        <div class="h-44 relative overflow-hidden bg-slate-100">
                            @if($l->poster)
                            <img src="{{ asset('storage/' . $l->poster) }}" alt="Poster" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                             <img src="{{ asset('images/lomba.png') }}" alt="Poster Lomba" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-2.5 py-1 bg-blue-600 text-white rounded text-[10px] font-bold uppercase tracking-wide shadow-sm">{{ $l->level }}</span>
                                <span class="px-2.5 py-1 bg-green-500 text-white rounded text-[10px] font-bold uppercase tracking-wide shadow-sm">{{ $l->category }}</span>
                            </div>
                        </div>

                        <div class="p-5 flex-1 flex flex-col">
                            <h3 class="font-bold text-slate-900 text-lg leading-snug mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $l->title }}</h3>

                            <div class="space-y-2 mt-auto">
                                <div class="flex items-start text-sm text-slate-500 gap-2">
                                    <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="line-clamp-1">{{ $l->organizer->name ?? 'Penyelenggara' }}</span>
                                </div>
                                <div class="flex items-center text-sm text-slate-500 gap-2">
                                    <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Tutup: {{ \Carbon\Carbon::parse($l->deadline)->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="px-2.5 py-1 {{ $l->registration_fee > 0 ? 'bg-slate-100 text-slate-700' : 'bg-green-100 text-green-700' }} text-xs font-bold rounded-md">
                                        {{ $l->registration_fee > 0 ? 'Rp ' . number_format($l->registration_fee, 0, ',', '.') : 'Gratis' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="px-5 pb-5">
                            <div class="flex justify-between items-center mb-4 pt-4 border-t border-slate-100">
                                <span class="text-xs font-medium text-slate-400">Kredibilitas</span>
                                <div class="flex items-center gap-1.5">
                                    <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                    <span class="text-sm font-bold text-slate-800">{{ $l->credibility_score }}<span class="text-slate-400 text-xs font-medium">/100</span></span>
                                </div>
                            </div>
                           <a href="{{ route('peserta.detail', $l->id) }}" class="block text-center w-full py-2.5 bg-blue-600 text-white rounded-xl text-sm font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    @empty
                    @include('partials.empty_state', [
                        'title' => 'Lomba Belum Ditemukan',
                        'message' => 'Cobalah mencari dengan kata kunci lain atau pilih kategori yang berbeda.',
                        'action_url' => route('peserta.dashboard'),
                        'action_text' => 'Reset Pencarian'
                    ])

                    @endforelse

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
    @include('partials.scripts')
</body>
</html>

