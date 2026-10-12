# Aplikasi Pengelolaan Data Peserta Sertifikasi

Aplikasi ini dibuat untuk tugas praktik demonstrasi Junior Web Developer.
Fungsinya untuk mengelola data peserta dan skema sertifikasi.

## Teknologi yang dipakai

- PHP
- Laravel 10
- MySQL
- Bootstrap 5

Autentikasi dibuat manual (tidak pakai Breeze).

## Fitur

- Login & logout
- Dashboard (tampil total peserta, skema, dan user)
- CRUD data peserta (tambah, edit, hapus, detail, cari)
- CRUD data skema sertifikasi
- Relasi antara peserta dan skema
- Validasi form
- Role admin dan user
  - Admin bisa kelola semua data + kelola user
  - User biasa cuma bisa lihat data

## Cara menjalankan

1. Extract project ini
2. Buka terminal di folder project
3. Jalankan:

composer install

Kalau kena error security advisory, pakai:

composer config audit.block-insecure false
composer install

4. Copy file .env:

copy .env.example .env

5. Generate key:

php artisan key:generate

6. Atur database di file .env
7. Buat database di MySQL / phpMyAdmin dulu
8. Migrasi + isi data awal:

php artisan migrate:fresh --seed

9. Jalankan:

php artisan serve

10. Buka di browser: http://127.0.0.1:8000

## Akun untuk login

Admin:
- email: admin@gmail.com
- password: admin123

User:
- email: user@gmail.com
- password: user123

## Catatan

Kalau sebelumnya sudah pernah migrate dan error kolom role tidak ditemukan, pakai migrate:fresh --seed biar tabelnya dibuat ulang dari awal.