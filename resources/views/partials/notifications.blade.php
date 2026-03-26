<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="relative text-slate-400 hover:text-slate-600 transition-colors pt-1">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        @if(auth()->user()->unreadNotifications->count() > 0)
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
        @endif
    </button>
    
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 z-50 overflow-hidden" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         style="display: none;">
        <div class="p-4 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
            <h3 class="font-bold text-sm text-slate-800">Notifikasi</h3>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-[10px] font-bold text-blue-600 hover:underline uppercase tracking-wider">Tandai Semua Dibaca</button>
                </form>
            @endif
        </div>
        <div class="max-h-96 overflow-y-auto">
            @forelse(auth()->user()->unreadNotifications as $notification)
                <div class="p-4 border-b border-slate-50 hover:bg-slate-50 transition-colors cursor-pointer" onclick="markAsRead('{{ $notification->id }}', '{{ $notification->data['url'] ?? '#' }}')">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-800">{{ $notification->data['title'] ?? 'Notifikasi Baru' }}</p>
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">{{ $notification->data['message'] ?? '' }}</p>
                            <p class="text-[10px] text-slate-400 mt-2 font-medium">{{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <svg class="w-10 h-10 text-slate-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <p class="text-sm text-slate-400 font-medium">Tidak ada notifikasi baru</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
