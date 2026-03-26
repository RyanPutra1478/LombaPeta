<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Peserta</title>
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

    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
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
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm sidebar-text">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm sidebar-text">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Profil Peserta</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    <button class="w-9 h-9 rounded-full bg-blue-600 text-white font-bold text-sm flex items-center justify-center shadow-md shadow-blue-200" hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-blue-100 >
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-10 relative">
            <div class="max-w-6xl mx-auto pb-10 animate-fade-in-up">
                
                @if(session('status'))
                <div class="mb-6 p-4 bg-blue-100 text-blue-700 rounded-2xl border border-blue-200 font-bold">
                    {{ session('status') == 'bookmarked' ? 'Lomba berhasil disimpan!' : 'Lomba dihapus dari simpanan.' }}
                </div>
                @endif

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div>
                        <div class="flex items-center gap-4 mb-2">
                            <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Halo {{ auth()->user()->name }}!</h2>
                        </div>
                        <p class="text-slate-500 text-lg">Kelola persiapan lombamu di satu tempat</p>
                    </div>

                    <div class="flex gap-3">
                        <div class="px-5 py-2.5 rounded-full border border-blue-200 bg-blue-50 text-blue-700 font-bold text-sm shadow-sm">
                            {{ $registrations->count() }} Lomba Diikuti
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-12">
                        
                        <!-- Lomba Diikuti -->
                        <section>
                            <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-2 mb-6">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Sedang Diikuti
                            </h3>
                            @forelse($registrations as $r)
                            <div class="bg-white rounded-3xl p-4 flex flex-col sm:flex-row gap-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow mb-4">
                                <div class="w-full sm:w-48 h-36 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                                    @if($r->competition->poster)
                                    <img src="{{ asset('storage/' . $r->competition->poster) }}" alt="Poster" class="w-full h-full object-cover">
                                    @else
                                    <img src="{{ asset('images/lomba.png') }}" alt="Poster Default" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                    <div class="flex-1 flex flex-col justify-between py-1">
                                    <div>
                                        <div class="flex justify-between items-start gap-4 mb-2">
                                            <h4 class="font-bold text-lg text-slate-900 leading-snug tracking-tight">{{ $r->competition->title }}</h4>
                                            @if($r->status == 'approved')
                                                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-black rounded-full uppercase tracking-widest border border-emerald-200 shadow-sm">Verified</span>
                                            @elseif($r->status == 'pending')
                                                <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-black rounded-full uppercase tracking-widest border border-slate-200">Pending</span>
                                            @else
                                                <span class="px-3 py-1 bg-red-100 text-red-700 text-[10px] font-black rounded-full uppercase tracking-widest border border-red-200">Rejected</span>
                                            @endif
                                        </div>
                                        <div class="text-[11px] text-slate-400 font-bold uppercase tracking-tighter">Terdaftar pada: {{ $r->created_at->format('d M Y') }}</div>
                                    </div>
                                    <div class="flex items-center gap-2 mt-4 sm:mt-0">
                                        <a href="{{ route('peserta.detail', $r->competition_id) }}" class="px-5 py-2.5 border-2 border-slate-100 text-slate-600 font-black text-xs rounded-2xl hover:bg-slate-50 hover:border-slate-200 transition-all active:scale-95">Detail</a>
                                        
                                        @if($r->status == 'approved')
                                            <a href="{{ $r->group_link ?? '#' }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white font-black text-xs rounded-2xl shadow-lg shadow-green-100 hover:bg-[#20bd5c] hover:-translate-y-0.5 transition-all active:scale-95">
                                                <img src="{{ asset('images/whatsapp.png') }}" class="w-4 h-4 object-contain" alt="WhatsApp">
                                                Group Lomba
                                            </a>
                                        @elseif($r->status == 'pending')
                                            <div class="px-5 py-2.5 bg-slate-100 text-slate-400 font-black text-xs rounded-2xl border border-slate-200 shadow-inner flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Tunggu Disetujui
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            @include('partials.empty_state', [
                                'title' => 'Belum Ada Lomba Diikuti',
                                'message' => 'Cari lomba favoritmu dan daftar segera untuk menambah pengalaman!',
                                'action_url' => route('peserta.dashboard'),
                                'action_text' => 'Cari Lomba'
                            ])

                            @endforelse
                        </section>

                        <!-- Lomba Tersimpan -->
                        <section>
                            <div class="flex justify-between items-end mb-6">
                                <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                    Lomba Tersimpan
                                </h3>
                                <a href="{{ route('peserta.dashboard') }}" class="text-blue-600 font-bold text-sm hover:underline">Cari Lomba Lagi</a>
                            </div>

                            @forelse($bookmarks as $b)
                            <div class="bg-white rounded-3xl p-4 flex flex-col sm:flex-row gap-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow mb-4">
                                <div class="w-full sm:w-48 h-36 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                                    @if($b->competition->poster)
                                    <img src="{{ asset('storage/' . $b->competition->poster) }}" alt="Poster" class="w-full h-full object-cover">
                                    @else
                                    <img src="{{ asset('images/lomba.png') }}" alt="Poster Default" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1 flex flex-col justify-between py-1">
                                    <div>
                                        <div class="flex justify-between items-start gap-4 mb-2">
                                            <h4 class="font-bold text-lg text-slate-900 leading-snug">{{ $b->competition->title }}</h4>
                                            <form action="{{ route('peserta.bookmark.toggle', $b->competition_id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 font-medium">
                                            <div class="flex items-center gap-1.5">
                                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                Deadline: {{ \Carbon\Carbon::parse($b->competition->deadline)->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-3 mt-4 sm:mt-0">
                                        <a href="{{ route('peserta.detail', $b->competition_id) }}" class="px-5 py-2 border border-slate-200 text-slate-600 font-bold text-sm rounded-xl hover:bg-slate-50 transition-colors">Detail</a>
                                        <a href="{{ route('peserta.pendaftaran', $b->competition_id) }}" class="px-5 py-2 bg-blue-600 text-white font-bold text-sm rounded-xl hover:bg-blue-700 transition-colors shadow-sm shadow-blue-200">Daftar</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @include('partials.empty_state', [
                                'title' => 'Simpanan Masih Kosong',
                                'message' => 'Simpan lomba yang menarik minatmu agar tidak lupa deadline pendaftaran.',
                                'action_url' => route('peserta.dashboard'),
                                'action_text' => 'Eksplor Lomba'
                            ])

                            @endforelse
                        </section>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-[#1e3a8a] rounded-3xl p-6 md:p-8 text-white shadow-xl shadow-blue-900/20 sticky top-6">

                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Deadline Terdekat
                            </h3>

                            <div class="space-y-4">
                                @forelse($registrations->take(3) as $r)
                                <div class="bg-white/10 p-5 rounded-2xl border border-white/20 backdrop-blur-sm">
                                    <p class="text-[11px] text-blue-200 font-bold tracking-wider mb-1.5 uppercase">
                                        {{ \Carbon\Carbon::parse($r->competition->deadline)->diffForHumans() }}
                                    </p>
                                    <p class="font-bold text-lg leading-snug">{{ $r->competition->title }}</p>
                                </div>
                                @empty
                                <p class="text-blue-200 text-sm italic">Oleh pendaftar, data deadline akan tampil di sini.</p>
                                @endforelse
                            </div>

                            <a href="{{ route('peserta.kalender') }}" class="block text-center w-full mt-6 py-3.5 border border-white/30 rounded-xl hover:bg-white/10 font-bold text-sm transition-colors">
                                Lihat Kalender
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

                </div>
            </div>
        </main>
    </div>

    <div id="editProfileModal" class="fixed inset-0 z-50 bg-slate-900/60 hidden items-center justify-center backdrop-blur-sm transition-opacity px-4">
        <div class="bg-white rounded-3xl w-full max-w-xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

            <div class="flex justify-between items-center p-6 md:p-8 border-b border-slate-100 shrink-0">
                <h2 class="text-2xl font-bold text-slate-900">Edit Biodata</h2>
                <button onclick="toggleModal('editProfileModal')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-6 md:p-8 overflow-y-auto">
                <form action="#" method="POST" id="formEditProfile" class="space-y-6">

                    <div class="flex items-center gap-5 mb-2">
                        <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-2xl shadow-inner border border-blue-200">
                            BS
                        </div>
                        <div class="space-y-2">
                            <button type="button" class="px-4 py-2 bg-blue-50 text-blue-600 text-sm font-semibold rounded-lg border border-blue-200 hover:bg-blue-600 hover:text-white transition">Ubah Foto</button>
                            <p class="text-[11px] text-slate-400">JPG/PNG maks. 2MB</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Nama Lengkap</label>
                            <input type="text" value="Budi Santoso" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Email Utama</label>
                            <input type="email" value="budi.santoso@email.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Nomor Telepon</label>
                            <input type="text" value="081234567890" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Asal Sekolah / Instansi</label>
                            <input type="text" value="SMAN 1 Jakarta" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Bio Singkat</label>
                            <textarea rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">Siswa SMA yang menyukai sains dan pemrograman.</textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-6 md:p-8 border-t border-slate-100 bg-slate-50 shrink-0 flex justify-end gap-3 rounded-b-3xl">
                <button type="button" onclick="toggleModal('editProfileModal')" class="px-6 py-3 rounded-xl font-bold text-slate-500 bg-white border border-slate-200 hover:bg-slate-100 transition-colors">Batal</button>
                <button type="button" onclick="toggleModal('editProfileModal')" class="px-6 py-3 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 shadow-md shadow-blue-200 transition-all">Simpan Perubahan</button>
            </div>

        </div>
    </div>

    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);

            // Logika sederhana: jika ada class hidden, hapus hidden dan tambah flex
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                // Optional: mencegah body bisa discroll saat modal terbuka
                document.body.style.overflow = 'hidden';
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }
    </script>


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
