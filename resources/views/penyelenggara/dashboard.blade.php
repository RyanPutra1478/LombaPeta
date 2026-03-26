<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penyelenggara - LombaPeta</title>
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

    @include('partials.sidebar_organizer')


    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <header class="h-20 glass-nav border-b border-slate-200/50 flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">

            <div class="flex items-center gap-4">
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Dashboard Penyelenggara</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="relative hidden sm:block">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 w-64 transition-all">
                </div>

                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')

                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-7xl mx-auto space-y-8 animate-fade-in-up">

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-1">Selamat Datang, {{ auth()->user()->name }} 👋</h2>
                    <p class="text-slate-500 text-sm">Pantau statistik pendaftaran dan kelola peserta kompetisi Anda hari ini.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white/60 rounded-3xl p-6 border border-blue-200 shadow-sm relative overflow-hidden animate-fade-in-up" style="background: linear-gradient(to bottom right, #eff6ff, #ffffff); animation-delay: 0ms">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-blue-600 text-sm">Pendaftar (Pending)</h3>
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-6">{{ $totalRegistrants }}</p>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
                            <div class="bg-blue-600 h-1.5 rounded-full w-[{{ $totalRegistrants > 0 ? 100 : 0 }}%]"></div>
                        </div>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-green-200 shadow-sm relative overflow-hidden animate-fade-in-up" style="background: linear-gradient(to bottom right, #f0fdf4, #ffffff); animation-delay: 100ms">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-green-700 text-sm">Lomba Aktif</h3>
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 border border-green-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ $competitions->where('status', 'approved')->count() }}</p>
                        <p class="text-xs font-bold text-green-600">Disetujui & Live</p>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-orange-200 shadow-sm relative overflow-hidden animate-fade-in-up" style="background: linear-gradient(to bottom right, #fff7ed, #ffffff); animation-delay: 200ms">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-orange-600 text-sm">Menunggu Verifikasi</h3>
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 border border-orange-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ $competitions->where('status', 'pending')->count() }}</p>
                        <p class="text-xs font-bold text-orange-600">Pending Admin</p>
                    </div>

                    <div class="bg-white/60 rounded-3xl p-6 border border-purple-200 shadow-sm relative overflow-hidden animate-fade-in-up" style="background: linear-gradient(to bottom right, #faf5ff, #ffffff); animation-delay: 300ms">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-purple-700 text-sm">Total Dilihat</h3>
                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 border border-purple-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-slate-900 mb-2">{{ number_format($totalViews) }}</p>
                        <p class="text-xs font-bold text-purple-600">Views Halaman Lomba</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm flex flex-col">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="font-bold text-slate-900">Tren Pendaftaran</h3>
                                <p class="text-xs text-slate-500 mt-1">Statistik pendaftaran 30 hari terakhir</p>
                            </div>
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full border border-green-100">Meningkat</span>
                        </div>

                        <div class="flex-1 min-h-[300px] relative">
                            <canvas id="registrationChart"></canvas>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('registrationChart').getContext('2d');
                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: @json($chartLabels),
                                    datasets: [{
                                        label: 'Pendaftaran',
                                        data: @json($chartData),
                                        borderColor: '#2563eb',
                                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                                        borderWidth: 3,
                                        fill: true,
                                        tension: 0.4,
                                        pointRadius: 4,
                                        pointBackgroundColor: '#2563eb',
                                        pointBorderColor: '#fff',
                                        pointBorderWidth: 2,
                                        pointHoverRadius: 6,
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: false
                                        },
                                        tooltip: {
                                            backgroundColor: '#1e293b',
                                            padding: 12,
                                            titleFont: { size: 14, weight: 'bold' },
                                            bodyFont: { size: 13 },
                                            displayColors: false,
                                            callbacks: {
                                                label: function(context) {
                                                    return context.parsed.y + ' Pendaftaran';
                                                }
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                display: true,
                                                color: '#f1f5f9'
                                            },
                                            ticks: {
                                                precision: 0,
                                                font: { size: 11, family: 'Inter' },
                                                color: '#64748b'
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                font: { size: 11, family: 'Inter' },
                                                color: '#64748b',
                                                maxRotation: 0,
                                                autoSkip: true,
                                                maxTicksLimit: 7
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script>

                    <div class="lg:col-span-1 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                        <h3 class="font-bold text-slate-900 mb-6">Pendaftar per Lomba</h3>

                        <div class="space-y-6">
                            @forelse($competitions as $lomba)
                            <div>
                                <div class="flex justify-between text-sm font-bold text-slate-700 mb-2">
                                    <span class="truncate pr-2">{{ $lomba->title }}</span>
                                    <span>{{ $lomba->registrations_count }}</span>
                                </div>
                                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                    <div class="bg-blue-600 h-full rounded-full w-[{{ $lomba->registrations_count > 0 ? min(100, $lomba->registrations_count * 2) : 0 }}%]"></div>
                                </div>
                            </div>
                            @empty
                            <p class="text-sm text-slate-400">Belum ada kompetisi.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-slate-900 text-lg">Pendaftar Terbaru</h3>
                        <a href="{{ route('penyelenggara.registrations.all') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                            Lihat Semua Data <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse($recentRegistrations as $reg)
                        <div class="flex items-start gap-4 p-4 rounded-2xl border border-slate-100 hover:bg-slate-50 transition cursor-pointer" onclick="window.location='{{ route('penyelenggara.registrations.show', $reg->id) }}'">
                            <div class="mt-1.5 w-2.5 h-2.5 rounded-full {{ $reg->status == 'pending' ? 'bg-amber-400 shadow-amber-200' : ($reg->status == 'approved' ? 'bg-green-500 shadow-green-200' : 'bg-red-400 shadow-red-200') }} shrink-0 shadow-sm"></div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-sm">{{ $reg->user->name }}</h4>
                                <p class="text-xs text-slate-500 mt-1">Mendaftar di: <span class="font-extrabold text-blue-600">{{ $reg->competition->title }}</span></p>
                            </div>
                            <span class="text-xs font-medium text-slate-400">{{ $reg->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <div class="py-12 border-2 border-dashed border-slate-100 rounded-3xl flex flex-col items-center justify-center text-slate-400">
                             <svg class="w-10 h-10 mb-3 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                             <p class="text-sm italic">Belum ada pendaftaran terbaru.</p>
                        </div>
                        @endforelse
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
    @include('partials.scripts')
</body>
</html>

