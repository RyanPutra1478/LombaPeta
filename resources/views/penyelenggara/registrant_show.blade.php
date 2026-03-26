<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Pendaftar - {{ $registration->user->name }}</title>
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
                        <span class="text-green-600 opacity-70 text-[10px] font-bold uppercase tracking-wider border border-green-100">Organizer</span>
                    </div>
                </a>
            </div>
            <nav class="px-4 space-y-1">
                <a href="{{ route('penyelenggara.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm sidebar-text">Dashboard</span>
                </a>
                <a href="{{ route('penyelenggara.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="text-sm sidebar-text">Lomba Saya</span>
                </a>
            </nav>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
                <a href="{{ route('penyelenggara.competition.registrants', $registration->competition_id) }}" class="p-2 hover:bg-slate-100 rounded-lg text-slate-500 transition-colors border border-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-lg font-bold text-slate-800">Detail Registrasi Peserta</h1>
            </div>
             <div class="flex items-center gap-3">
                @if($registration->status == 'pending')
                     <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-extrabold rounded-full border border-yellow-200 uppercase tracking-widest">Verifikasi Pending</span>
                @elseif($registration->status == 'approved')
                     <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-extrabold rounded-full border border-green-200 uppercase tracking-widest">Telah Disetujui</span>
                @else
                     <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-extrabold rounded-full border border-red-200 uppercase tracking-widest">Pendaftaran Ditolak</span>
                @endif
                <div class="flex items-center gap-4 border-l border-slate-200 pl-4 ml-2">
                    @include('partials.notifications')
                </div>
             </div>

        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-5xl mx-auto pb-12 animate-fade-in-up">
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-100 rounded-2xl text-sm font-bold flex items-center gap-3">
                         <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 border border-red-100 rounded-2xl text-sm font-bold">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-6">
                        
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-3">Informasi Peserta & Tim</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Nama Lengkap / Ketua</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $registration->form_data['leader_name'] ?? $registration->user->name }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">WhatsApp / No. HP</p>
                                    <p class="text-lg font-bold text-slate-900 flex items-center gap-2">
                                        <img src="{{ asset('images/whatsapp.png') }}" class="w-5 h-5 object-contain" alt="WhatsApp">
                                        {{ $registration->phone_number }}
                                    </p>
                                </div>
                                <div class="md:col-span-2">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Asal Instansi (Sekolah / Kampus)</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $registration->form_data['institution'] ?? '-' }}</p>
                                </div>
                                <div class="md:col-span-2">
                                    @if($registration->competition->competition_model == 'tim')
                                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Nama Tim</p>
                                        <p class="text-lg font-bold text-slate-900 mb-6">{{ $registration->form_data['team_name'] ?? '-' }}</p>

                                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-3">Anggota Tim Terdaftar</p>
                                    @else
                                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-3 text-slate-300 italic">Mode Individu (Tanpa Anggota Tambahan)</p>
                                    @endif
                                    <div class="space-y-2">
                                        @php $members = ['member_1', 'member_2', 'member_3', 'member_4']; @endphp
                                        @php $hasMember = false; @endphp
                                        @foreach($members as $m)
                                            @if(!empty($registration->form_data[$m]))
                                                @php $hasMember = true; @endphp
                                                <div class="flex items-center gap-3 px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl">
                                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                                    <p class="text-slate-700 font-medium">{{ $registration->form_data[$m] }}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                        @if(!$hasMember && $registration->competition->competition_model == 'tim')
                                            <p class="text-sm text-slate-400 italic">Pendaftaran Tim (Tanpa anggota tambahan terisi).</p>
                                        @endif
                                    </div>

                                    @if(!empty($registration->form_data['additional']))
                                    <div class="mt-8 pt-6 border-t border-slate-100">
                                        <p class="text-[10px] font-bold text-blue-600 uppercase mb-4 tracking-widest">Informasi Kustom Tambahan</p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($registration->form_data['additional'] as $label => $value)
                                            <div class="p-4 bg-blue-50/30 border border-blue-100/50 rounded-2xl">
                                                <p class="text-[9px] font-black text-slate-400 uppercase mb-1 tracking-tight">{{ $label }}</p>
                                                <p class="text-sm font-bold text-slate-800">{{ $value ?: '-' }}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 space-y-4">
                                <h4 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    Bukti Pembayaran
                                </h4>
                                @if($registration->proof_of_payment)
                                <a href="{{ asset('storage/' . $registration->proof_of_payment) }}" target="_blank" class="block group relative rounded-2xl overflow-hidden border border-slate-200 shadow-sm aspect-square bg-slate-100">
                                    <img src="{{ asset('storage/' . $registration->proof_of_payment) }}" alt="Bukti Bayar" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <p class="text-white text-xs font-bold flex items-center gap-2">
                                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Perbesar Gambar
                                        </p>
                                    </div>
                                </a>
                                @else
                                <div class="py-12 flex flex-col items-center justify-center bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl italic text-slate-400 text-sm">
                                    Tidak Perlu Bukti (Lomba Gratis)
                                </div>
                                @endif
                            </div>

                                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 space-y-4">
                                    <h4 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.333 0 4 1 4 3"></path></svg>
                                        Kartu Identitas (Pelajar/KTM)
                                    </h4>
                                    
                                    @php $isPdf = str_ends_with($registration->id_card_file, '.pdf'); @endphp
                                    @if($isPdf)
                                    <a href="{{ asset('storage/' . $registration->id_card_file) }}" target="_blank" class="block w-full aspect-square bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center justify-center group hover:bg-slate-100 hover:border-blue-300 transition-all">
                                        <svg class="w-10 h-10 text-red-500 mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        <p class="text-sm font-bold text-slate-700">Dokumen PDF Terlampir</p>
                                        <p class="text-xs text-blue-600 font-bold mt-2">Buka/Lihat Kartu Identitas</p>
                                    </a>
                                    @else
                                    <a href="{{ asset('storage/' . $registration->id_card_file) }}" target="_blank" class="block group relative rounded-2xl overflow-hidden border border-slate-200 shadow-sm aspect-square bg-slate-100">
                                        <img src="{{ asset('storage/' . $registration->id_card_file) }}" alt="Identitas" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-bold">
                                            Perbesar Gambar
                                        </div>
                                    </a>
                                    @endif
                                </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1">
                        <div class="sticky top-6 space-y-6">
                            
                            <div class="bg-white rounded-3xl border-2 border-blue-50 shadow-xl shadow-blue-50 p-8 transition-all hover:shadow-blue-100">
                                <h3 class="font-extrabold text-slate-900 mb-2 text-xl tracking-tight">Kelola Status</h3>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-50 pb-3">Update pendaftaran</p>
                                
                                <form action="{{ route('penyelenggara.registrations.updateStatus', $registration->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 px-1">Link Group Lomba (WA/Tele)</label>
                                        <div class="relative">
                                            <input type="url" name="group_link" value="{{ $registration->group_link }}" 
                                                placeholder="https://chat.whatsapp.com/..." 
                                                class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-bold focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all shadow-inner">
                                            <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.823a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.102-1.101m.002-5.83a4 4 0 015.656 0l1.103 1.103m-5.831-1.3l1.103 1.103"></path></svg>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        @if($registration->status == 'pending')
                                            <button type="submit" name="status" value="approved" class="w-full py-4 bg-emerald-600 text-white rounded-2xl font-black text-sm shadow-lg shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 transition-all flex items-center justify-center gap-2 active:scale-95">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Setujui Pendaftaran
                                            </button>
                                            
                                            <button type="submit" name="status" value="rejected" class="w-full py-4 bg-white text-red-600 border-2 border-red-50 rounded-2xl font-black text-sm hover:bg-red-50 hover:border-red-100 transition-all flex items-center justify-center gap-2 active:scale-95">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Tolak Peserta
                                            </button>
                                        @elseif($registration->status == 'approved')
                                            <div class="w-full py-4 bg-emerald-50 text-emerald-700 rounded-2xl font-black text-sm text-center border border-emerald-100 flex items-center justify-center gap-2">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                Pendaftaran Disetujui
                                            </div>
                                            <p class="text-[9px] text-slate-400 text-center uppercase font-bold tracking-widest mt-2">Status telah terkunci sebagai "Disetujui"</p>
                                        @else
                                            <div class="w-full py-4 bg-red-50 text-red-700 rounded-2xl font-black text-sm text-center border border-red-100 flex items-center justify-center gap-2">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                                Pendaftaran Ditolak
                                            </div>
                                            <p class="text-[9px] text-slate-400 text-center uppercase font-bold tracking-widest mt-2">Status telah terkunci sebagai "Ditolak"</p>
                                        @endif
                                    </div>
                                </form>

                                <div class="mt-8 p-5 bg-blue-50/50 rounded-2xl border border-blue-100">
                                    <p class="text-[9px] text-blue-500 font-black uppercase mb-2 tracking-widest">Informasi Penting:</p>
                                    <p class="text-[11px] text-slate-600 leading-relaxed font-medium">
                                        Setelah pendaftaran disetujui, peserta dapat mengakses <span class="text-blue-600 font-bold">Link Group Lomba</span> yang Anda berikan melalui halaman detail lomba mereka.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </main>
    </div>


@include('partials.scripts')
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
