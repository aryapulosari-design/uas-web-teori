# Aplikasi Blog — Sistem Manajemen Blog (CMS)

**UAS Mata Kuliah Pemrograman Web — Semester Genap 2025/2026**

---

## Identitas Mahasiswa

| | |
|---|---|
| **Nama Lengkap** | Arya Kharisudin Irfani |
| **NIM** | 240605110227 |

---

## Deskripsi Aplikasi

Aplikasi Blog adalah sebuah **Sistem Manajemen Blog (CMS)** berbasis web yang dibangun menggunakan framework **Laravel 13**. Aplikasi ini memiliki dua bagian utama:

### 1. Halaman CMS (Admin Dashboard)
Halaman CMS hanya dapat diakses oleh penulis yang sudah login melalui sistem autentikasi. Fitur yang tersedia meliputi:
- **Dashboard** — Menampilkan ringkasan statistik berupa total artikel, total penulis, total kategori, serta daftar 5 artikel terbaru.
- **Manajemen Penulis (CRUD)** — Menambah, melihat, mengedit, dan menghapus data penulis lengkap dengan foto profil.
- **Manajemen Kategori Artikel (CRUD)** — Menambah, mengedit, dan menghapus kategori artikel.
- **Manajemen Artikel (CRUD)** — Menambah, melihat, mengedit, dan menghapus artikel lengkap dengan gambar, kategori, dan penulis.

### 2. Halaman Pengunjung (Publik)
Halaman publik dapat diakses oleh siapa saja tanpa perlu login. Fitur yang tersedia meliputi:
- **Halaman Utama / Beranda** — Menampilkan 5 artikel terbaru dalam bentuk card yang berisi gambar, kategori, judul, nama penulis, tanggal publikasi, dan cuplikan isi artikel. Terdapat tombol "Baca Selengkapnya" untuk menuju halaman detail.
- **Widget Kategori (Sidebar)** — Menampilkan semua kategori beserta jumlah artikel di masing-masing kategori. Pengunjung dapat memfilter artikel berdasarkan kategori yang dipilih.
- **Halaman Detail Artikel** — Menampilkan isi lengkap artikel beserta breadcrumb navigasi, informasi penulis, dan tanggal publikasi.
- **Widget Artikel Terkait** — Menampilkan maksimal 5 artikel lain dari kategori yang sama pada sidebar halaman detail artikel.

---

## Teknologi yang Digunakan

| Teknologi | Versi / Keterangan |
|---|---|
| **PHP** | >= 8.3 |
| **Laravel** | 13.x |
| **Database** | MySQL (`db_blog`) |
| **Frontend** | Blade Template + Bootstrap 5 (CDN) |
| **Build Tool** | Vite |
| **Local Server** | Laragon |

---

## Struktur Database

Aplikasi ini menggunakan 4 tabel utama:

| Tabel | Kolom Utama | Keterangan |
|---|---|---|
| `users` | id, name, email, password | Tabel user bawaan Laravel |
| `penulis` | id, nama_lengkap, email, password, foto | Data penulis blog |
| `kategori_artikel` | id, nama_kategori | Kategori untuk pengelompokan artikel |
| `artikel` | id, id_penulis, id_kategori, judul, gambar, isi, hari_tanggal | Data artikel blog |

### Relasi Antar Tabel
- **Penulis** → memiliki banyak **Artikel** (One-to-Many)
- **Kategori Artikel** → memiliki banyak **Artikel** (One-to-Many)
- **Artikel** → milik satu **Penulis** dan satu **Kategori Artikel**

---

## Struktur Route

### Route Publik (Tanpa Autentikasi)
| Method | URL | Controller | Fungsi |
|---|---|---|---|
| GET | `/` | PublikController@index | Halaman utama / beranda |
| GET | `/beranda` | PublikController@index | Alias halaman utama |
| GET | `/artikel/{id}` | PublikController@show | Halaman detail artikel |

### Route Autentikasi
| Method | URL | Controller | Fungsi |
|---|---|---|---|
| GET | `/login` | LoginController@index | Halaman login |
| POST | `/login` | LoginController@authenticate | Proses login |
| POST | `/logout` | LoginController@logout | Proses logout |

### Route CMS / Dashboard (Dilindungi Middleware `auth`)
| Method | URL | Controller | Fungsi |
|---|---|---|---|
| GET | `/dashboard` | DashboardController@index | Halaman dashboard |
| RESOURCE | `/dashboard/penulis` | PenulisController | CRUD penulis |
| RESOURCE | `/dashboard/kategori_artikel` | KategoriArtikelController | CRUD kategori artikel |
| RESOURCE | `/dashboard/artikel` | ArtikelController | CRUD artikel |

---

## Langkah-Langkah Menjalankan Aplikasi Secara Lokal

### Prasyarat
- PHP >= 8.3
- Composer
- Node.js & NPM
- MySQL
- Git

### Langkah Instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/[username]/uas-web-teori.git
   cd uas-web-teori
   ```

2. **Install dependensi PHP**
   ```bash
   composer install
   ```

3. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi database**

   Buka file `.env` dan sesuaikan konfigurasi database:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Buat database `db_blog`** di MySQL, kemudian jalankan migrasi:
   ```bash
   php artisan migrate
   ```

7. **Buat symbolic link untuk storage**
   ```bash
   php artisan storage:link
   ```

8. **Install dependensi JavaScript**
   ```bash
   npm install
   ```

9. **Build asset frontend**
   ```bash
   npm run build
   ```

10. **Jalankan server**
    ```bash
    php artisan serve
    ```

11. **Akses aplikasi** di browser pada alamat:
    ```
    http://localhost:8000
    ```

> **Alternatif:** Jika menggunakan Laragon, cukup letakkan folder proyek di `C:\laragon\www\` dan akses melalui `http://uas-web-teori.test`.

---

## Tautan Video YouTube

🎥 **Video Demonstrasi:** [Masukkan link video YouTube di sini]

---

## Screenshot Aplikasi

### Halaman Publik
- Halaman Utama / Beranda — Menampilkan daftar artikel terbaru & widget kategori
- Halaman Detail Artikel — Menampilkan isi lengkap artikel & artikel terkait

### Halaman CMS (Dashboard)
- Dashboard — Statistik & artikel terbaru
- Manajemen Penulis — CRUD data penulis
- Manajemen Kategori — CRUD kategori artikel
- Manajemen Artikel — CRUD artikel

---

## Lisensi

Proyek ini dibuat untuk memenuhi tugas **Ujian Akhir Semester (UAS)** mata kuliah **Pemrograman Web** — Semester Genap 2025/2026.
