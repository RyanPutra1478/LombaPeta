<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi Kedaluwarsa - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] h-screen flex items-center justify-center p-6 overflow-hidden">
    <div class="max-w-md w-full text-center space-y-8 animate-fade-in-up">
        <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-[2rem] flex items-center justify-center mx-auto shadow-inner ring-4 ring-blue-50/50">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        
        <div class="space-y-4">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-none">Sesi Kedaluwarsa</h2>
            <p class="text-slate-500 leading-relaxed font-medium">
                Sesi keamanan Anda telah berakhir karena inaktivitas. Silakan muat ulang halaman atau login kembali.
            </p>
        </div>

        <div class="flex flex-col gap-3 pt-4">
            <a href="{{ route('login') }}" class="w-full px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all active:scale-95 flex items-center justify-center gap-2">
                Login Kembali
            </a>
            <button onclick="window.location.reload()" class="w-full px-8 py-4 bg-white text-slate-600 border border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all active:scale-95">
                Muat Ulang Halaman
            </button>
        </div>

        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest pt-8">Error Code: 419 • CSRF Mismatch</p>
    </div>
</body>
</html>
