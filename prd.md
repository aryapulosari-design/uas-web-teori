# Product Requirements Document (PRD)
## Halaman Pengunjung — Sistem Manajemen Blog (CMS)
### UAS Mata Kuliah Pemrograman Web | Semester Genap 2025/2026

---

## 1. Latar Belakang

Sistem Manajemen Blog (CMS) yang dibangun pada Modul 10 sudah memiliki fitur pengelolaan konten secara lengkap — artikel, penulis, dan kategori artikel — melalui antarmuka yang hanya bisa diakses oleh penulis yang sudah login.

**Masalah:** Konten yang dikelola melalui CMS belum bisa dikunjungi oleh pengunjung umum karena belum ada halaman publik.

**Solusi:** Menambahkan dua halaman pengunjung yang dapat diakses siapa saja tanpa perlu login, dibangun di dalam proyek `aplikasi-blog` yang sama.

---

## 2. Tujuan Produk

| Tujuan | Keterangan |
|--------|------------|
| Membuka konten ke publik | Pengunjung bisa membaca artikel tanpa login |
| Filter per kategori | Pengunjung bisa menyaring artikel berdasarkan kategori |
| Halaman detail artikel | Pengunjung bisa membaca isi lengkap artikel |
| Artikel terkait | Mempermudah pengunjung menemukan konten sejenis |

---

## 3. Prasyarat

- Proyek `aplikasi-blog` dari Modul 10 harus sudah selesai dan berfungsi dengan benar.
- Database `db_blog` beserta seluruh tabel (`penulis`, `kategori_artikel`, `artikel`) sudah tersedia dan terisi data yang cukup.
- Symbolic link storage sudah dibuat (`php artisan storage:link`).
- Tidak diperkenankan membuat proyek Laravel baru.
- Tidak diperkenankan mengubah struktur tabel yang sudah ada.

---

## 4. Ruang Lingkup

### Yang termasuk (In Scope)
- Halaman utama pengunjung (daftar 5 artikel terbaru + widget kategori)
- Halaman detail artikel (isi lengkap + widget artikel terkait)
- Filter artikel berdasarkan kategori
- Layout Blade tersendiri untuk halaman pengunjung
- Controller tersendiri terpisah dari Controller CMS

### Yang tidak termasuk (Out of Scope)
- Fitur komentar atau interaksi pengunjung
- Sistem autentikasi pengunjung
- Perubahan pada halaman CMS (Modul 10)
- Perubahan struktur database

---

## 5. Spesifikasi Fitur

### 5.1 Halaman Utama Pengunjung

**Route:** `GET /` atau `GET /beranda`
**Akses:** Publik — tidak dilindungi middleware `auth`
**Controller:** Controller baru, terpisah dari Controller CMS

#### Konten Utama (Kolom Kiri)
- Menampilkan **5 artikel terbaru** diurutkan dari yang paling baru
- Setiap card artikel menampilkan:
  - Gambar artikel (dari `storage/gambar/`)
  - Badge/label nama kategori artikel
  - Judul artikel
  - Avatar + nama lengkap penulis + tanggal publikasi (`hari_tanggal`)
  - Cuplikan isi artikel (teks dipotong)
  - Tombol **"Baca Selengkapnya →"** yang mengarah ke halaman detail

#### Widget Sidebar (Kolom Kanan) — Kategori Artikel
- Menampilkan **semua kategori** yang tersedia
- Setiap item kategori menampilkan nama kategori + jumlah artikel di kategori tersebut
- Terdapat item **"Semua Artikel"** dengan total jumlah seluruh artikel
- Mengklik salah satu kategori akan menyaring artikel di kolom kiri
- Kategori yang sedang aktif ditampilkan dengan tampilan berbeda (highlight)

#### Fitur Filter Kategori
- Ketika kategori dipilih, halaman memuat ulang dan hanya menampilkan artikel dari kategori tersebut
- Filter dikirim melalui query string, contoh: `?kategori=2`
- Jika tidak ada filter aktif, tampilkan 5 artikel terbaru dari semua kategori

---

### 5.2 Halaman Detail Artikel

**Route:** `GET /artikel/{id}`
**Akses:** Publik — tidak dilindungi middleware `auth`
**Controller:** Controller yang sama dengan halaman utama

#### Konten Utama (Kolom Kiri)
- Breadcrumb navigasi: `Beranda / [Nama Kategori] / [Judul Artikel]`
- Gambar artikel ukuran penuh
- Badge nama kategori
- Judul artikel (heading besar)
- Avatar + nama lengkap penulis + tanggal dan waktu publikasi
- Isi lengkap artikel

#### Widget Sidebar (Kolom Kanan) — Artikel Terkait
- Judul widget: **"Artikel Terkait"**
- Menampilkan **5 artikel terkait** dari kategori yang sama (kecuali artikel yang sedang dibuka)
- Setiap item menampilkan: thumbnail gambar kecil, judul artikel, tanggal publikasi
- Mengklik artikel terkait membuka halaman detail artikel yang bersangkutan

#### Navigasi
- Terdapat tautan **"Kembali ke Beranda"** yang mengarah ke halaman utama

---

## 6. Arsitektur Teknis

### 6.1 Controller
```
app/Http/Controllers/
├── (Controller CMS - sudah ada dari Modul 10)
│   ├── ArtikelController.php
│   ├── PenulisController.php
│   └── KategoriArtikelController.php
└── PublikController.php   ← Controller baru untuk halaman pengunjung
```

Method yang dibutuhkan di `PublikController`:
| Method | Route | Fungsi |
|--------|-------|--------|
| `index()` | `GET /` | Halaman utama, daftar artikel + filter kategori |
| `show($id)` | `GET /artikel/{id}` | Halaman detail artikel |

### 6.2 Route
Tambahkan di `routes/web.php` **di luar** Route group middleware `auth`:

```php
use App\Http\Controllers\PublikController;

Route::get('/', [PublikController::class, 'index'])->name('publik.index');
Route::get('/artikel/{id}', [PublikController::class, 'show'])->name('publik.show');
```

### 6.3 Layout Blade
```
resources/views/
├── layouts/
│   ├── app.blade.php       ← Layout CMS (sudah ada)
│   └── publik.blade.php    ← Layout baru untuk halaman pengunjung
└── publik/
    ├── index.blade.php     ← View halaman utama
    └── show.blade.php      ← View halaman detail
```

### 6.4 Query Eloquent yang Dibutuhkan

**Halaman Utama — tanpa filter:**
```php
Artikel::with('penulis', 'kategori')
    ->orderBy('id', 'desc')
    ->take(5)
    ->get();
```

**Halaman Utama — dengan filter kategori:**
```php
Artikel::with('penulis', 'kategori')
    ->where('id_kategori', $idKategori)
    ->orderBy('id', 'desc')
    ->take(5)
    ->get();
```

**Semua kategori + jumlah artikel (untuk widget):**
```php
KategoriArtikel::withCount('artikel')
    ->orderBy('nama_kategori', 'asc')
    ->get();
```

**Artikel terkait (untuk widget halaman detail):**
```php
Artikel::with('penulis')
    ->where('id_kategori', $artikel->id_kategori)
    ->where('id', '!=', $artikel->id)
    ->orderBy('id', 'desc')
    ->take(5)
    ->get();
```

---

## 7. Ketentuan Tampilan

### Layout Publik (`layouts/publik.blade.php`)
- Navbar atas dengan: nama blog, link Beranda, Artikel, Kategori, Tentang
- Footer dengan teks copyright
- Tema warna konsisten dengan CMS Modul 10 (dark navbar, warna hijau sebagai aksen)
- Bisa menggunakan Bootstrap 5 (CDN sudah dipakai di Modul 10)
- Tampilan bersih, sederhana, dan elegan

### Ketentuan Visual Lainnya
- Gambar artikel menggunakan path: `asset('storage/gambar/' . $item->gambar)`
- Avatar penulis menggunakan path: `asset('storage/foto/' . $item->penulis->foto)`
- Teks isi artikel di halaman utama dipotong (cukup tampilkan beberapa kalimat pertama)
- Kategori aktif di widget harus terlihat berbeda secara visual

---

## 8. Ketentuan Keamanan & Akses

| Halaman | Middleware | Keterangan |
|---------|------------|------------|
| Halaman utama pengunjung | Tidak ada | Publik, siapa saja bisa akses |
| Halaman detail artikel | Tidak ada | Publik, siapa saja bisa akses |
| Seluruh halaman CMS | `auth` | Hanya penulis yang sudah login |

---

## 9. Ketentuan Pengumpulan

### Repositori GitHub
- Bersifat publik
- Nama format: `aplikasi-blog-[nim]` → contoh: `aplikasi-blog-123456`
- File `.env` **tidak boleh** ikut di-commit (sudah ada di `.gitignore`)
- Wajib menyertakan `README.md` berisi:
  - Nama lengkap dan NIM
  - Deskripsi singkat aplikasi
  - Langkah-langkah menjalankan aplikasi secara lokal
  - Tautan video YouTube demonstrasi

### Video YouTube
- Bersifat publik atau unlisted
- Durasi **maksimal 10 menit**
- Urutan demonstrasi wajib:
  1. Tampilkan halaman CMS → lakukan create, update, delete untuk penulis, kategori, dan artikel
  2. Buka halaman utama pengunjung → tampilkan 5 artikel terbaru
  3. Klik salah satu kategori → pastikan artikel tersaring dengan benar
  4. Klik tombol "Baca Selengkapnya" → pastikan halaman detail tampil benar
  5. Pastikan widget artikel terkait menampilkan artikel dari kategori yang sama
  6. Klik salah satu artikel terkait → pastikan halaman detail artikel yang sesuai muncul
  7. Klik "Kembali ke Beranda" → pastikan kembali ke halaman utama

---

## 10. Batas Waktu

| Item | Tenggat |
|------|---------|
| Pengumpulan GitHub + YouTube | **Sabtu, 13 Juni 2026 pukul 23.59 WIB** |
| Platform pengumpulan | Google Classroom |

---

## 11. Checklist Sebelum Submit

- [ ] Modul 10 sudah selesai dan berjalan tanpa error
- [ ] Database `db_blog` terisi data yang cukup (minimal 5+ artikel dari 2+ kategori)
- [ ] `PublikController.php` dibuat terpisah dari Controller CMS
- [ ] Layout `publik.blade.php` dibuat terpisah dari `app.blade.php`
- [ ] Route halaman pengunjung **tidak** menggunakan middleware `auth`
- [ ] Halaman utama menampilkan 5 artikel terbaru dengan benar
- [ ] Filter kategori berfungsi (artikel tersaring sesuai kategori yang dipilih)
- [ ] Halaman detail menampilkan isi lengkap artikel
- [ ] Widget artikel terkait menampilkan artikel dari kategori yang sama
- [ ] Navigasi "Kembali ke Beranda" berfungsi
- [ ] File `.env` tidak ikut di-commit ke GitHub
- [ ] `README.md` sudah lengkap di repositori
- [ ] Video YouTube sudah terupload dan linknya valid
- [ ] Kedua tautan sudah dikumpulkan di Google Classroom sebelum deadline

---

*Dokumen ini dibuat berdasarkan Modul 10 Pemrograman Web dan Soal UAS Semester Genap 2025/2026.*
