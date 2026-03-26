<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi & Manajemen Lomba - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .gradient-blue { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-600 opacity-70 text-[10px] font-bold uppercase tracking-wider">Admin</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm sidebar-text">Dashboard</span>
                </a>

                <a href="{{ route('admin.verifikasi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
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

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Manajemen Verifikasi Lomba</h1>
            </div>
            <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                @include('partials.notifications')
                @include('partials.profile_avatar')
            </div>


        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-8 animate-fade-in-up">

                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 animate-fade-in shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
                @endif

                <div>
                    <h2 class="text-3xl font-black text-slate-900 mb-1 tracking-tight">Verifikasi Lomba 🏆</h2>
                    <p class="text-slate-500">Tinjau, beri skor kredibilitas, dan kelola semua pengajuan kompetisi dari penyelenggara.</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex items-center justify-between transition-all hover:shadow-md hover:border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-500 text-xs uppercase tracking-widest">Total Lomba</h3>
                        </div>
                        <p class="text-3xl font-black text-slate-900 ml-4">{{ $competitions->count() }}</p>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex items-center justify-between transition-all hover:shadow-md hover:border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-500 text-xs uppercase tracking-widest">Disetujui</h3>
                        </div>
                        <p class="text-3xl font-black text-slate-900 ml-4">{{ $competitions->where('status', 'approved')->count() }}</p>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex items-center justify-between transition-all hover:shadow-md hover:border-amber-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-500 text-xs uppercase tracking-widest">Menunggu</h3>
                        </div>
                        <p class="text-3xl font-black text-slate-900 ml-4">{{ $competitions->where('status', 'pending')->count() }}</p>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex items-center justify-between transition-all hover:shadow-md hover:border-red-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-500 text-xs uppercase tracking-widest">Ditolak</h3>
                        </div>
                        <p class="text-3xl font-black text-slate-900 ml-4">{{ $competitions->where('status', 'rejected')->count() }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-xl overflow-hidden">
                    <div class="p-8 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                        <div>
                            <h3 class="text-xl font-black text-slate-800 tracking-tight">Daftar Pengajuan Kompetisi</h3>
                            <p class="text-xs text-slate-400 font-bold mt-1 uppercase tracking-widest">Real-time database records</p>
                        </div>
                        <div class="relative w-full sm:w-80">
                            <svg class="w-4 h-4 absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" placeholder="Cari judul, kategori, atau penyelenggara..." class="w-full pl-11 pr-6 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all shadow-inner">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-200">
                                <tr>
                                    <th class="px-8 py-5">Nama Lomba</th>
                                    <th class="px-8 py-5">Kategori & Jenjang</th>
                                    <th class="px-8 py-5">Deadline</th>
                                    <th class="px-8 py-5">Kredibilitas</th>
                                    <th class="px-8 py-5">Status</th>
                                    <th class="px-8 py-5 text-center">Kelola</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                                @forelse($competitions as $lomba)
                                <tr class="hover:bg-blue-50/30 transition-all group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            @if($lomba->poster)
                                            <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-12 h-16 object-cover rounded-lg shadow-sm border border-slate-200 bg-slate-100">
                                            @else
                                            <img src="{{ asset('images/lomba.png') }}" class="w-12 h-16 object-cover rounded-lg shadow-sm border border-slate-200 bg-slate-100">
                                            @endif
                                            <div>
                                                <p onclick="showLombaDetail({{ $lomba->id }})" class="font-black text-slate-900 group-hover:text-blue-600 transition-colors cursor-pointer leading-tight">{{ $lomba->title }}</p>
                                                <p class="text-xs text-slate-400 font-bold uppercase tracking-tighter mt-1">{{ $lomba->user->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <p class="font-bold text-slate-700">{{ $lomba->category }}</p>
                                        <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">{{ $lomba->level }}</p>
                                    </td>
                                    <td class="px-8 py-6">
                                        <p class="font-black text-slate-800">{{ $lomba->deadline->format('d M Y') }}</p>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase">{{ $lomba->deadline->diffForHumans() }}</p>
                                    </td>
                                    <td class="px-8 py-6">
                                        @if($lomba->credibility_score)
                                        <div class="flex items-center gap-2">
                                            <span class="w-10 h-10 rounded-xl flex items-center justify-center font-black text-xs {{ $lomba->credibility_score >= 80 ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                                {{ $lomba->credibility_score }}
                                            </span>
                                            <div class="flex-1 h-1.5 w-16 bg-slate-100 rounded-full overflow-hidden">
                                                <div class="h-full {{ $lomba->credibility_score >= 80 ? 'bg-green-500' : 'bg-amber-500' }}" style="width: {{ $lomba->credibility_score }}%"></div>
                                            </div>
                                        </div>
                                        @else
                                        <span class="text-[10px] font-black text-slate-300 uppercase italic">Not Scored</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black 
                                            {{ $lomba->status == 'pending' ? 'bg-amber-100 text-amber-700 border border-amber-200 shadow-sm' : 
                                               ($lomba->status == 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }} uppercase tracking-widest">
                                            {{ $lomba->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="openEditModal({{ $lomba->id }})" title="Edit / Setujui" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all active:scale-90 shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>

                                            @if($lomba->status == 'pending')
                                            <form action="{{ route('admin.verifikasi.update', $lomba->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <input type="hidden" name="title" value="{{ $lomba->title }}">
                                                <button type="submit" title="Tolak Pengajuan" class="p-3 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all active:scale-90 shadow-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                            </form>
                                            @endif

                                            <form action="{{ route('admin.verifikasi.delete', $lomba->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data lomba ini secara permanen?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Data" class="p-3 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-600 hover:text-white transition-all active:scale-90 shadow-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="px-8 py-20 text-center text-slate-400 italic">Tidak ada data kompetisi.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Competition Detail Modal -->
    <div id="lombaDetailModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md transition-all duration-300 opacity-0 text-slate-900">
        <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform scale-95 transition-all duration-300 relative">
            <button onclick="closeLombaModal()" class="absolute top-6 right-8 p-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full transition-all z-10 shadow-sm active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/3 p-10 bg-slate-50 flex flex-col items-center">
                    <img id="modalPoster" src="" class="w-full h-[400px] object-cover rounded-3xl shadow-2xl border-4 border-white mb-6 bg-white">
                    <div id="modalCredBadge" class="px-6 py-2 rounded-2xl font-black text-sm uppercase tracking-widest text-center shadow-md">
                        Kredibilitas: <span id="modalScoreText">--</span>
                    </div>
                </div>

                <div class="lg:w-2/3 p-10 lg:pl-0">
                    <div class="px-4">
                        <span id="modalCategory" class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full mb-4 inline-block">Category</span>
                        <h3 id="modalTitle" class="text-4xl font-black text-slate-900 mb-6 tracking-tight leading-none">--</h3>
                        
                        <div class="grid grid-cols-2 gap-6 mb-8">
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Penyelenggara</p>
                                <p id="modalOrganizer" class="font-bold text-slate-800">--</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Level</p>
                                <p id="modalLevel" class="font-bold text-slate-800">--</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Deadline</p>
                                <p id="modalDeadline" class="font-bold text-slate-800 text-red-600">--</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Lokasi</p>
                                <p id="modalLocation" class="font-bold text-slate-800">--</p>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Deskripsi Kompetisi</p>
                            <div id="modalDescription" class="prose prose-sm text-slate-600 font-medium leading-relaxed max-h-48 overflow-y-auto pr-4 break-words whitespace-pre-line">--</div>
                        </div>

                        <!-- Mini Audit Trail for Detail Modal -->
                        <div class="pt-6 border-t border-slate-100">
                             <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Riwayat Perubahan & Aktivitas
                             </p>
                             <div id="detailLogsContainer" class="space-y-3 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                                 <!-- Logs will be injected here -->
                             </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Registration Fee</p>
                                <p id="modalFee" class="text-2xl font-black text-blue-600 font-mono">--</p>
                            </div>
                            <a id="modalGuidebook" href="#" target="_blank" class="flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-2xl font-black text-xs hover:bg-slate-800 transition-all shadow-xl active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z"></path></svg>
                                Download Guidebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal (Credibility & Details) -->
    <div id="editModal" class="fixed inset-0 z-[110] hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-all duration-300 opacity-0 text-slate-900">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto p-10 transform scale-95 transition-all duration-300 relative">
            <div class="text-center mb-8">
                <div class="w-10 h-10 rounded-3xl bg-blue-100 text-blue-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Edit Detail Kompetisi</h3>
                <p class="text-slate-400 text-sm font-bold mt-1 tracking-tight">Admin Privilege: Modifikasi data kompetisi dan skor.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Form Side -->
                <form id="editForm" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1 ml-2">Judul Lomba</label>
                                <input type="text" name="title" id="editTitle" required class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-1 ml-2">Kategori</label>
                                    <select name="category_id" id="editCategory" class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-1 ml-2">Jenjang</label>
                                    <select name="level" id="editLevel" class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Universitas/Perguruan Tinggi">Universitas/Perguruan Tinggi</option>
                                        <option value="Umum">Umum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-1 ml-2">Status</label>
                                    <select name="status" id="editStatus" class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase mb-1 ml-2">Kredibilitas (%)</label>
                                    <input type="number" name="credibility_score" id="editScore" min="0" max="100" class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black text-blue-600">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 pt-4">
                            <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black text-sm hover:bg-blue-700 transition-all shadow-xl shadow-blue-200 active:scale-95">Simpan Perubahan</button>
                            <button type="button" onclick="closeEditModal()" class="w-full py-2 text-slate-400 font-bold text-xs hover:text-slate-600 transition-all">Tutup</button>
                        </div>
                    </div>
                </form>

                <!-- Audit Log Side -->
                <div class="bg-slate-50 rounded-3xl p-6 border border-slate-100 overflow-hidden flex flex-col">
                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        History Perubahan Detail
                    </h4>
                    <div id="editLogsContainer" class="space-y-4 overflow-y-auto pr-2 custom-scrollbar flex-1 max-h-[400px]">
                        <!-- Logs will be injected here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function renderLogs(logs, containerId) {
            const container = document.getElementById(containerId);
            container.innerHTML = '';
            
            if (!logs || logs.length === 0) {
                container.innerHTML = '<p class="text-xs text-slate-400 italic text-center py-4">Belum ada riwayat perubahan.</p>';
                return;
            }

            logs.forEach(log => {
                const date = new Date(log.created_at);
                const timeStr = date.toLocaleDateString('id-ID', {day: 'numeric', month: 'short'}) + ', ' + date.toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'});
                
                let changesHtml = '';
                if (log.properties && log.properties.changes) {
                    changesHtml = '<div class="mt-2 space-y-1 border-l-2 border-slate-200 pl-3 py-1 bg-white/50 rounded-r-lg">';
                    for (const [field, change] of Object.entries(log.properties.changes)) {
                        const oldVal = change.old === null ? 'NULL' : (typeof change.old === 'object' ? JSON.stringify(change.old) : (change.old || 'NULL'));
                        const newVal = change.new === null ? 'NULL' : (typeof change.new === 'object' ? JSON.stringify(change.new) : (change.new || 'NULL'));
                        changesHtml += `
                            <p class="text-[9px] text-slate-500 font-medium">
                                <span class="font-bold text-slate-600 uppercase text-[8px] tracking-wider">${field.replace('_', ' ')}:</span> 
                                <span class="text-slate-400 line-through opacity-70">${oldVal}</span> 
                                <span class="text-slate-300 mx-1">→</span> 
                                <span class="text-blue-600 font-bold">${newVal}</span>
                            </p>
                        `;
                    }
                    changesHtml += '</div>';
                }

                const logEl = document.createElement('div');
                logEl.className = 'flex gap-3 items-start group';
                logEl.innerHTML = `
                    <div class="w-8 h-8 rounded-full bg-white border border-slate-200 text-blue-600 flex items-center justify-center font-black text-[10px] shrink-0 shadow-sm">${(log.user?.name || '?').charAt(0)}</div>
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-800 leading-tight">${log.description}</p>
                        ${changesHtml}
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">${log.user?.name || 'System'} • ${log.user?.role || ''}</span>
                            <span class="text-[9px] text-slate-400 italic">${timeStr}</span>
                        </div>
                    </div>
                `;
                container.appendChild(logEl);
            });
        }

        function showLombaDetail(id) {
            const modal = document.getElementById('lombaDetailModal');
            const content = modal.querySelector('div');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);

            fetch(`/admin/verifikasi/${id}`)
                .then(response => response.json())
                .then(data => {
                    const lomba = data.competition;
                    document.getElementById('modalTitle').innerText = lomba.title;
                    document.getElementById('modalDescription').innerText = lomba.description;
                    document.getElementById('modalOrganizer').innerText = lomba.user ? lomba.user.name : '--';
                    document.getElementById('modalLevel').innerText = lomba.level;
                    document.getElementById('modalCategory').innerText = lomba.category;
                    document.getElementById('modalLocation').innerText = lomba.location;
                    document.getElementById('modalFee').innerText = 'Rp ' + parseInt(lomba.registration_fee || 0).toLocaleString('id-ID');
                    
                    const deadline = new Date(lomba.deadline);
                    document.getElementById('modalDeadline').innerText = deadline.toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'});
                    
                    document.getElementById('modalPoster').src = lomba.poster ? '/storage/' + lomba.poster : "{{ asset('images/lomba.png') }}";
                    document.getElementById('modalGuidebook').href = lomba.guidebook_link || '#';
                    document.getElementById('modalGuidebook').style.display = lomba.guidebook_link ? 'flex' : 'none';

                    const badge = document.getElementById('modalCredBadge');
                    const scoreText = document.getElementById('modalScoreText');
                    if (lomba.credibility_score) {
                        scoreText.innerText = lomba.credibility_score + '/100';
                        badge.className = `px-6 py-2 rounded-2xl font-black text-sm uppercase tracking-widest text-center shadow-md ${lomba.credibility_score >= 80 ? 'bg-green-600 text-white' : 'bg-amber-500 text-white'}`;
                    } else {
                        scoreText.innerText = 'Not Set';
                        badge.className = 'px-6 py-2 rounded-2xl font-black text-sm uppercase tracking-widest text-center shadow-md bg-slate-300 text-slate-600';
                    }

                    renderLogs(data.logs, 'detailLogsContainer');
                });
        }

        function closeLombaModal() {
            const modal = document.getElementById('lombaDetailModal');
            const content = modal.querySelector('div');
            modal.classList.remove('opacity-100');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        function openEditModal(id) {
            const modal = document.getElementById('editModal');
            const content = modal.querySelector('div');
            const form = document.getElementById('editForm');
            form.action = `/admin/verifikasi/${id}`;
            
            fetch(`/admin/verifikasi/${id}`)
                .then(response => response.json())
                .then(data => {
                    const lomba = data.competition;
                    document.getElementById('editTitle').value = lomba.title;
                    document.getElementById('editCategory').value = lomba.category_id;
                    document.getElementById('editLevel').value = lomba.level;
                    document.getElementById('editStatus').value = lomba.status;
                    document.getElementById('editScore').value = lomba.credibility_score || 80;
                    
                    renderLogs(data.logs, 'editLogsContainer');

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    setTimeout(() => {
                        modal.classList.add('opacity-100');
                        content.classList.remove('scale-95');
                        content.classList.add('scale-100');
                    }, 10);
                });
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            const content = modal.querySelector('div');
            modal.classList.remove('opacity-100');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('lombaDetailModal')) closeLombaModal();
            if (event.target == document.getElementById('editModal')) closeEditModal();
        }
    </script>

@include('partials.scripts')
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

