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

    @include('partials.sidebar_organizer')

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Edit Lomba</h1>
            </div>
            <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                @include('partials.notifications')
                @include('partials.profile_avatar')
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up pb-20">

                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Perbarui Informasi Lomba</h2>
                    <p class="text-slate-500 text-sm mb-6">Ubah detail kompetisi yang telah Anda pasang sebelumnya.</p>

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6">
                        <ul class="list-disc list-inside text-red-600 text-sm font-medium">
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
                    
                    <!-- Section 1: Informasi Dasar -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">1. Informasi Dasar</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Nama Lomba / Kompetisi <span class="text-red-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $competition->title) }}" placeholder="Cth: Olimpiade Sains Nasional 2026" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all font-medium">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Kategori <span class="text-red-500">*</span></label>
                                <select name="category_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none font-medium">
                                    <option value="">Pilih Kategori...</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id', $competition->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Level <span class="text-red-500">*</span></label>
                                <select name="level" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none font-medium">
                                    <option value="">Pilih Level...</option>
                                    <option value="SD" {{ old('level', $competition->level) == 'SD' ? 'selected' : '' }}>SD / Sederajat</option>
                                    <option value="SMP" {{ old('level', $competition->level) == 'SMP' ? 'selected' : '' }}>SMP / Sederajat</option>
                                    <option value="SMA" {{ old('level', $competition->level) == 'SMA' ? 'selected' : '' }}>SMA / Sederajat</option>
                                    <option value="Universitas" {{ old('level', $competition->level) == 'Universitas' ? 'selected' : '' }}>Universitas / Umum</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Tenggat Pendaftaran <span class="text-red-500">*</span></label>
                                <input type="date" name="deadline" value="{{ old('deadline', \Carbon\Carbon::parse($competition->deadline)->format('Y-m-d')) }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all text-slate-600 font-medium">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Biaya Pendaftaran</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500 font-bold">Rp</span>
                                    <input type="number" name="registration_fee" value="{{ old('registration_fee', $competition->registration_fee) }}" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all font-bold">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Lokasi / Kota Penyelenggara <span class="text-red-500">*</span></label>
                                <input type="text" name="location" value="{{ old('location', $competition->location) }}" placeholder="Cth: Makassar / Online" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all font-medium">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Model Lomba <span class="text-red-500">*</span></label>
                                <select name="competition_model" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none font-medium">
                                    <option value="individu" {{ old('competition_model', $competition->competition_model) == 'individu' ? 'selected' : '' }}>Individu (Perorangan)</option>
                                    <option value="tim" {{ old('competition_model', $competition->competition_model) == 'tim' ? 'selected' : '' }}>Tim (Kelompok)</option>
                                    <option value="individu_tim" {{ old('competition_model', $competition->competition_model) == 'individu_tim' ? 'selected' : '' }}>Individu / Tim (Keduanya)</option>
                                </select>
                            </div>
                            <input type="hidden" name="credibility_score" value="{{ $competition->credibility_score }}">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Poster / Banner Lomba</label>
                            <div class="flex items-start gap-4 mb-3">
                                <div class="w-32 h-32 rounded-2xl overflow-hidden border border-slate-200 shadow-sm shrink-0">
                                    @if($competition->poster && Storage::disk('public')->exists($competition->poster))
                                        <img src="{{ asset('storage/' . $competition->poster) }}" alt="Poster Existing" class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/lomba.png') }}" alt="Poster Default" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="poster" id="poster-input" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm" onchange="previewPoster(event)">
                                    <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-wider">Kosongkan jika tidak ingin mengubah poster • Format: JPG, PNG • Max 2MB</p>
                                </div>
                            </div>
                            <div id="poster-preview-wrap" class="mt-4 hidden animate-fade-in">
                                <p class="text-xs text-slate-500 mb-2 font-black uppercase tracking-widest">Baru:</p>
                                <img id="poster-preview" src="" class="max-h-48 rounded-2xl border border-slate-200 object-cover shadow-xl">
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Detail Identitas Tambahan -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-3">
                            <h3 class="text-lg font-bold text-slate-800">2. Informasi Tambahan Peserta</h3>
                            <button type="button" onclick="addAdditionalField()" class="text-xs font-black text-blue-600 uppercase tracking-widest bg-blue-50 px-3 py-1.5 rounded-lg hover:bg-blue-600 hover:text-white transition-all">+ Tambah Field</button>
                        </div>
                        <p class="text-xs text-slate-400 mb-6 leading-relaxed">Gunakan fitur ini jika Anda memerlukan informasi khusus dari peserta selain nama dan email (Misal: NISN, Nama Sekolah, No. Kartu Pelajar, atau Akun Media Sosial).</p>
                        
                        <div id="additional-fields-container" class="space-y-4">
                            @if($competition->additional_fields)
                                @foreach($competition->additional_fields as $field)
                                <div class="flex gap-2 items-center animate-fade-in">
                                    <input type="text" name="additional_fields[]" value="{{ $field }}" placeholder="Label Field (Cth: Nama Sekolah / ID Game)" class="flex-1 px-4 py-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:bg-white focus:border-blue-400 outline-none transition-all font-medium">
                                    <button type="button" onclick="this.parentElement.remove()" class="p-3 text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Section 3: Deskripsi Lengkap & Panduan -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm ring-2 ring-blue-50/50">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3 flex items-center gap-2">
                             <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                             3. Deskripsi Lengkap & Panduan <span class="text-red-500">*</span>
                        </h3>
                        <div class="space-y-6">
                            <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100 mb-4">
                                <p class="text-[11px] text-blue-700 font-bold leading-relaxed">
                                    <span class="bg-blue-600 text-white px-1.5 py-0.5 rounded mr-1">TIPS</span> Gunakan <strong>Enter</strong> untuk membuat paragraf baru agar tampilan rapi bagi peserta.
                                </p>
                            </div>
                            <div>
                                <textarea name="description" rows="12" placeholder="Tuliskan peraturan, jadwal, kategori juara, dan informasi penting lainnya di sini..." class="w-full px-5 py-4 rounded-2xl border-2 border-slate-200 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-400 bg-white transition-all shadow-sm font-medium text-slate-700 leading-relaxed">{{ old('description', $competition->description) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Link Guidebook / Panduan (Opsional)</label>
                                <input type="url" name="guidebook_link" value="{{ old('guidebook_link', $competition->guidebook_link) }}" placeholder="https://drive.google.com/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all font-medium">
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Kontak & Pembayaran -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">4. Kontak & Pembayaran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">WhatsApp Panitia (No. HP) <span class="text-red-500">*</span></label>
                                <input type="text" name="contact_info" value="{{ old('contact_info', $competition->contact_info) }}" placeholder="0812..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all font-bold">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">QR Code Pembayaran (Opsional)</label>
                                <div class="flex items-center gap-4">
                                    <div class="w-24 h-24 rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 flex items-center justify-center p-2 shrink-0">
                                        @if($competition->payment_qr_code && Storage::disk('public')->exists($competition->payment_qr_code))
                                            <img src="{{ asset('storage/' . $competition->payment_qr_code) }}" alt="QR Code Existing" class="w-full h-full object-contain">
                                        @else
                                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h2M4 8h12"></path></svg>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="payment_qr_code" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-xs">
                                        <p class="text-[9px] text-slate-400 mt-2 font-bold uppercase tracking-wider">Update QR Code Pembayaran jika diperlukan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-6 pb-20" x-data="{ loading: false }">
                        <a href="{{ route('penyelenggara.index') }}" class="px-6 py-4 rounded-2xl font-black text-xs uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">Batal</a>
                        <button type="submit" @click="loading = true" class="px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.1em] bg-blue-600 text-white shadow-xl shadow-blue-100 hover:bg-blue-700 transition-all flex items-center justify-center gap-3 min-w-[220px]">
                            <template x-if="!loading">
                                <div class="flex items-center gap-2">
                                    <span>Simpan Perubahan</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </template>
                            <template x-if="loading">
                                <div class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Menyimpan...</span>
                                </div>
                            </template>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

<script>
    function previewPoster(event) {
        const file = event.target.files[0];
        if (!file) return;
        const wrap = document.getElementById('poster-preview-wrap');
        const img  = document.getElementById('poster-preview');
        img.src = URL.createObjectURL(file);
        wrap.classList.remove('hidden');
    }

    function addAdditionalField() {
        const container = document.getElementById('additional-fields-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2 items-center animate-fade-in';
        div.innerHTML = `
            <input type="text" name="additional_fields[]" placeholder="Label Field (Cth: Nama Sekolah / ID Game)" class="flex-1 px-4 py-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:bg-white focus:border-blue-400 outline-none transition-all font-medium">
            <button type="button" onclick="this.parentElement.remove()" class="p-3 text-red-500 hover:bg-red-50 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        `;
        container.appendChild(div);
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            const computedDisplay = window.getComputedStyle(sidebar).display;
            if (computedDisplay === "none" || computedDisplay === "") {
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
