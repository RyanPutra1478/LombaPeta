<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info Lomba - Penyelenggara</title>
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
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Edit Lomba</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="w-9 h-9 rounded-full bg-green-100 text-green-700 font-bold text-sm flex items-center justify-center border border-green-200">{{ substr(auth()->user()->name, 0, 1) }}</button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up">

                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Perbarui Informasi Lomba</h2>
                    <p class="text-slate-500 text-sm mb-6">Ubah detail kompetisi yang telah Anda pasang sebelumnya.</p>

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6">
                        <ul class="list-disc list-inside text-red-600 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <form action="{{ route('penyelenggara.update', $competition->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">1. Informasi Dasar</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Nama Lomba / Kompetisi <span class="text-red-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $competition->title) }}" placeholder="Cth: Olimpiade Sains Nasional 2026" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Kategori <span class="text-red-500">*</span></label>
                                <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none">
                                    <option value="">Pilih Kategori...</option>
                                    <option value="Sains" {{ old('category', $competition->category) == 'Sains' ? 'selected' : '' }}>Sains & Matematika</option>
                                    <option value="Seni" {{ old('category', $competition->category) == 'Seni' ? 'selected' : '' }}>Seni & Sastra</option>
                                    <option value="Olahraga" {{ old('category', $competition->category) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                    <option value="Teknologi" {{ old('category', $competition->category) == 'Teknologi' ? 'selected' : '' }}>Teknologi & Robotik</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Level <span class="text-red-500">*</span></label>
                                <select name="level" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none">
                                    <option value="">Pilih Level...</option>
                                    <option value="SD" {{ old('level', $competition->level) == 'SD' ? 'selected' : '' }}>SD / Sederajat</option>
                                    <option value="SMP" {{ old('level', $competition->level) == 'SMP' ? 'selected' : '' }}>SMP / Sederajat</option>
                                    <option value="SMA" {{ old('level', $competition->level) == 'SMA' ? 'selected' : '' }}>SMA / Sederajat</option>
                                    <option value="Universitas" {{ old('level', $competition->level) == 'Universitas' ? 'selected' : '' }}>Universitas / Umum</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Tenggat Pendaftaran <span class="text-red-500">*</span></label>
                                <input type="date" name="deadline" value="{{ old('deadline', \Carbon\Carbon::parse($competition->deadline)->format('Y-m-d')) }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all text-slate-600">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Biaya Pendaftaran</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                                    <input type="number" name="registration_fee" value="{{ old('registration_fee', $competition->registration_fee) }}" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                                </div>
                            </div>

                           <div>
                             <label class="block text-sm font-semibold mb-2 text-slate-700">Lokasi / Kota Penyelenggara <span class="text-red-500">*</span></label>
                             <input type="text" name="location" value="{{ old('location', $competition->location) }}" placeholder="Cth: Makassar / Online" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                           </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Model Lomba <span class="text-red-500">*</span></label>
                                <select name="competition_model" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none">
                                    <option value="individu" {{ old('competition_model', $competition->competition_model) == 'individu' ? 'selected' : '' }}>Individu (Perorangan)</option>
                                    <option value="tim" {{ old('competition_model', $competition->competition_model) == 'tim' ? 'selected' : '' }}>Tim (Kelompok)</option>
                                </select>
                            </div>

                           <input type="hidden" name="credibility_score" value="{{ $competition->credibility_score }}">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Poster / Banner Lomba</label>
                            @if($competition->poster)
                            <div class="mb-3 w-40 h-40 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                                <img src="{{ asset('storage/' . $competition->poster) }}" alt="Poster Existing" class="w-full h-full object-cover">
                            </div>
                            @else
                            <div class="mb-3 w-40 h-40 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                                <img src="{{ asset('images/lomba.png') }}" alt="Poster Default" class="w-full h-full object-cover">
                            </div>
                            @endif
                            <input type="file" name="poster" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50">
                            <p class="text-[10px] text-slate-400 mt-1">Kosongkan jika tidak ingin mengubah poster.</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">2. Detail Lomba</h3>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Deskripsi Singkat <span class="text-red-500">*</span></label>
                                <textarea name="description" rows="8" placeholder="Jelaskan detail kompetisi di sini secara mendalam..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all shadow-inner font-medium">{{ old('description', $competition->description) }}</textarea><p class="text-[10px] text-slate-400 mt-2 font-medium italic">* Gunakan Enter untuk baris baru agar tampilan deskripsi rapi bagi peserta.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Link Guidebook / Panduan (Opsional)</label>
                                <input type="url" name="guidebook_link" value="{{ old('guidebook_link', $competition->guidebook_link) }}" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">3. Kontak & Pembayaran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">WhatsApp Panitia <span class="text-red-500">*</span></label>
                                <input type="text" name="contact_info" value="{{ old('contact_info', $competition->contact_info) }}" placeholder="0812..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">QR Code Pembayaran (Opsional)</label>
                                @if($competition->payment_qr_code)
                                <div class="mb-3 w-40 h-40 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                                    <img src="{{ asset('storage/' . $competition->payment_qr_code) }}" alt="QR Code Existing" class="w-full h-full object-cover">
                                </div>
                                @endif
                                <input type="file" name="payment_qr_code" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 pb-12">
                        <a href="{{ route('penyelenggara.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors">Batal</a>
                        <button type="submit" class="px-8 py-3.5 rounded-xl font-bold bg-blue-600 text-white shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all flex items-center gap-2">
                            Simpan Perubahan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </form>
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
