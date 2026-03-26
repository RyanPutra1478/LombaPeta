<aside id="sidebar" class="w-64 bg-white border-r border-slate-200 transition-all duration-300 flex-col justify-between hidden md:flex absolute md:relative z-50 md:z-20 h-full shadow-2xl md:shadow-none">
    <div>
        <div class="h-20 flex items-center px-6 border-b border-slate-100 mb-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                <div class="flex flex-col sidebar-text">
                    <span class="text-xl font-bold tracking-tight text-blue-600 leading-tight">LombaPeta</span>
                    <span class="text-green-600 opacity-70 text-[10px] font-bold uppercase tracking-wider border border-green-100 px-1 rounded inline-block w-fit">Penyelenggara</span>
                </div>
            </a>
        </div>

        <nav class="px-4 space-y-1">
            <a href="{{ route('penyelenggara.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ Route::is('penyelenggara.dashboard') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium' }} transition-all">
                <svg class="w-5 h-5 {{ Route::is('penyelenggara.dashboard') ? 'text-blue-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span class="text-sm sidebar-text">Dashboard</span>
            </a>

            <a href="{{ route('penyelenggara.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ Route::is('penyelenggara.create') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium' }} transition-all">
                <svg class="w-5 h-5 {{ Route::is('penyelenggara.create') ? 'text-blue-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="text-sm sidebar-text">Pasang Info Lomba</span>
            </a>

            <a href="{{ route('penyelenggara.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ Route::is('penyelenggara.index') || Route::is('penyelenggara.edit') || Route::is('penyelenggara.competition.*') || Route::is('penyelenggara.registrations.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium' }} transition-all">
                <svg class="w-5 h-5 {{ Route::is('penyelenggara.index') || Route::is('penyelenggara.edit') || Route::is('penyelenggara.competition.*') || Route::is('penyelenggara.registrations.*') ? 'text-blue-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span class="text-sm sidebar-text">Lomba Saya</span>
            </a>

            <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ Route::is('profile.show') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700 font-medium' }} transition-all">
                <svg class="w-5 h-5 {{ Route::is('profile.show') ? 'text-blue-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-sm sidebar-text">Profil Saya</span>
            </a>
        </nav>
    </div>

    <div class="p-4 border-t border-slate-100">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="text-sm sidebar-text">Keluar</span>
            </button>
        </form>
    </div>
</aside>
