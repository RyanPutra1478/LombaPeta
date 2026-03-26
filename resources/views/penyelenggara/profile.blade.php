<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Penyelenggara</title>
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
                <div class="flex items-center"><button onclick="toggleSidebar()" class="p-2 mr-3 text-slate-500 hover:bg-slate-100 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button></div><h1 class="text-lg font-bold text-slate-800">Profil Saya</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-slate-200 pl-6">
                    @include('partials.notifications')
                    @include('partials.profile_avatar')

                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-4xl mx-auto space-y-8 animate-fade-in-up">
                
                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 animate-fade-in">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- Profile Header Card -->
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="relative group">
                                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-slate-50 shadow-inner bg-slate-100 flex items-center justify-center">
                                    @if($profile->avatar)
                                        <img id="avatar-preview" src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                                    @else
                                        <div id="avatar-placeholder" class="text-3xl font-bold text-slate-400">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <img id="avatar-preview" src="#" alt="Avatar" class="w-full h-full object-cover hidden">
                                    @endif
                                </div>
                                <label for="avatar" class="absolute bottom-0 right-0 w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-700 transition shadow-lg border-2 border-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <input type="file" name="avatar" id="avatar" class="hidden" onchange="previewAvatar(this)">
                                </label>
                            </div>
                            
                            <div class="flex-1 text-center md:text-left">
                                <h2 class="text-2xl font-bold text-slate-900 mb-1">{{ $user->name }}</h2>
                                <p class="text-slate-500">{{ $user->email }}</p>
                            </div>

                        </div>
                    </div>

                    <!-- Personal Info Card -->
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                            Informasi Dasar
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700">Nama Lengkap / Instansi</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all outline-none" placeholder="Masukkan nama...">
                            </div>
                            
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700">Nomor Telepon (WhatsApp)</label>
                                <input type="text" name="phone" value="{{ $profile->phone }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all outline-none" placeholder="08xxx...">
                            </div>
                            
                            <div class="space-y-2 md:col-span-2">
                                <label class="text-sm font-bold text-slate-700">Nama Sekolah / Lembaga Resmi</label>
                                <input type="text" name="institution" value="{{ $profile->institution }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all outline-none" placeholder="Contoh: SMA Negeri 1 Jakarta">
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="text-sm font-bold text-slate-700">Bio Singkat</label>
                                <textarea name="bio" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-all outline-none" placeholder="Ceritakan sedikit tentang instansi Anda...">{{ $profile->bio }}</textarea>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-8 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition transform hover:-translate-y-1">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('flex');
        }

        function previewAvatar(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('avatar-preview');
                    const placeholder = document.getElementById('avatar-placeholder');
                    
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @include('partials.scripts')
</body>
</html>

