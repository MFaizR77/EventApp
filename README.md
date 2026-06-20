# EventApp

EventApp adalah aplikasi web sederhana berbasis Laravel untuk mengelola pendaftaran event. Proyek ini dibuat untuk memenuhi persyaratan tes teknis Web Developer.

## Fitur Utama

- Autentikasi menggunakan Laravel Breeze (Login, Register, Logout).
- Pembagian hak akses (role) untuk membedakan antara Admin dan User biasa.
- Panel Admin untuk mengelola event (CRUD: Create, Read, Update, Delete) pada rute /admin/events.
- Halaman daftar event publik dan detail event bagi semua pengunjung.
- Pendaftaran event bagi user terdaftar dengan email konfirmasi otomatis (konfigurasi Mailtrap Sandbox).
- Dashboard User untuk melihat statistik dan daftar event yang diikuti (menggunakan Laravel Query Builder).

## Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite3 (PHP PDO SQLite extension)

## Langkah Setup

1. Masuk ke direktori proyek.
2. Install dependensi PHP (Composer):
   ```bash
   composer install
   ```
3. Install dependensi Node (NPM) dan lakukan build asset:
   ```bash
   npm install
   npm run build
   ```
4. Salin file konfigurasi env:
   ```bash
   cp .env.example .env
   ```
   *Catatan: File .env sudah dikonfigurasi menggunakan SQLite database secara default dan menyertakan SMTP Mailtrap untuk pengiriman email.*
5. Jalankan migrasi database beserta seeder untuk data dummy:
   ```bash
   php artisan migrate:fresh --seed
   ```
6. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui browser di `http://127.0.0.1:8000`.

## Akun Pengujian (Seeder)

- **Admin (Kelola CRUD Event):**
  - Email: admin@eventapp.com
  - Password: password

- **User Biasa (Daftar Event & Dashboard):**
  - Email: user@eventapp.com
  - Password: password
