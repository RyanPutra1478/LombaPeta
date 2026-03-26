# 🏆 LombaPeta - Platform Manajemen Kompetisi Nasional

**Live Demo**: [https://adorable-gratitude-production.up.railway.app/](https://adorable-gratitude-production.up.railway.app/)

LombaPeta adalah platform web modern yang dirancang untuk menjadi pusat informasi, pendaftaran, dan pengelolaan kompetisi nasional di Indonesia. Dibangun dengan estetika premium dan performa tinggi untuk memberikan pengalaman terbaik bagi peserta maupun penyelenggara.

---

## 🚀 Teknologi yang Digunakan
- **Framework**: Laravel 12
- **Styling**: Tailwind CSS v4 (Modern Engine)
- **Interactivity**: Alpine.js
- **Database**: MySQL / MariaDB

---

## ✨ Fitur Utama

### 1. Multi-Role System
Sistem memiliki 3 role utama dengan dashboard yang berbeda-beda:
- **Peserta**: Mencari lomba, memfavoritkan, dan melakukan pendaftaran.
- **Penyelenggara**: Mengunggah info lomba, mengelola pendaftar, dan melihat statistik.
- **Admin**: Pusat kendali sistem, memverifikasi lomba yang baru diunggah sebelum terbit ke publik.

### 2. Eksplorasi Pintar
Fitur pencarian dan filter lomba berdasarkan kategori (Sains, Seni, E-Sports, dll), tingkat pendidikan (SD, SMP, SMA, Universitas), serta lokasi.

### 3. Glassmorphism UI
Antarmuka pengguna yang modern dengan efek kaca yang elegan, responsif di semua perangkat (Mobile & Desktop).

---

## 🔑 Kredensial Uji Coba (Demo)
Gunakan akun di bawah ini untuk mencoba seluruh fitur sistem:

| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin@lombapeta.com` | `password` |
| **Penyelenggara** | `penyelenggara@lombapeta.com` | `password` |
| **Peserta** | `peserta@lombapeta.com` | `password` |

*Catatan: Pastikan Anda memilih tab role yang sesuai pada halaman Login.*

---

## 🛠️ Instalasi Lokal

1. **Clone Repository**
   ```bash
   git clone https://github.com/RyanPutra1478/LombaPeta.git
   cd LombaPeta
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   Salin file `.env.example` menjadi `.env` dan atur koneksi database Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migration & Seeding**
   Jalankan perintah ini untuk membuat tabel dan mengisi data awal (termasuk kredensial di atas).
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Run Server**
   ```bash
   php artisan serve
   ```

---

## 🎨 Design System
LombaPeta mengusung tema **"Premium Blue & White"** dengan aksen degradasi modern. Seluruh desain difokuskan pada kejelasan informasi dan kemudahan navigasi.

