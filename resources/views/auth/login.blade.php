<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk / Daftar - LombaPeta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('images/lombapeta.png') }}" alt="Logo" class="w-10 h-10 object-contain"> <span class="text-xl font-bold tracking-tight text-blue-900">LombaPeta</span>
                </a>
                <a href="/" class="text-sm font-medium text-slate-500 hover:text-blue-600 transition">← Kembali ke Beranda</a>
            </div>
        </div>
    </nav>

    <section class="flex-grow flex items-center py-12">
        <div class="max-w-[1440px] w-[92%] mx-auto">
            <div class="grid md:grid-cols-2 gap-16 lg:gap-24 items-center">

                <div class="space-y-8 hidden md:block">
                    <img id="hero-img" src="{{ asset('images/foto utama.png') }}" alt="Ilustrasi" class="w-full h-auto rounded-3xl shadow-sm border border-slate-100 transition-all duration-500">
                    <div id="hero-text">
                        <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight text-slate-900">
                            Satu Portal untuk <br><span class="text-blue-600" id="hero-highlight">Semua Prestasimu</span>
                        </h2>
                        <p class="text-lg text-slate-500 mt-4 max-w-lg">
                            Silakan masuk ke akun Anda atau daftar baru untuk menikmati seluruh fitur LombaPeta.
                        </p>
                    </div>
                </div>

                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl border border-slate-100 max-w-xl w-full mx-auto md:mx-0 animate-fade-in-up">

                    <div class="flex gap-6 mb-8 pb-4 border-b border-slate-100">
                        <button id="tab-login" onclick="setMode('login')" class="text-2xl font-bold text-blue-600 border-b-2 border-blue-600 pb-2 transition-all">Masuk</button>
                        <button id="tab-register" onclick="setMode('register')" class="text-2xl font-bold text-slate-400 hover:text-slate-600 pb-2 transition-all">Daftar Baru</button>
                    </div>

                    <form action="{{ route('auth.process') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold mb-3 text-slate-700">Masuk Sebagai</label>
                            <div class="grid grid-cols-3 gap-2 bg-slate-50 p-1.5 rounded-xl border border-slate-100">
                                <button type="button" id="btn-peserta" onclick="setRole('peserta')" class="py-2.5 rounded-lg text-sm font-bold bg-white text-blue-600 shadow-sm border border-slate-200 transition-all">Peserta</button>
                                <button type="button" id="btn-penyelenggara" onclick="setRole('penyelenggara')" class="py-2.5 rounded-lg text-sm font-medium text-slate-500 hover:bg-white hover:text-slate-800 transition-all">Penyelenggara</button>
                                <button type="button" id="btn-admin" onclick="setRole('admin')" class="py-2.5 rounded-lg text-sm font-medium text-slate-500 hover:bg-white hover:text-slate-800 transition-all">Admin</button>
                            </div>

                            <input type="hidden" name="role" id="input-role" value="peserta">
                            <input type="hidden" name="mode" id="input-mode" value="login">
                        </div>

                        <div id="field-nama" class="hidden">
                            <label class="block text-sm font-semibold mb-2 text-slate-700" id="label-nama">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Masukkan nama Anda" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition bg-slate-50 focus:bg-white">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700" id="label-email">Email / NISN</label>
                            <input type="text" name="email" placeholder="email@anda.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition bg-slate-50 focus:bg-white" id="input-email">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-700">Kata Sandi</label>
                            <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition bg-slate-50 focus:bg-white" id="input-password">
                        </div>

                        <div id="field-extras" class="flex justify-between items-center text-sm pt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-slate-600 font-medium">Ingat Saya</span>
                            </label>
                            <a href="#" class="text-blue-600 font-medium hover:underline" id="link-forgot">Lupa Kata Sandi?</a>
                        </div>

                        <button type="submit" id="btn-submit" class="w-full py-4 mt-4 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all text-lg hover:-translate-y-0.5 shadow-lg hover:shadow-blue-100 ">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentRole = 'peserta';
        let currentMode = 'login';

        const config = {
            peserta: { color: 'blue', labelEmail: 'Email Pelajar / NISN', placeholderEmail: 'pelajar@sekolah.com', labelName: 'Nama Lengkap Siswa' },
            penyelenggara: { color: 'emerald', labelEmail: 'Email Institusi Resmi', placeholderEmail: 'info@institusi.com', labelName: 'Nama Institusi / Organisasi' },
            admin: { color: 'slate', labelEmail: 'Username / Email Admin', placeholderEmail: 'admin@lombapeta.co.id', labelName: 'Nama Admin' }
        };

        function setMode(mode) {
            currentMode = mode;
            document.getElementById('input-mode').value = mode;

            const tabLogin = document.getElementById('tab-login');
            const tabRegister = document.getElementById('tab-register');
            const fieldNama = document.getElementById('field-nama');
            const fieldExtras = document.getElementById('field-extras');

            let activeColor = config[currentRole].color;
            let isHidden = tabRegister.classList.contains('hidden');

            if (mode === 'login') {
                tabLogin.className = `text-2xl font-bold border-b-2 pb-2 transition-all ${activeColor === 'emerald' ? 'text-emerald-600 border-emerald-600' : (activeColor === 'blue' ? 'text-blue-600 border-blue-600' : 'text-slate-800 border-slate-800')}`;
                tabRegister.className = `text-2xl font-bold text-slate-400 hover:text-slate-600 pb-2 transition-all ${isHidden ? 'hidden' : ''}`;

                fieldNama.classList.add('hidden');
                fieldExtras.classList.remove('hidden');
            } else {
                tabRegister.className = `text-2xl font-bold border-b-2 pb-2 transition-all ${activeColor === 'emerald' ? 'text-emerald-600 border-emerald-600' : (activeColor === 'blue' ? 'text-blue-600 border-blue-600' : 'text-slate-800 border-slate-800')} ${isHidden ? 'hidden' : ''}`;
                tabLogin.className = "text-2xl font-bold text-slate-400 hover:text-slate-600 pb-2 transition-all";

                fieldNama.classList.remove('hidden');
                fieldExtras.classList.add('hidden');
            }

            updateSubmitButton();
        }

        function setRole(role) {
            currentRole = role;
            document.getElementById('input-role').value = role;

            const roles = ['peserta', 'penyelenggara', 'admin'];
            let activeColor = config[role].color;

            // Handle register tab visibility for Admin
            if (role === 'admin') {
                if (currentMode === 'register') setMode('login');
                document.getElementById('tab-register').classList.add('hidden');
            } else {
                document.getElementById('tab-register').classList.remove('hidden');
            }

            roles.forEach(r => {
                const btn = document.getElementById(`btn-${r}`);
                if (r === role) {
                    if (activeColor === 'emerald') {
                        btn.className = "py-2.5 rounded-lg text-sm font-bold bg-white text-emerald-600 shadow-sm border border-slate-200 transition-all";
                    } else if (activeColor === 'blue') {
                        btn.className = "py-2.5 rounded-lg text-sm font-bold bg-white text-blue-600 shadow-sm border border-slate-200 transition-all";
                    } else {
                        btn.className = "py-2.5 rounded-lg text-sm font-bold bg-white text-slate-800 shadow-sm border border-slate-200 transition-all";
                    }
                } else {
                    btn.className = "py-2.5 rounded-lg text-sm font-medium text-slate-500 hover:bg-white hover:text-slate-800 transition-all border border-transparent";
                }
            });

            document.getElementById('label-email').innerText = config[role].labelEmail;
            document.getElementById('input-email').placeholder = config[role].placeholderEmail;
            document.getElementById('label-nama').innerText = config[role].labelName;

            if (activeColor === 'emerald') {
                document.getElementById('link-forgot').className = "text-emerald-600 font-medium hover:underline";
            } else if (activeColor === 'blue') {
                document.getElementById('link-forgot').className = "text-blue-600 font-medium hover:underline";
            } else {
                document.getElementById('link-forgot').className = "text-slate-800 font-medium hover:underline";
            }

            setMode(currentMode);
        }

        function updateSubmitButton() {
            const btn = document.getElementById('btn-submit');
            let activeColor = config[currentRole].color;
            let actionText = currentMode === 'login' ? 'Masuk' : 'Daftar';

            let roleText = currentRole.charAt(0).toUpperCase() + currentRole.slice(1);
            btn.innerText = `${actionText} sebagai ${roleText}`;

            if(activeColor === 'slate') {
                btn.className = "w-full py-4 mt-4 bg-slate-800 text-white rounded-xl font-bold shadow-lg shadow-slate-200 hover:bg-slate-900 transition-all text-lg";
            } else if (activeColor === 'emerald') {
                btn.className = "w-full py-4 mt-4 bg-emerald-600 text-white rounded-xl font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all text-lg";
            } else {
                btn.className = "w-full py-4 mt-4 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all text-lg hover:-translate-y-0.5 shadow-lg hover:shadow-blue-100 ";
            }
        }

        setRole('peserta');
    </script>

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
</body>
</html>
