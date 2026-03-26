<div class="flex flex-col items-center justify-center py-16 px-4 text-center animate-fade-in">
    <div class="w-64 h-64 mb-8 relative">
        <!-- Premium SVG Illustration (Customizable via slots or props if needed, but here's a default one) -->
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-2xl">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                </linearGradient>
            </defs>
            <circle cx="100" cy="100" r="80" fill="#f1f5f9" />
            <path d="M60,140 Q100,160 140,140" stroke="#e2e8f0" stroke-width="4" fill="none" />
            <rect x="70" y="60" width="60" height="80" rx="8" fill="white" stroke="#cbd5e1" stroke-width="2" />
            <line x1="80" y1="80" x2="120" y2="80" stroke="#f1f5f9" stroke-width="2" />
            <line x1="80" y1="95" x2="120" y2="95" stroke="#f1f5f9" stroke-width="2" />
            <line x1="80" y1="110" x2="100" y2="110" stroke="#f1f5f9" stroke-width="2" />
            <circle cx="150" cy="60" r="20" fill="url(#grad1)" opacity="0.8" />
            <path d="M145,60 L155,60 M150,55 L150,65" stroke="white" stroke-width="3" stroke-linecap="round" />
        </svg>
    </div>
    <h3 class="text-2xl font-bold text-slate-800 mb-3">{{ $title ?? 'Tidak Ada Data' }}</h3>
    <p class="text-slate-500 max-w-sm mx-auto mb-8 font-medium leading-relaxed">
        {{ $message ?? 'Belum ada informasi yang tersedia di halaman ini untuk saat ini.' }}
    </p>
    @if(isset($action_url) && isset($action_text))
    <a href="{{ $action_url }}" class="px-8 py-3.5 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all active:scale-95">
        {{ $action_text }}
    </a>
    @endif
</div>
