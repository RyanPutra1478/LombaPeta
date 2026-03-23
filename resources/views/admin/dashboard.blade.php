<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Kustomisasi scrollbar ringan untuk area konten */
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-600 opacity-70 text-[10px] font-bold uppercase tracking-wider">Admin</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-slate-50 text-blue-700 font-semibold border border-slate-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a２ ２ ０ ０１－２ ２Ｈ６a２ ２ ０ ０１－２－２v－２zM14 16a２ ２ ０ ０１２－２h２a２ ２ ０ ０１２ ２v２a２ ２ ０ ０１－２ ２h－２a２ ２ ０ ０１－２－２v－２z"></path></svg>
                    <span class="text-sm sidebar-text">Dashboard</span>
                </a>

                <a href="{{ route('admin.verifikasi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm sidebar-text">Verifikasi Lomba</span>
                </a>

                <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="text-sm sidebar-text">Pengaturan</span>
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

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Dashboard Admin</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="relative hidden sm:block">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 w-64 transition-all">
                </div>

                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    <button class="relative text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                    </button>
                    <button class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 font-bold text-sm flex items-center justify-center border border-blue-200">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-8 animate-fade-in-up">

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-1">Selamat Datang, {{ auth()->user()->name }} 👋</h2>
                    <p class="text-slate-500 text-sm">Kelola dan monitor semua kompetisi yang masuk di platform.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-blue-600 text-sm">Antrean Menunggu</h3>
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-6">{{ $totalPending }}</p>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
                            <div class="bg-blue-600 h-1.5 rounded-full w-[{{ $totalPending > 0 ? 50 : 0 }}%]"></div>
                        </div>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-green-200 shadow-sm relative overflow-hidden" style="background: linear-gradient(to bottom right, #f0fdf4, #ffffff);">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-green-700 text-sm">Disetujui</h3>
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 border border-green-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ $totalApproved }}</p>
                        <p class="text-xs font-bold text-green-600">Seluruh Waktu</p>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-orange-200 shadow-sm relative overflow-hidden" style="background: linear-gradient(to bottom right, #fff7ed, #ffffff);">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-orange-600 text-sm">Total Kompetisi</h3>
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 border border-orange-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ $totalApproved + $totalPending }}</p>
                        <p class="text-xs font-bold text-orange-600">Seluruh Kategori</p>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-purple-200 shadow-sm relative overflow-hidden" style="background: linear-gradient(to bottom right, #faf5ff, #ffffff);">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-purple-700 text-sm">Total Pengguna</h3>
                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 border border-purple-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ $totalUsers }}</p>
                        <p class="text-xs font-bold text-purple-600">Siswa & Penyelenggara</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex flex-col">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="font-bold text-slate-900">Performa Verifikasi</h3>
                                <p class="text-xs text-slate-500 mt-1">Tren penerimaan lomba 30 hari terakhir</p>
                            </div>
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full border border-green-100">Meningkat</span>
                        </div>

                        <div class="flex-1 bg-slate-50 rounded-2xl border border-dashed border-slate-200 flex flex-col items-center justify-center min-h-[250px] text-slate-400">
                            <svg class="w-8 h-8 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                            <span class="text-sm font-medium">Grafik area akan ditampilkan di sini</span>
                        </div>
                    </div>

                    <div class="lg:col-span-1 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                        <h3 class="font-bold text-slate-900 mb-6">Kategori Populer</h3>

                        <div class="space-y-6">
                            @php $maxCount = $popularCategories->max('count') ?: 1; @endphp
                            @forelse($popularCategories as $cat)
                            <div>
                                <div class="flex justify-between text-sm font-bold text-slate-700 mb-2">
                                    <span>{{ $cat->category }}</span>
                                    <span>{{ $cat->count }}</span>
                                </div>
                                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                    <div class="bg-blue-600 h-full rounded-full transition-all duration-500" style="width: {{ ($cat->count / $maxCount) * 100 }}%"></div>
                                </div>
                            </div>
                            @empty
                                <p class="text-slate-400 italic text-sm py-4">Belum ada kategori lomba.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-slate-900 text-lg">Aktivitas Terbaru</h3>
                        <a href="{{ route('admin.verifikasi') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                            Lihat Verifikasi <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse($recentActivities as $activity)
                        <div class="flex items-start gap-4 p-4 rounded-2xl border border-slate-100 hover:bg-slate-50 transition cursor-pointer" onclick="window.location='{{ route('admin.verifikasi') }}'">
                            <div class="mt-1.5 w-2.5 h-2.5 rounded-full {{ $activity->status == 'pending' ? 'bg-blue-500' : ($activity->status == 'approved' ? 'bg-green-500' : 'bg-red-500') }} shrink-0 shadow-sm"></div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-sm">
                                    {{ $activity->status == 'pending' ? 'Lomba Baru Disubmit' : ($activity->status == 'approved' ? 'Lomba Disetujui' : 'Lomba Ditolak') }}
                                </h4>
                                <p class="text-xs text-slate-500 mt-1">{{ $activity->title }} - {{ $activity->user->name }}</p>
                            </div>
                            <span class="text-xs font-medium text-slate-400">{{ $activity->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                            <p class="text-slate-400 italic text-sm text-center py-6">Belum ada aktivitas pendaftaran lomba.</p>
                        @endforelse
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
