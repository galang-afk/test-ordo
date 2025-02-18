# Laravel API Project

## Repository

Repositori publik untuk proyek ini tersedia di: [GitHub - NamaRepo](https://github.com/username/NamaRepo)

## Instalasi dan Setup

### Persyaratan

- PHP ^8.0
- Composer
- Laravel ^11
- MySQL

### Langkah Instalasi

1. Clone repositori:
   ```sh
   git clone https://github.com/username/NamaRepo.git
   cd NamaRepo
   ```
2. Instal dependensi dengan Composer:
   ```sh
   composer install
   ```
3. Instal Node modules dan run build:
   ```sh
   npm install && npm run build
   ```
4. Buat file `.env` dari `.env.example` dan sesuaikan konfigurasi database:
   ```sh
   cp .env.example .env
   ```
5. Generate key aplikasi:
   ```sh
   php artisan key:generate
   ```
6. Jalankan migrasi database:
   ```sh
   php artisan migrate
   ```
7. Jalankan server:
   ```sh
   composer run dev
   ```

## Menjalankan Unit Test

1. Jalankan perintah berikut untuk menjalankan seluruh unit test:
   ```sh
   php artisan test
   ```