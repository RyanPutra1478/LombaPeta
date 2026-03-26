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

    <nav class="fixed top-0 left-0 w-full z-50 glass-nav border-b border-slate-100/50">


        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <span class="text-xl font-bold tracking-tight text-blue-900">LombaPeta</span>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                    <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                    <a href="#lomba" class="hover:text-blue-600 transition">Cari Lomba</a>
                    <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
                </div>
             <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-200">Masuk</a>
            </div>
            </div>
        </div>
    </nav>

    <section class="pt-32 pb-16 overflow-hidden min-h-[calc(100vh-5rem)] flex items-center">


        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="grid md:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div class="space-y-8 animate-fade-in-right">
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
                        <a href="#lomba" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition shadow-xl shadow-blue-200 hover:-translate-y-1 inline-block">Temukan Sekarang</a>
                        <a href="{{ route('login') }}" class="border border-slate-200 text-slate-600 px-8 py-4 rounded-xl font-bold hover:bg-slate-50 transition hover:-translate-y-1 inline-block">Pasang Lomba</a>
                    </div>
                </div>
                <div class="relative w-full flex justify-end animate-fade-in-up">
                    <img src="{{ asset('images/foto utama.png') }}" alt="Ilustrasi" class="w-full max-w-2xl h-auto transition-transform duration-700 hover:scale-[1.05]">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50 border-y border-slate-100" id="tentang">
        <div class="max-w-[1440px] w-[92%] mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Bagaimana LombaPeta Bekerja?</h2>
            <p class="text-slate-500 mb-16">Hanya butuh 3 langkah sederhana untuk memulai perjalananmu.</p>
            <div class="grid md:grid-cols-3 gap-10 text-left">
                <div class="group">
                    <div class="w-14 h-14 bg-blue-100/50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-800">1. Jelajahi Kategori</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">Pilih lomba berdasarkan bidangmu, baik MIPA, Seni, Olahraga, maupun teknologi yang sesuai dengan minatmu.</p>
                </div>
                <div class="group">
                    <div class="w-14 h-14 bg-emerald-100/50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-sm group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-800">2. Cek Kredibilitas</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">Periksa detail penyelenggara dan tingkat skor kredibilitas dari setiap lomba yang ingin kamu ikuti.</p>
                </div>
                <div class="group">
                    <div class="w-14 h-14 bg-amber-100/50 text-amber-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-sm group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-800">3. Daftar & Menang</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">Dapatkan link pendaftaran resmi dan mulailah berjuang menjadi pemenang di kompetisi impianmu.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 text-center">
        <div class="max-w-[1440px] w-[92%] mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div class="text-left">
                <h2 class="text-3xl font-bold mb-6 text-left">Mengapa LombaPeta?</h2>
                <div class="space-y-8">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-black text-lg text-slate-800 mb-1">Mudah & Cepat dioperasikan</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">UI/UX yang simpel dan responsif memudahkan Anda dari proses pencarian hingga pendaftaran lomba dalam hitungan menit.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-black text-lg text-slate-800 mb-1">Terverifikasi & Aman</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">Hanya lomba dari institusi terpercaya yang kami tampilkan. Tim admin kami melakukan verifikasi ketat secara manual demi keamanan data peserta.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-slate-50 relative group">
                <!-- Decorative Layer -->
                <div class="absolute inset-0 rounded-[2.5rem] overflow-hidden pointer-events-none">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700"></div>
                </div>

                <h3 class="text-xl font-black text-center mb-8 relative z-10">Pilih Peranmu</h3>
                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <div class="relative group/role">
                        <div class="p-6 rounded-3xl bg-blue-50/50 text-center border border-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-500 cursor-default group/item">
                            <span class="block font-black text-lg mb-1">Pelajar</span>
                            <span class="text-[9px] uppercase font-bold tracking-widest opacity-70 group-hover/item:text-white">Cari & Ikuti Lomba</span>
                        </div>
                        <!-- Popup -->
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-4 w-48 p-4 bg-slate-900 text-white text-[11px] rounded-2xl opacity-0 invisible group-hover/role:opacity-100 group-hover/role:visible group-hover/role:-translate-y-2 transition-all duration-300 shadow-xl z-20 pointer-events-none">
                            Akses ribuan lomba, kumpulkan sertifikat, dan bangun portofolio prestasimu.
                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-8 border-transparent border-t-slate-900"></div>
                        </div>
                    </div>

                    <div class="relative group/role">
                        <div class="p-6 rounded-3xl bg-emerald-50/50 text-center border border-emerald-100 hover:bg-emerald-600 hover:text-white transition-all duration-500 cursor-default group/item">
                            <span class="block font-black text-lg mb-1">Penyelenggara</span>
                            <span class="text-[9px] uppercase font-bold tracking-widest opacity-70 group-hover/item:text-white">Pasang Lomba</span>
                        </div>
                        <!-- Popup -->
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-4 w-48 p-4 bg-slate-900 text-white text-[11px] rounded-2xl opacity-0 invisible group-hover/role:opacity-100 group-hover/role:visible group-hover/role:-translate-y-2 transition-all duration-300 shadow-xl z-20 pointer-events-none">
                            Kelola pendaftaran, verifikasi peserta, dan promosikan kompetisi Anda ke ribuan pelajar.
                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-8 border-transparent border-t-slate-900"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50/50" id="lomba">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Lomba Pilihan Minggu Ini</h2>
                    <p class="text-slate-500">Lomba paling diminati dengan pendaftaran hingga saat ini.</p>
                </div>
                <a href="{{ route('peserta.dashboard') }}" class="text-blue-600 font-bold text-sm hover:underline">Lihat Semua Lomba →</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


                @forelse ($competitions as $index => $competition)
                <a href="{{ route('peserta.detail', $competition->id) }}" class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in-up animate-stagger-{{ ($index % 4) + 1 }}">
                    <div class="h-48 bg-slate-200 relative overflow-hidden">
                        <img src="{{ $competition->poster_url }}" alt="Poster" class="w-full h-full object-cover transition-transform group-hover:scale-105 duration-700">
                        <div class="absolute top-4 left-4 flex gap-2">
                            @if($competition->category_id && $competition->category_relation)
                                <span class="px-3 py-1 bg-white/95 backdrop-blur text-blue-700 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm border border-blue-50">{{ $competition->category_relation->name }}</span>
                            @elseif($competition->category)
                                <span class="px-3 py-1 bg-white/95 backdrop-blur text-blue-700 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm border border-blue-50">{{ $competition->category }}</span>
                            @endif
                            @if($competition->level)
                                <span class="px-3 py-1 bg-blue-600 text-white rounded-full text-[10px] font-bold uppercase tracking-wider shadow-md">{{ $competition->level }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-slate-800 mb-3 line-clamp-2 h-12 leading-snug group-hover:text-blue-600 transition-colors">{{ $competition->title }}</h3>
                        <div class="space-y-3 mb-5 text-slate-500">
                            <div class="flex items-center text-[11px] font-medium gap-2.5">
                                <div class="w-5 h-5 rounded-full bg-slate-50 flex items-center justify-center text-blue-600">📍</div>
                                <span class="truncate">{{ $competition->organizer->name ?? 'Penyelenggara' }}</span>
                            </div>
                            <div class="flex items-center text-[11px] font-medium gap-2.5">
                                <div class="w-5 h-5 rounded-full bg-slate-50 flex items-center justify-center text-blue-600">📅</div>
                                <span>{{ $competition->deadline->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div class="w-full py-3 rounded-2xl bg-slate-50 text-blue-600 text-xs font-bold group-hover:bg-blue-600 group-hover:text-white group-hover:shadow-lg group-hover:shadow-blue-100 transition-all duration-300 text-center">Lihat Detail Lomba</div>
                    </div>
                </a>
                @empty
                    <div class="col-span-full py-20 flex flex-col items-center justify-center text-center bg-white rounded-3xl border border-dashed border-slate-200 animate-fade-in-up">
                        <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-300 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h4 class="font-bold text-slate-800 mb-1">Tidak ada lomba aktif</h4>
                        <p class="text-sm text-slate-500 max-w-xs px-6">Belum ada lomba yang terverifikasi saat ini. Silakan kembali lagi nanti.</p>
                    </div>
                @endforelse
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
                    <button class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition" hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-blue-100 >Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-slate-50 pt-20 pb-10 border-t border-slate-200">
        <div class="max-w-[1440px] w-[92%] mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <span class="text-lg font-bold text-blue-900">LombaPeta</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Platform pencari lomba nomor satu di Indonesia bagi siswa untuk mengembangkan potensi diri.</p>
            </div>
            <div>
                <h5 class="font-bold text-sm mb-6 uppercase tracking-widest text-slate-400">Navigasi</h5>
                <ul class="text-sm space-y-4 text-slate-600">
                    <li><a href="#" class="hover:text-blue-600">Beranda</a></li>
                    <li><a href="#tentang" class="hover:text-blue-600">Tentang Kami</a></li>
                    <li><a href="#lomba" class="hover:text-blue-600">Cari Lomba</a></li>
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
