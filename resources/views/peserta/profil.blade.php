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

    <aside class="w-64 bg-white border-r border-slate-200 flex-col justify-between hidden md:flex z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-xl font-bold tracking-tight text-blue-600">LombaPeta</span>
                    <span class="px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold uppercase tracking-wider">Peserta</span>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm">Profil Saya</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm">Keluar</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <h1 class="text-lg font-bold text-slate-800">Profil Peserta</h1>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    <button class="relative text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                    </button>
                    <button class="w-9 h-9 rounded-full bg-blue-600 text-white font-bold text-sm flex items-center justify-center shadow-md shadow-blue-200">
                        BS
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-10 relative">
            <div class="max-w-6xl mx-auto pb-10">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div>
                        <div class="flex items-center gap-4 mb-2">
                            <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Halo Budi Santoso!</h2>
                            <button onclick="toggleModal('editProfileModal')" class="p-2 text-slate-400 hover:text-blue-600 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors tooltip" title="Edit Biodata">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                        </div>
                        <p class="text-slate-500 text-lg">Kelola persiapan lombamu di satu tempat</p>
                    </div>

                    <div class="flex gap-3">
                        <div class="px-5 py-2.5 rounded-full border border-blue-200 bg-blue-50 text-blue-700 font-bold text-sm shadow-sm">
                            3 Lomba Diikuti
                        </div>
                        <div class="px-5 py-2.5 rounded-full border border-orange-200 bg-orange-50 text-orange-600 font-bold text-sm shadow-sm">
                            1 Menang
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="flex justify-between items-end mb-4">
                            <h3 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Lomba Tersimpan
                            </h3>
                            <a href="{{ route('peserta.dashboard') }}" class="text-blue-600 font-bold text-sm hover:underline">Cari Lomba Lagi</a>
                        </div>

                        <div class="bg-white rounded-3xl p-4 flex flex-col sm:flex-row gap-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-full sm:w-48 h-36 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                                <img src="https://placehold.co/400x300/e2e8f0/3b82f6?text=OSN" alt="Olimpiade Sains" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 flex flex-col justify-between py-1">
                                <div>
                                    <div class="flex justify-between items-start gap-4 mb-2">
                                        <h4 class="font-bold text-lg text-slate-900 leading-snug">Olimpiade Sains Nasional (OSN) Tingkat SMA 2026</h4>
                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Aktif</span>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 font-medium">
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            15 Agustus 2026
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-3 mt-4 sm:mt-0">
                                    <a href="{{ route('peserta.detail') }}" class="px-5 py-2 border border-slate-200 text-slate-600 font-bold text-sm rounded-xl hover:bg-slate-50 transition-colors">Detail</a>
                                    <button class="px-5 py-2 bg-blue-600 text-white font-bold text-sm rounded-xl hover:bg-blue-700 transition-colors shadow-sm shadow-blue-200">Kunjungi Link</button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-3xl p-4 flex flex-col sm:flex-row gap-6 border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-full sm:w-48 h-36 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                                <img src="https://placehold.co/400x300/fdf4ff/d946ef?text=Esai" alt="Lomba Esai" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 flex flex-col justify-between py-1">
                                <div>
                                    <div class="flex justify-between items-start gap-4 mb-2">
                                        <h4 class="font-bold text-lg text-slate-900 leading-snug">Lomba Esai Nasional Pemuda Inovatif</h4>
                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Aktif</span>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 font-medium">
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            30 September 2026
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-3 mt-4 sm:mt-0">
                                    <a href="{{ route('peserta.detail') }}" class="px-5 py-2 border border-slate-200 text-slate-600 font-bold text-sm rounded-xl hover:bg-slate-50 transition-colors">Detail</a>
                                    <button class="px-5 py-2 bg-blue-600 text-white font-bold text-sm rounded-xl hover:bg-blue-700 transition-colors shadow-sm shadow-blue-200">Kunjungi Link</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-[#1e3a8a] rounded-3xl p-6 md:p-8 text-white shadow-xl shadow-blue-900/20 sticky top-6">

                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Deadline Terdekat
                            </h3>

                            <div class="space-y-4">
                                <div class="bg-white/10 p-5 rounded-2xl border border-white/20 backdrop-blur-sm">
                                    <p class="text-[11px] text-blue-200 font-bold tracking-wider mb-1.5">5 HARI LAGI</p>
                                    <p class="font-bold text-lg leading-snug">OSN Tingkat SMA 2026</p>
                                </div>
                                <div class="bg-white/10 p-5 rounded-2xl border border-white/20 backdrop-blur-sm">
                                    <p class="text-[11px] text-blue-200 font-bold tracking-wider mb-1.5">12 HARI LAGI</p>
                                    <p class="font-bold text-lg leading-snug">Olimpiade Matematika ITS</p>
                                </div>
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

</body>
</html>
