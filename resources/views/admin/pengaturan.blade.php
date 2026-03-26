<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan & Persetujuan Akun - Admin</title>
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
        
        .modal-active { overflow: hidden; }
        .bubble-pending { anime-pulse: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .7; } }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

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

                <a href="{{ route('admin.verifikasi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm sidebar-text">Verifikasi Lomba</span>
                </a>

                <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">

            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Pengaturan Sistem</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')
                </div>

            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-8 pb-20 animate-fade-in-up">

                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 animate-fade-in shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
                @endif

                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Persetujuan Akun 🔐</h2>
                    <p class="text-slate-500">Tinjau dan verifikasi pendaftaran akun penyelenggara maupun peserta baru di platform.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center gap-4 transition-all hover:border-amber-200 hover:shadow-md group">
                        <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-900 leading-none">{{ \App\Models\User::where('status', 'pending')->count() }}</p>
                            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">Pending Approval</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center gap-4 transition-all hover:border-green-200 hover:shadow-md group">
                        <div class="w-10 h-10 rounded-2xl bg-green-50 text-green-500 flex items-center justify-center group-hover:bg-green-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-900 leading-none">{{ \App\Models\User::where('status', 'approved')->count() }}</p>
                            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">Active Accounts</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center gap-4 transition-all hover:border-red-200 hover:shadow-md group">
                        <div class="w-10 h-10 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center group-hover:bg-red-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-slate-900 leading-none">{{ $deletedUsers->count() }}</p>
                            <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">Deleted Accounts</p>
                        </div>
                    </div>
                </div>

                @if($deletedUsers->count() > 0)
                <div class="bg-white rounded-3xl border-2 border-red-100 shadow-lg overflow-hidden transition-all hover:border-red-200">
                    <div class="p-6 border-b border-red-50 bg-red-50/50 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-black text-slate-800 tracking-tight">Daftar Akun Terhapus (Trash)</h3>
                                <p class="text-[10px] font-bold text-red-500 uppercase tracking-widest leading-none mt-1">Recently Removed Records</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Informasi Pengguna</th>
                                    <th class="px-6 py-4">Role</th>
                                    <th class="px-6 py-4">Waktu Hapus</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($deletedUsers as $du)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-slate-900">{{ $du->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $du->email }}</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 font-black text-[10px] uppercase tracking-wider">{{ $du->role }}</span>
                                    </td>
                                    <td class="px-6 py-5 text-xs text-slate-500 font-medium italic">
                                        {{ $du->deleted_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('admin.user.restore', $du->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all font-bold text-xs shadow-sm active:scale-95">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                    Restore
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- Audit Trail / Activity Log History Section -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden transition-all hover:border-blue-100">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-black text-slate-800 tracking-tight text-xl">Audit Trail & Riwayat Aktivitas</h3>
                                <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.2em] mt-0.5">Logging system records • Real-time database audit</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-[0.22em] border-b border-slate-100">
                                <tr>
                                    <th class="px-8 py-5">Pelaku</th>
                                    <th class="px-8 py-5">Aksi</th>
                                    <th class="px-8 py-5">Detail Aktivitas</th>
                                    <th class="px-8 py-5">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($recentLogs as $log)
                                <tr class="hover:bg-slate-50/50 transition-all group">
                                    <td class="px-8 py-5 border-r border-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs shrink-0">
                                                {{ substr($log->user->name ?? '?', 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-none mb-1">{{ $log->user->name ?? 'System/Deleted' }}</p>
                                                <span class="px-2 py-0.5 bg-slate-100 text-slate-500 rounded text-[8px] font-black uppercase tracking-wider">{{ $log->user->role ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        @php
                                            $colorClass = match($log->action) {
                                                'create' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                                'update' => 'bg-blue-100 text-blue-700 border-blue-200',
                                                'delete' => 'bg-red-100 text-red-700 border-red-200',
                                                'approve' => 'bg-green-100 text-green-700 border-green-200',
                                                'reject' => 'bg-amber-100 text-amber-700 border-amber-200',
                                                default => 'bg-slate-100 text-slate-700 border-slate-200'
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black border uppercase tracking-widest {{ $colorClass }}">
                                            {{ $log->action }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex flex-col">
                                            <p class="text-sm font-bold text-slate-700 leading-relaxed">{{ $log->description }}</p>
                                            
                                            @if(isset($log->properties['changes']))
                                                <div class="mt-2 space-y-1 border-l-2 border-slate-100 pl-3 bg-slate-50/50 py-1 rounded-r-lg">
                                                    @foreach($log->properties['changes'] as $field => $change)
                                                        <p class="text-[10px] text-slate-500 font-medium">
                                                            <span class="font-bold text-slate-600 uppercase text-[8px] tracking-wider">{{ str_replace('_', ' ', $field) }}:</span> 
                                                            <span class="text-slate-400 line-through opacity-70">{{ is_array($change['old'] ?? '') ? json_encode($change['old']) : ($change['old'] ?? 'NULL') }}</span> 
                                                            <span class="text-slate-300 mx-1">→</span> 
                                                            <span class="text-blue-600 font-bold">{{ is_array($change['new'] ?? '') ? json_encode($change['new']) : ($change['new'] ?? 'NULL') }}</span>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-tight mt-1">Origin: {{ $log->ip_address ?? 'Unknown' }} • {{ $log->model_type }} #{{ $log->model_id }}</p>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex flex-col text-right">
                                            <p class="text-xs font-black text-slate-800">{{ $log->created_at->diffForHumans() }}</p>
                                            <p class="text-[10px] text-slate-400 font-bold">{{ $log->created_at->format('d M, H:i') }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center text-slate-200 mb-2">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            <p class="text-slate-400 font-bold italic">Belum ada catatan aktivitas yang tersedia.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Active Penyelenggara Table -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden transition-all hover:border-blue-100">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-800 tracking-tight">Daftar Penyelenggara</h3>
                        </div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest border border-slate-200 px-3 py-1.5 rounded-full">{{ $organizers->count() }} Active</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Nama Penyelenggara</th>
                                    <th class="px-6 py-4">Waktu Daftar</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Kelola</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($organizers as $p)
                                <tr class="hover:bg-blue-50/20 transition-all group">
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-slate-900 group-hover:text-blue-700 transition-colors">{{ $p->name }}</p>
                                        <p class="text-xs text-slate-500 font-medium">{{ $p->email }}</p>
                                    </td>
                                    <td class="px-6 py-5 text-xs text-slate-500 font-bold uppercase tracking-tight">{{ $p->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-5">
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black {{ $p->status == 'pending' ? 'bg-amber-100 text-amber-700 border border-amber-200 bubble-pending' : 'bg-green-100 text-green-700 border border-green-200' }} uppercase tracking-widest">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="showUserDetail({{ $p->id }})" class="p-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm active:scale-90" title="Lihat Detail">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>

                                            @if($p->status == 'pending')
                                            <form action="{{ route('admin.user.approve', $p->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all shadow-sm active:scale-90" title="Setujui Akun">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </button>
                                            </form>
                                            @endif

                                            <form action="{{ route('admin.user.delete', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm active:scale-90" title="Hapus Akun">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="px-6 py-12 text-center text-slate-400 font-medium italic">Tidak ada penyelenggara aktif.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Active Peserta Table -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden transition-all hover:border-indigo-100">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <h3 class="font-bold text-slate-800 tracking-tight">Daftar Peserta (Siswa)</h3>
                        </div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest border border-slate-200 px-3 py-1.5 rounded-full">{{ $participants->count() }} Registered</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Identitas Peserta</th>
                                    <th class="px-6 py-4">Waktu Bergabung</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Kelola</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($participants as $u)
                                <tr class="hover:bg-indigo-50/20 transition-all group">
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-slate-900 group-hover:text-indigo-700 transition-colors">{{ $u->name }}</p>
                                        <p class="text-xs text-slate-500 font-medium">{{ $u->email }}</p>
                                    </td>
                                    <td class="px-6 py-5 text-xs text-slate-500 font-bold uppercase tracking-tight">{{ $u->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-5">
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black {{ $u->status == 'pending' ? 'bg-amber-100 text-amber-700 border border-amber-200 bubble-pending' : 'bg-green-100 text-green-700 border border-green-200' }} uppercase tracking-widest">
                                            {{ $u->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="showUserDetail({{ $u->id }})" class="p-2.5 bg-slate-50 text-slate-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm active:scale-90" title="Lihat Detail">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>

                                            @if($u->status == 'pending')
                                            <form action="{{ route('admin.user.approve', $u->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all shadow-sm active:scale-90" title="Setujui Akun">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </button>
                                            </form>
                                            @endif

                                            <form action="{{ route('admin.user.delete', $u->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm active:scale-90" title="Hapus Akun">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="px-6 py-12 text-center text-slate-400 font-medium italic">Belum ada peserta terdaftar.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Bidang Lomba (Kategori) CRUD -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800 tracking-tight">Bidang Lomba (Kategori)</h3>
                                <p class="text-xs text-slate-400 mt-0.5">Kategori yang tersedia saat penyelenggara pasang lomba</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest border border-slate-200 px-3 py-1.5 rounded-full">{{ $categories->count() }} Kategori</span>
                    </div>

                    <div class="p-6">
                        <!-- Add Category Form -->
                        <form action="{{ route('admin.kategori.store') }}" method="POST" class="flex gap-3 mb-6">
                            @csrf
                            <input type="text" name="name" placeholder="Nama kategori baru..." required
                                class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-violet-100 focus:border-violet-400 bg-slate-50 focus:bg-white transition-all text-sm">
                            <button type="submit" class="px-5 py-2.5 bg-violet-600 text-white rounded-xl font-bold text-sm hover:bg-violet-700 transition-all shadow-sm">
                                + Tambah
                            </button>
                        </form>

                        <!-- Categories List -->
                        <div class="flex flex-wrap gap-2">
                            @forelse($categories as $cat)
                            <div class="flex items-center gap-2 px-4 py-2 bg-violet-50 text-violet-700 rounded-xl border border-violet-100 text-sm font-bold">
                                <span>{{ $cat->name }}</span>
                                <form action="{{ route('admin.kategori.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori {{ $cat->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-violet-300 hover:text-red-500 transition-colors ml-1 leading-none">&times;</button>
                                </form>
                            </div>
                            @empty
                                <p class="text-slate-400 text-sm italic">Belum ada kategori. Tambahkan di atas.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- User Detail Modal (Vanilla JS) -->
    <div id="userDetailModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-all duration-300 opacity-0">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-lg w-full overflow-hidden transform scale-95 transition-all duration-300">
            <div class="h-32 bg-gradient-to-br from-blue-600 via-indigo-600 to-indigo-800 p-6 relative">
                <button onclick="closeModal()" class="absolute top-6 right-6 p-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition-colors backdrop-blur-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-10 pb-10 -mt-12">
                <div class="w-24 h-24 rounded-3xl bg-white p-1.5 mb-6 shadow-2xl ring-4 ring-white relative z-10">
                    <div id="modalAvatar" class="w-full h-full rounded-2xl bg-gradient-to-tr from-blue-100 to-blue-50 flex items-center justify-center text-blue-600 text-3xl font-black uppercase shadow-inner">
                        ?
                    </div>
                </div>
                
                <h3 id="modalName" class="text-3xl font-black text-slate-900 mb-1 tracking-tight">Memuat...</h3>
                <p class="text-slate-500 mb-8 flex items-center gap-2 font-medium">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span id="modalEmail">...</span>
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-5 rounded-3xl bg-slate-50/80 border border-slate-100 transition-hover hover:bg-white hover:shadow-sm">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Account Role</p>
                        <p id="modalRole" class="font-black text-slate-800 capitalize text-sm">--</p>
                    </div>
                    <div class="p-5 rounded-3xl bg-slate-50/80 border border-slate-100 transition-hover hover:bg-white hover:shadow-sm">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Account Status</p>
                        <p id="modalStatus" class="font-black text-blue-600 capitalize text-sm">--</p>
                    </div>
                    <div class="p-5 rounded-3xl bg-slate-50/80 border border-slate-100 transition-hover hover:bg-white hover:shadow-sm">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Username</p>
                        <p id="modalUsername" class="font-black text-slate-800 text-sm">--</p>
                    </div>
                    <div class="p-5 rounded-3xl bg-slate-50/80 border border-slate-100 transition-hover hover:bg-white hover:shadow-sm">
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Member Since</p>
                        <p id="modalJoined" class="font-black text-slate-800 text-sm">--</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showUserDetail(id) {
            const modal = document.getElementById('userDetailModal');
            const content = modal.querySelector('div');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);

            fetch(`/admin/user/${id}`)
                .then(response => response.json())
                .then(user => {
                    document.getElementById('modalName').innerText = user.name;
                    document.getElementById('modalEmail').innerText = user.email;
                    document.getElementById('modalRole').innerText = user.role;
                    document.getElementById('modalStatus').innerText = user.status;
                    document.getElementById('modalUsername').innerText = user.username || '-';
                    document.getElementById('modalAvatar').innerText = user.name.charAt(0);
                    
                    const date = new Date(user.created_at);
                    document.getElementById('modalJoined').innerText = date.toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'});
                })
                .catch(err => {
                    console.error('Error fetching user:', err);
                });
        }

        function closeModal() {
            const modal = document.getElementById('userDetailModal');
            const content = modal.querySelector('div');
            
            modal.classList.remove('opacity-100');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
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

