<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-[#f8fafc] h-screen flex items-center justify-center p-6 overflow-hidden">
    <div class="max-w-2xl w-full text-center space-y-8 animate-fade-in-up">
        <div class="relative inline-block">
            <h1 class="text-[12rem] font-black text-slate-100 leading-none select-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-4xl font-black text-slate-800 tracking-tight">Oops! Jejak Hilang.</span>
            </div>
        </div>
        
        <div class="space-y-4">
            <h2 class="text-2xl font-bold text-slate-900">Halaman Tidak Ditemukan</h2>
            <p class="text-slate-500 max-w-md mx-auto leading-relaxed">
                Sepertinya rute yang Anda tuju telah dipindahkan atau tidak pernah ada. Jangan khawatir, peta kami masih bisa membimbing Anda kembali.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="{{ url('/') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all active:scale-95 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Kembali ke Beranda
            </a>
            <button onclick="history.back()" class="w-full sm:w-auto px-8 py-4 bg-white text-slate-600 border border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all active:scale-95">
                Kembali ke Sebelumnya
            </button>
        </div>

        <div class="pt-12">
            <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-12 h-12 mx-auto grayscale opacity-20">
        </div>
    </div>
</body>
</html>
