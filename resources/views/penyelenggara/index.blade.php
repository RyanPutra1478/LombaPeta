<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lomba Saya - Penyelenggara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="#" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-green-600 opacity-70 text-[10px] font-bold uppercase tracking-wider border border-green-100">Penyelenggara</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('penyelenggara.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm sidebar-text">Dashboard</span>
                </a>

                <a href="{{ route('penyelenggara.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="text-sm sidebar-text">Pasang Info Lomba</span>
                </a>

                <a href="{{ route('penyelenggara.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="text-sm sidebar-text">Lomba Saya</span>
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
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Manajemen Lomba</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="w-9 h-9 rounded-full bg-green-100 text-green-700 font-bold text-sm flex items-center justify-center border border-green-200">{{ substr(auth()->user()->name, 0, 1) }}</button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-6 animate-fade-in-up">

                <div class="flex justify-between items-end mb-4">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-1">Daftar Lomba Saya</h2>
                        <p class="text-slate-500 text-sm">Kelola kompetisi yang telah Anda ajukan di platform LombaPeta.</p>
                    </div>
                    <a href="{{ route('penyelenggara.create') }}" class="hidden sm:flex px-6 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Pasang Lomba Baru
                    </a>
                </div>

                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100">
                        @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-xl text-sm font-bold">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="relative w-full sm:w-72">
                            <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" placeholder="Cari..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-4">Info Lomba</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Tenggat</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                                @forelse($competitions as $l)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-slate-900">{{ $l->title }}</p>
                                        <p class="text-xs text-slate-500 mt-1">Dibuat: {{ $l->created_at->format('d M Y') }}</p>
                                    </td>
                                    <td class="px-6 py-4"><span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded text-xs font-bold border border-slate-200">{{ $l->category }}</span></td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($l->deadline)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if($l->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-yellow-50 text-yellow-700 border border-yellow-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span> Menunggu
                                        </span>
                                        @elseif($l->status == 'approved')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-200">
                                            Terbit
                                        </span>
                                        @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-red-50 text-red-700 border border-red-200">
                                            Ditolak
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="showLombaDetail({{ $l->id }})" title="Pratinjau Tampilan" class="p-2 bg-slate-100 text-slate-600 rounded-lg hover:bg-blue-600 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                             </button>
                                             <a href="{{ route('penyelenggara.competition.registrants', $l->id) }}" title="Lihat Pendaftar" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition-colors relative">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                                @if($l->registrations_count > 0)
                                                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] flex items-center justify-center rounded-full">{{ $l->registrations_count }}</span>
                                                @endif
                                            </a>
                                            <a href="{{ route('penyelenggara.edit', $l->id) }}" title="Edit Lomba" class="p-2 bg-amber-50 text-amber-500 rounded-lg hover:bg-amber-500 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            <form action="{{ route('penyelenggara.destroy', $l->id) }}" method="POST" onsubmit="return confirm('Hapus lomba ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="px-6 py-8 text-center text-slate-400">Belum ada kompetisi dimuat.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
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

    <!-- Competition Detail Preview Modal -->
    <div id="lombaDetailModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md transition-all duration-300 opacity-0">
        <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform scale-95 transition-all duration-300 relative">
            <button onclick="closeLombaModal()" class="absolute top-6 right-8 p-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-full transition-all z-10 shadow-sm active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/3 p-10 bg-slate-50 flex flex-col items-center">
                    <img id="modalPoster" src="" class="w-full h-[400px] object-cover rounded-3xl shadow-2xl border-4 border-white mb-6 bg-white">
                </div>
                <div class="lg:w-2/3 p-10 lg:pl-0">
                    <div class="px-4">
                        <span id="modalCategory" class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full mb-4 inline-block">Category</span>
                        <h3 id="modalTitle" class="text-4xl font-black text-slate-900 mb-6 tracking-tight leading-none">--</h3>
                        <div class="space-y-4">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Deskripsi Kompetisi</p>
                            <div id="modalDescription" class="prose prose-sm text-slate-600 font-medium leading-relaxed max-h-48 overflow-y-auto pr-4 break-words whitespace-pre-line">--</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

            // We use the admin route since it returns JSON and is accessible
            fetch(`/admin/verifikasi/${id}`)
                .then(response => response.json())
                .then(lomba => {
                    document.getElementById('modalTitle').innerText = lomba.title;
                    document.getElementById('modalDescription').innerText = lomba.description;
                    document.getElementById('modalCategory').innerText = lomba.category;
                    if (lomba.poster) {
                        document.getElementById('modalPoster').src = '/storage/' + lomba.poster;
                    } else {
                        document.getElementById('modalPoster').src = "{{ asset('images/lomba.png') }}";
                    }
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
    </script>
</body>
</html>
