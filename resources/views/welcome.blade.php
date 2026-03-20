<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LombaPeta - Temukan Lomba Terbaikmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold italic">L</div>
                    <span class="text-xl font-bold tracking-tight text-blue-900">LombaPeta</span>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                    <a href="#lomba" class="hover:text-blue-600 transition">Cari Lomba</a>
                    <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                    <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
                </div>
             <div class="flex items-center gap-4">
                <a href="{{ route('auth') }}" class="bg-blue-600 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-200">Masuk</a>
            </div>
            </div>
        </div>
    </nav>

    <section class="py-16 md:py-0 overflow-hidden min-h-[calc(100vh-5rem)] flex items-center">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="grid md:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider">
                        <span>🚀 Temukan Bakatmu di Sini</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-[4rem] font-extrabold leading-tight">
                        Raih Prestasimu, <span class="text-blue-600 block mt-2">Temukan Lomba</span> Terbaik Untukmu
                    </h1>
                    <p class="text-lg text-slate-500 leading-relaxed max-w-lg">
                        LombaPeta membantu siswa SMP dan SMA di seluruh Indonesia menemukan kompetisi berkualitas yang relevan dengan minat dan bakat mereka.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition shadow-xl shadow-blue-200">Temukan Sekarang</button>
                        <button class="border border-slate-200 text-slate-600 px-8 py-4 rounded-xl font-bold hover:bg-slate-50 transition">Pasang Lomba</button>
                    </div>
                </div>
                <div class="relative w-full flex justify-end">
                    <img src="https://placehold.co/800x600/f1f5f9/3b82f6?text=Ilustrasi+Siswa" alt="Ilustrasi" class="w-full max-w-2xl h-auto rounded-2xl shadow-sm border border-slate-100">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50/50" id="tentang">
        <div class="max-w-[1440px] w-[92%] mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Bagaimana LombaPeta Bekerja?</h2>
            <p class="text-slate-500 mb-16">Hanya butuh 3 langkah sederhana untuk memulai perjalananmu.</p>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">🔍</div>
                    <h3 class="font-bold text-lg mb-3">1. Jelajahi Kategori</h3>
                    <p class="text-sm text-slate-500">Pilih lomba berdasarkan bidangmu, baik MIPA, Seni, Olahraga, maupun teknologi.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-6">✅</div>
                    <h3 class="font-bold text-lg mb-3">2. Cek Kredibilitas</h3>
                    <p class="text-sm text-slate-500">Periksa detail penyelenggara dan tingkat kredibilitas dari setiap lomba yang ingin kamu ikuti.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center mb-6">🏆</div>
                    <h3 class="font-bold text-lg mb-3">3. Daftar & Menang</h3>
                    <p class="text-sm text-slate-500">Dapatkan link pendaftaran resmi dan mulailah berjuang menjadi pemenang.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-[1440px] w-[92%] mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-6">Mengapa LombaPeta?</h2>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-bold text-blue-600 mb-1">Mudah dioperasikan</h4>
                        <p class="text-slate-500 text-sm">UI/UX yang simpel memudahkan dari pencarian hingga pendaftaran lomba.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-600 mb-1">Terverifikasi</h4>
                        <p class="text-slate-500 text-sm">Hanya lomba dari institusi terpercaya yang kami tampilkan demi keamanan peserta.</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-2xl shadow-slate-200 border border-slate-100">
                <h3 class="text-xl font-bold text-center mb-8">Peran Pengguna</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-6 rounded-2xl bg-blue-50 text-center border border-blue-100">
                        <span class="block font-bold text-blue-900">Pelajar</span>
                        <span class="text-[10px] text-blue-600 uppercase font-bold tracking-widest">Cari & Ikuti Lomba</span>
                    </div>
                    <div class="p-6 rounded-2xl bg-green-50 text-center border border-green-100">
                        <span class="block font-bold text-green-900">Penyelenggara</span>
                        <span class="text-[10px] text-green-600 uppercase font-bold tracking-widest">Pasang Lomba</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50/50">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="flex justify-between items-end mb-12">
                <div id="lomba">
                    <h2 class="text-3xl font-bold mb-2">Lomba Pilihan Minggu Ini</h2>
                    <p class="text-slate-500">Lomba paling diminati dengan pendaftaran hingga saat ini.</p>
                </div>
                <a href="#" class="text-blue-600 font-bold text-sm hover:underline">Lihat Semua Lomba →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm group hover:shadow-xl transition-all duration-300">
                    <div class="h-48 bg-slate-200 relative">
                        <img src="https://placehold.co/400x300/3b82f6/white?text=Olimpiade+Sains" alt="Thumbnail" class="w-full h-full object-cover">
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="px-2 py-1 bg-white/90 backdrop-blur rounded text-[10px] font-bold">MIPA</span>
                            <span class="px-2 py-1 bg-blue-600 text-white rounded text-[10px] font-bold">SMA</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-slate-900 mb-3 line-clamp-2">Olimpiade Sains Nasional (OSN) Tingkat SMA 2026</h3>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-xs text-slate-400 gap-2">
                                📍 <span>Kementrian Pendidikan dan Kebudayaan RI</span>
                            </div>
                            <div class="flex items-center text-xs text-slate-400 gap-2">
                                📅 <span>30 Januari 2026</span>
                            </div>
                        </div>
                        <button class="w-full py-2.5 rounded-lg bg-blue-50 text-blue-600 text-sm font-bold group-hover:bg-blue-600 group-hover:text-white transition">Lihat Detail</button>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-[1440px] w-[92%] mx-auto grid md:grid-cols-2 gap-16 items-center bg-white">
            <div id="kontak">
                <h2 class="text-4xl font-extrabold mb-4 italic text-blue-900">Hubungi Kami</h2>
                <p class="text-slate-500 mb-8">Punya pertanyaan atau ingin bekerja sama? Tim kami siap membantu.</p>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-bold text-sm uppercase text-slate-400 tracking-widest">Email Support</h4>
                        <p class="text-blue-600 font-medium">hello@lombapeta.co.id</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm uppercase text-slate-400 tracking-widest">Pertanyaan Umum (FAQ)</h4>
                        <p class="text-slate-500 text-sm">Bagaimana cara verifikasi lomba saya? <br> Apakah ada biaya pendaftaran?</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-2xl border border-slate-50">
                <form action="#" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-700">Nama</label>
                        <input type="text" placeholder="Nama Anda" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-700">Email</label>
                        <input type="email" placeholder="email@anda.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-700">Pesan</label>
                        <textarea rows="4" placeholder="Apa yang ingin Anda tanyakan?" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition"></textarea>
                    </div>
                    <button class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-slate-50 pt-20 pb-10 border-t border-slate-200">
        <div class="max-w-[1440px] w-[92%] mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-6 h-6 bg-blue-600 rounded flex items-center justify-center text-white font-bold italic text-xs">L</div>
                    <span class="text-lg font-bold text-blue-900">LombaPeta</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Platform pencari lomba nomor satu di Indonesia bagi siswa untuk mengembangkan potensi diri.</p>
            </div>
            <div>
                <h5 class="font-bold text-sm mb-6 uppercase tracking-widest text-slate-400">Navigasi</h5>
                <ul class="text-sm space-y-4 text-slate-600">
                    <li><a href="#" class="hover:text-blue-600">Beranda</a></li>
                    <li><a href="#" class="hover:text-blue-600">Cari Lomba</a></li>
                    <li><a href="#" class="hover:text-blue-600">Tentang Kami</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold text-sm mb-6 uppercase tracking-widest text-slate-400">Kontak</h5>
                <ul class="text-sm space-y-4 text-slate-600 italic">
                    <li>Jl. Boulevard Raya No. 1, Makassar, Sulawesi Selatan</li>
                    <li>+62 812-3456-7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-[1440px] w-[92%] mx-auto pt-10 border-t border-slate-200 flex justify-between items-center text-[10px] text-slate-400 font-bold uppercase tracking-widest">
            <p>© 2026 LombaPeta. Hak cipta dilindungi.</p>
            <div class="flex gap-6">
                <a href="#">Privasi & Kebijakan</a>
                <a href="#">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

</body>
</html>
