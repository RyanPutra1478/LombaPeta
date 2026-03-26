<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar - {{ $competition->title }}</title>
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
                <button onclick="toggleSidebar()" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
                <a href="{{ route('penyelenggara.index') }}" class="p-2 hover:bg-slate-100 rounded-lg text-slate-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-lg font-bold text-slate-800">Daftar Pendaftar</h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full border border-blue-100 max-w-xs truncate">{{ $competition->title }}</span>
                <div class="flex items-center gap-4 border-l border-slate-200 pl-4">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')
                </div>

            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-6 animate-fade-in-up">

                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900 italic">Pendaftar Kompetisi</h2>
                            <p class="text-xs text-slate-500">Total: <span class="font-bold text-blue-600">{{ $registrations->total() }} pendaftar</span></p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                            <div class="relative w-full sm:w-64">
                                <input type="text" placeholder="Cari Nama..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:ring-2 focus:ring-blue-100 outline-none">
                                <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <a href="{{ route('penyelenggara.competition.registrants.export', $competition->id) }}" class="flex items-center gap-2 px-5 py-2 bg-emerald-600 text-white text-xs font-bold rounded-full hover:bg-emerald-700 transition shadow-sm whitespace-nowrap">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Ekspor CSV
                            </a>
                        </div>
                    </div>


                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-4">Nama Peserta</th>
                                    <th class="px-6 py-4">Instansi</th>
                                    <th class="px-6 py-4">Kontak</th>
                                    <th class="px-6 py-4">Tanggal Daftar</th>
                                    <th class="px-6 py-4 text-center">Status</th>
                                    <th class="px-6 py-4 text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                                @forelse($registrations as $r)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-slate-900">{{ $r->user->name }}</td>
                                    <td class="px-6 py-4 text-xs font-medium text-slate-600">
                                        {{ $r->form_data['institution'] ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-500">{{ $r->phone_number }}</td>
                                    <td class="px-6 py-4 text-slate-500">{{ $r->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($r->status == 'pending')
                                            <span class="px-2.5 py-1 bg-yellow-50 text-yellow-700 rounded-full text-[10px] font-bold border border-yellow-100">PENDING</span>
                                        @elseif($r->status == 'approved')
                                            <span class="px-2.5 py-1 bg-green-50 text-green-700 rounded-full text-[10px] font-bold border border-green-100">DISETUJUI</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-red-50 text-red-700 rounded-full text-[10px] font-bold border border-red-100">DITOLAK</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('penyelenggara.registrations.show', $r->id) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-bold transition-all underline underline-offset-4 decoration-2 decoration-blue-100">
                                            Buka Data
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="px-6 py-12 text-center text-slate-400 italic font-medium">Belum ada peserta yang mendaftar.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($registrations->hasPages())
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                        {{ $registrations->links() }}
                    </div>
                    @endif
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
    @include('partials.scripts')
</body>
</html>

