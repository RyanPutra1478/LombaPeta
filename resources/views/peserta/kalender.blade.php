<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Lomba - Peserta</title>
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

        /* Memastikan baris kalender memiliki tinggi minimum agar seragam */
        .calendar-cell { min-height: 100px; }
        @media (max-width: 768px) { .calendar-cell { min-height: 80px; } }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 flex h-screen overflow-hidden">

    <aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none z-20 shrink-0">
        <div>
            <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col sidebar-text">
                        <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                        <span class="text-blue-700 opacity-70 text-[10px] font-bold uppercase tracking-wider">Peserta</span>
                    </div>
                </a>
            </div>

            <nav class="px-4 space-y-1">
                <a href="{{ route('peserta.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    <span class="text-sm sidebar-text">Info Lomba</span>
                </a>

                <a href="{{ route('peserta.kalender') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100 transition-all">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-sm sidebar-text">Kalender Lomba</span>
                </a>

                <a href="{{ route('peserta.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm sidebar-text">Profil Saya</span>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">

            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Jadwal & Agenda</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')
                </div>
            </div>

        </header>

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">
            <div class="max-w-7xl mx-auto animate-fade-in-up">

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Kalender Lomba 📅</h2>
                    <p class="text-slate-500">Pantau jadwal pendaftaran dan pelaksanaan kompetisi yang kamu ikuti (Status Approved).</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                    <div class="xl:col-span-2">
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

                            <div class="px-6 py-4 flex items-center justify-between border-b border-slate-100 bg-slate-50/50">
                                <div class="flex items-center gap-4">
                                    <h3 class="text-xl font-bold text-slate-900 tracking-tight">{{ $startOfMonth->format('F Y') }}</h3>
                                </div>
                                <div class="flex items-center bg-white border border-slate-200 rounded-xl p-1 shadow-sm">
                                    <a href="{{ route('peserta.kalender', ['month' => $startOfMonth->copy()->subMonth()->month, 'year' => $startOfMonth->copy()->subMonth()->year]) }}" class="p-1.5 hover:bg-slate-50 rounded-lg text-slate-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    </a>
                                    <div class="w-px h-4 bg-slate-200 mx-1"></div>
                                    <a href="{{ route('peserta.kalender', ['month' => $startOfMonth->copy()->addMonth()->month, 'year' => $startOfMonth->copy()->addMonth()->year]) }}" class="p-1.5 hover:bg-slate-50 rounded-lg text-slate-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <div class="grid grid-cols-7 border-b border-slate-100 bg-white">
                                @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                                <div class="py-3 text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $day }}</div>
                                @endforeach
                            </div>

                            <div class="grid grid-cols-7 bg-slate-50 gap-px">
                                @php
                                    $daysInMonth = $startOfMonth->daysInMonth;
                                    $dayOfWeek = $startOfMonth->dayOfWeek;
                                @endphp

                                {{-- Leading Days --}}
                                @for($i = 0; $i < $dayOfWeek; $i++)
                                <div class="bg-slate-50/50 min-h-[100px] md:min-h-[120px]"></div>
                                @endfor

                                {{-- Actual Days --}}
                                @for($day = 1; $day <= $daysInMonth; $day++)
                                    @php 
                                        $isToday = (\Carbon\Carbon::now()->day == $day && \Carbon\Carbon::now()->month == $month && \Carbon\Carbon::now()->year == $year);
                                        $hasDeadlines = isset($deadlinesByDay[$day]);
                                    @endphp
                                    <div class="bg-white min-h-[100px] md:min-h-[120px] p-2 hover:bg-slate-50 transition-colors group relative border-t border-l border-slate-100">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-sm font-bold {{ $isToday ? 'w-7 h-7 bg-blue-600 text-white flex items-center justify-center rounded-full shadow-md shadow-blue-200' : 'text-slate-400' }}">
                                                {{ $day }}
                                            </span>
                                        </div>
                                        
                                        <div class="space-y-1">
                                            @if($hasDeadlines)
                                                @foreach($deadlinesByDay[$day] as $comp)
                                                    <div class="px-2 py-1 rounded bg-blue-50 border border-blue-100 text-[10px] font-bold text-blue-700 leading-tight line-clamp-2 hover:bg-blue-100 cursor-help transition-all shadow-sm" title="{{ $comp->title }}">
                                                        {{ $comp->title }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endfor

                                {{-- Trailing Days --}}
                                @php $totalCells = $dayOfWeek + $daysInMonth; @endphp
                                @while($totalCells % 7 != 0)
                                    <div class="bg-slate-50/50 min-h-[100px] md:min-h-[120px]"></div>
                                    @php $totalCells++; @endphp
                                @endwhile
                            </div>
                        </div>
                    </div>

                    <div class="xl:col-span-1">
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6 md:p-8 sticky top-6">
                            <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2 border-b border-slate-100 pb-4">
                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Agenda Terdekat
                            </h3>

                            <div class="space-y-4">
                                @forelse($registrations as $r)
                                <div class="flex items-start gap-4">
                                    <div class="flex flex-col items-center justify-center w-10 h-10 bg-blue-50 border border-blue-200 rounded-xl shrink-0">
                                        <span class="text-xs font-bold text-blue-600 uppercase">{{ \Carbon\Carbon::parse($r->competition->deadline)->format('M') }}</span>
                                        <span class="text-lg font-extrabold text-blue-900 leading-none">{{ \Carbon\Carbon::parse($r->competition->deadline)->format('d') }}</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">Batas Akhir/Pelaksanaan: {{ $r->competition->title }}</h4>
                                        <p class="text-xs text-slate-500 mt-1 line-clamp-1">{{ $r->competition->organizer->name }}</p>
                                        <span class="inline-block mt-2 px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded">
                                            {{ \Carbon\Carbon::parse($r->competition->deadline)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                <hr class="border-slate-100 last:hidden">
                                @empty
                                <p class="text-slate-400 italic text-sm text-center py-4">Belum ada agenda terdekat. Pastikan pendaftaran Anda telah disetujui (Approved) oleh penyelenggara.</p>
                                @endforelse
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

                </div>
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
    @include('partials.scripts')
</body>
</html>

