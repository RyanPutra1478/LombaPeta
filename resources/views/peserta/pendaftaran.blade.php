<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain"> <span class="text-xl font-bold tracking-tight text-blue-600">LombaPeta</span>
                </a>
            </div>
            <nav class="px-4 space-y-1">
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="text-sm sidebar-text">Info Lomba</span>
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="text-sm sidebar-text">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 shrink-0">
            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Formulir Pendaftaran</h1>
            </div>
            <button class="w-9 h-9 rounded-full bg-blue-600 text-white font-bold text-sm flex items-center justify-center" hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-blue-100 >
                {{ substr(auth()->user()->name, 0, 1) }}
            </button>
        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <div class="max-w-3xl mx-auto pb-12 animate-fade-in-up">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-1">Daftar: {{ $competition->title }}</h2>
                    <p class="text-slate-500">Silakan lengkapi data pendaftaran Anda.</p>
                </div>

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-2xl border border-red-100 italic text-sm">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('peserta.pendaftaran.store', $competition->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Informasi Peserta</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($competition->competition_model == 'tim')
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Tim <span class="text-red-500">*</span></label>
                                <input type="text" name="form_data[team_name]" value="{{ old('form_data.team_name') }}" placeholder="Masukkan nama tim Anda" required class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 focus:bg-white transition-all">
                            </div>
                            @endif

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">{{ $competition->competition_model == 'tim' ? 'Nama Ketua Tim' : 'Nama Lengkap Peserta' }} <span class="text-red-500">*</span></label>
                                <input type="text" name="form_data[leader_name]" value="{{ old('form_data.leader_name', auth()->user()->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 focus:bg-white transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Terdaftar</label>
                                <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-3 rounded-xl bg-slate-200 border border-slate-200 text-slate-600">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">WhatsApp / No. HP Aktif <span class="text-red-500">*</span></label>
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="0812..." required class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 focus:bg-white transition-all">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Asal Instansi (Sekolah / Universitas) <span class="text-red-500">*</span></label>
                                <input type="text" name="form_data[institution]" value="{{ old('form_data.institution') }}" placeholder="Contoh: SMA Negeri 1 Jakarta / Universitas Indonesia" required class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 focus:bg-white transition-all">
                            </div>

                            @if($competition->competition_model == 'tim')
                            <div class="md:col-span-2">
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <h4 class="text-xs font-bold text-slate-500 uppercase mb-4">Anggota Tim (Maks. 4 Anggota Tambahan)</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <input type="text" name="form_data[member_1]" value="{{ old('form_data.member_1') }}" placeholder="Anggota 1" class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-blue-100 outline-none">
                                        <input type="text" name="form_data[member_2]" value="{{ old('form_data.member_2') }}" placeholder="Anggota 2" class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-blue-100 outline-none">
                                        <input type="text" name="form_data[member_3]" value="{{ old('form_data.member_3') }}" placeholder="Anggota 3" class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-blue-100 outline-none">
                                        <input type="text" name="form_data[member_4]" value="{{ old('form_data.member_4') }}" placeholder="Anggota 4" class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-blue-100 outline-none">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Unggah Kartu Pelajar / KTM (Semua Anggota digabung) <span class="text-red-500">*</span></label>
                                <input type="file" name="id_card_file" accept=".pdf" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="text-[10px] text-slate-400 mt-2 italic font-medium">Wajib Format: PDF (Maks. 2MB). Gabungkan foto anggota dalam 1 file PDF.</p>
                            </div>
                        </div>
                    </div>

                    @if($competition->registration_fee > 0)
                    <div class="bg-blue-50 rounded-3xl p-6 border border-blue-100">
                        <h3 class="font-bold text-blue-900 mb-1">Informasi Pembayaran</h3>
                        <p class="text-sm text-blue-700 mb-4 font-medium">Biaya Pendaftaran: <span class="font-bold text-lg">Rp {{ number_format($competition->registration_fee, 0, ',', '.') }}</span></p>
                        
                        @if($competition->payment_qr_code)
                        <div class="mb-6">
                            <p class="text-xs text-blue-600 mb-3 uppercase font-bold tracking-wider">Silakan Scan Kode QR Berikut:</p>
                            <div class="w-48 h-48 bg-white p-2 rounded-2xl shadow-sm mx-auto border border-blue-200">
                                <img src="{{ asset('storage/' . $competition->payment_qr_code) }}" alt="QR Code" class="w-full h-full object-contain">
                            </div>
                        </div>
                        @else
                        <p class="text-slate-500 italic text-sm">Metode pembayaran akan diinstruksikan oleh panitia.</p>
                        @endif

                        <div class="mt-4">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Unggah Bukti Pembayaran</label>
                            <div class="relative group">
                                <input type="file" name="proof_of_payment" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="w-full px-4 py-8 border-2 border-dashed border-slate-300 rounded-2xl flex flex-col items-center justify-center bg-white group-hover:border-blue-400 transition-colors">
                                    <svg class="w-10 h-10 text-slate-400 mb-3 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="text-sm font-bold text-slate-600">Klik atau seret file ke sini</p>
                                    <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, PDF (Maks. 2MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-green-50 rounded-3xl p-6 border border-green-100">
                        <p class="text-green-800 font-bold">Lomba ini GRATIS. Anda dapat langsung mendaftar.</p>
                    </div>
                    @endif

                    <div class="flex gap-4">
                        <a href="{{ route('peserta.detail', $competition->id) }}" class="flex-1 py-4 bg-white text-slate-700 border border-slate-200 rounded-2xl font-bold text-center">Batal</a>
                        <button type="submit" class="flex-[2] py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">Konfirmasi Pendaftaran</button>
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
