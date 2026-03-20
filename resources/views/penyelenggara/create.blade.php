<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasang Info Lomba - Penyelenggara</title>
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

    <aside class="w-64 bg-white border-r border-slate-200 flex-col justify-between hidden md:flex z-20">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="#" class="flex items-center gap-2">
                    <span class="text-xl font-bold tracking-tight text-blue-600">LombaPeta</span>
                    <span class="px-2 py-0.5 rounded-full bg-green-50 text-green-600 text-[10px] font-bold uppercase tracking-wider border border-green-100">Penyelenggara</span>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('penyelenggara.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm">Dashboard</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="text-sm">Pasang Info Lomba</span>
                </a>

                <a href="{{ route('penyelenggara.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="text-sm">Lomba Saya</span>
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <button class="flex w-full items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm">Keluar</span>
            </button>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <h1 class="text-lg font-bold text-slate-800">Formulir Lomba</h1>
            <div class="flex items-center gap-4">
                <button class="w-9 h-9 rounded-full bg-green-100 text-green-700 font-bold text-sm flex items-center justify-center border border-green-200">PY</button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-4xl mx-auto space-y-6">

                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Pasang Informasi Lomba</h2>
                    <p class="text-slate-500 text-sm mb-6">Lengkapi detail kompetisi Anda untuk menjangkau ribuan pelajar di seluruh Indonesia.</p>

                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 flex gap-4 items-start">
                        <svg class="w-6 h-6 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">Proses Verifikasi Ketat</h4>
                            <p class="text-blue-700 text-xs mt-1 leading-relaxed">Demi keamanan peserta, tim LombaPeta akan melakukan verifikasi manual terhadap institusi dan keabsahan lomba Anda dalam 1x24 jam sebelum diterbitkan.</p>
                        </div>
                    </div>
                </div>

                <form action="#" method="POST" class="space-y-6">

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">1. Informasi Dasar</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Nama Lomba / Kompetisi <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Cth: Olimpiade Sains Nasional 2026" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Kategori <span class="text-red-500">*</span></label>
                                <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all appearance-none">
                                    <option value="">Pilih Kategori...</option>
                                    <option value="sains">Sains & Matematika</option>
                                    <option value="seni">Seni & Sastra</option>
                                    <option value="olahraga">Olahraga</option>
                                    <option value="teknologi">Teknologi & Robotik</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Tenggat Pendaftaran <span class="text-red-500">*</span></label>
                                <input type="date" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all text-slate-600">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Biaya Pendaftaran</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                                    <input type="number" placeholder="0 (Kosongkan jika gratis)" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                                </div>
                            </div>

                           <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Penyelenggara Institusi <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Cth: BEM Universitas Hasanuddin" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                        </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Poster / Banner Lomba <span class="text-red-500">*</span></label>
                            <div class="border-2 border-dashed border-slate-300 rounded-2xl p-10 flex flex-col items-center justify-center text-center hover:bg-slate-50 hover:border-blue-400 transition-colors cursor-pointer group">
                                <svg class="w-12 h-12 mb-4 text-slate-300 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="text-sm font-bold text-slate-700">Klik untuk unggah atau seret file ke sini</p>
                                <p class="text-xs text-slate-500 mt-2">PNG, JPG, JPEG (Maks. 5MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">2. Detail & Transparansi</h3>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Link Resmi / Guidebook (Buku Panduan) <span class="text-red-500">*</span></label>
                                <input type="url" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                                <p class="text-[11px] text-slate-400 mt-1.5">Wajib dilampirkan agar admin dapat memverifikasi keabsahan lomba.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Deskripsi Singkat</label>
                                <textarea rows="4" placeholder="Jelaskan secara singkat mengenai lomba ini..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 border-b border-slate-100 pb-3">3. Kontak & Pendaftaran</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">WhatsApp Panitia (Opsional)</label>
                                <input type="text" placeholder="0812..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2 text-slate-700">Link Formulir Pendaftaran <span class="text-red-500">*</span></label>
                                <input type="url" placeholder="https://forms.gle/..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-slate-50 focus:bg-white transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 pb-12">
                        <button type="button" class="px-6 py-3.5 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors">Batal</button>
                        <button type="submit" class="px-8 py-3.5 rounded-xl font-bold bg-blue-600 text-white shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all flex items-center gap-2">
                            Kirim untuk Verifikasi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>
</html>
