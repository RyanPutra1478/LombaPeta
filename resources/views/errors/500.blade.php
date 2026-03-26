<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesalahan Server - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] h-screen flex items-center justify-center p-6 overflow-hidden text-slate-900">
    <div class="max-w-md w-full text-center space-y-8 animate-fade-in-up">
        <div class="w-24 h-24 bg-red-50 text-red-600 rounded-[2rem] flex items-center justify-center mx-auto shadow-inner ring-4 ring-red-50/50">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        
        <div class="space-y-4">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-none">Sedang Terjadi Kendala</h2>
            <p class="text-slate-500 leading-relaxed font-medium">
                Maaf, server kami mengalami gangguan teknis saat memproses permintaan Anda. Tim kami telah diberitahu secara otomatis.
            </p>
        </div>

        <div class="flex flex-col gap-3 pt-4">
            <button onclick="window.location.reload()" class="w-full px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all active:scale-95 flex items-center justify-center gap-2">
                Coba Segarkan Halaman
            </button>
            <a href="{{ url('/') }}" class="w-full px-8 py-4 bg-white text-slate-600 border border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all active:scale-95">
                Kembali ke Beranda
            </a>
        </div>

        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest pt-8 leading-relaxed">Error Code: 500 • Internal Server Error<br>Waktu: {{ date('Y-m-d H:i:s T') }}</p>
    </div>
</body>
</html>
