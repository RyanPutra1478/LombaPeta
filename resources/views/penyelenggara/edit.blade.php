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
                                <select name="category_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none">
                                    <option value="">Pilih Kategori...</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id', $competition->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
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
                                    <option value="individu_tim" {{ old('competition_model', $competition->competition_model) == 'individu_tim' ? 'selected' : '' }}>Individu / Tim (Keduanya)</option>
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
                            <input type="file" name="poster" id="poster-input" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50" onchange="previewPoster(event)">
                            <div id="poster-preview-wrap" class="mt-3 hidden">
                                <p class="text-xs text-slate-500 mb-1 font-medium">Preview Poster Baru:</p>
                                <img id="poster-preview" src="" class="max-h-48 rounded-xl border border-slate-200 object-cover shadow">
                            </div>

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

                            @if($competition->additional_fields)
                                @foreach($competition->additional_fields as $field)
                                <div class="flex gap-2 items-center animate-fade-in">
                                    <input type="text" name="additional_fields[]" value="{{ $field }}" placeholder="Label Field (Cth: Nama Sekolah / ID Game)" class="flex-1 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:bg-white focus:border-blue-400 outline-none transition-all">
                                    <button type="button" onclick="this.parentElement.remove()" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">4. Kontak & Pembayaran</h3>
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

                    <div class="flex items-center justify-end gap-4 pt-4 pb-12" x-data="{ loading: false }">
                        <a href="{{ route('penyelenggara.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors">Batal</a>
                        <button type="submit" @click="loading = true" class="px-8 py-3.5 rounded-xl font-bold bg-blue-600 text-white shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all flex items-center justify-center gap-2 min-w-[200px]">
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
        const count = container.children.length;
        const div = document.createElement('div');
        div.className = 'flex gap-2 items-center animate-fade-in';
        div.innerHTML = `
            <input type="text" name="additional_fields[]" placeholder="Label Field (Cth: Nama Sekolah / ID Game)" class="flex-1 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:bg-white focus:border-blue-400 outline-none transition-all">
            <button type="button" onclick="this.parentElement.remove()" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
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

