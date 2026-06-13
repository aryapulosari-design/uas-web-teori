<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penulis;
use App\Models\KategoriArtikel;
use App\Models\Artikel;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // PENULIS
        // ==========================================
        $penulis1 = Penulis::create([
            'nama_lengkap' => 'Arya Kharisudin Irfani',
            'email' => 'arya@blog.com',
            'password' => bcrypt('password'),
            'foto' => null,
        ]);

        $penulis2 = Penulis::create([
            'nama_lengkap' => 'Budi Santoso',
            'email' => 'budi@blog.com',
            'password' => bcrypt('password'),
            'foto' => null,
        ]);

        $penulis3 = Penulis::create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email' => 'siti@blog.com',
            'password' => bcrypt('password'),
            'foto' => null,
        ]);

        // ==========================================
        // KATEGORI ARTIKEL
        // ==========================================
        $kategoriTeknologi = KategoriArtikel::create(['nama_kategori' => 'Teknologi']);
        $kategoriPendidikan = KategoriArtikel::create(['nama_kategori' => 'Pendidikan']);
        $kategoriKesehatan = KategoriArtikel::create(['nama_kategori' => 'Kesehatan']);
        $kategoriOlahraga = KategoriArtikel::create(['nama_kategori' => 'Olahraga']);

        // ==========================================
        // ARTIKEL
        // ==========================================
        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategoriTeknologi->id,
            'judul' => 'Mengenal Artificial Intelligence dan Dampaknya di Kehidupan Sehari-hari',
            'gambar' => 'artikel_ai.png',
            'isi' => 'Artificial Intelligence (AI) atau kecerdasan buatan adalah cabang ilmu komputer yang berfokus pada pembuatan mesin yang mampu berpikir dan belajar seperti manusia. Teknologi AI telah berkembang pesat dalam beberapa tahun terakhir dan telah mengubah berbagai aspek kehidupan kita. Dari asisten virtual seperti Siri dan Google Assistant hingga sistem rekomendasi di platform streaming, AI telah menjadi bagian tak terpisahkan dari kehidupan modern. Dalam dunia kesehatan, AI digunakan untuk mendiagnosis penyakit dengan lebih akurat. Di bidang transportasi, mobil otonom menggunakan AI untuk navigasi. Bahkan di sektor pendidikan, AI membantu personalisasi pembelajaran untuk setiap siswa. Meskipun membawa banyak manfaat, AI juga menimbulkan tantangan seperti masalah privasi data dan potensi penggantian pekerjaan manusia.',
            'hari_tanggal' => 'Senin, 09 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategoriPendidikan->id,
            'judul' => 'Tips Efektif Belajar Pemrograman untuk Pemula',
            'gambar' => 'artikel_programming.png',
            'isi' => 'Belajar pemrograman bisa menjadi tantangan besar bagi pemula, namun dengan pendekatan yang tepat, siapa pun bisa menguasainya. Pertama, pilih satu bahasa pemrograman dan fokus mempelajarinya hingga paham konsep dasarnya. PHP, Python, atau JavaScript adalah pilihan yang bagus untuk pemula. Kedua, praktik adalah kunci utama. Jangan hanya membaca teori, tetapi langsung tulis kode setiap hari. Ketiga, manfaatkan sumber belajar online seperti YouTube, Coursera, atau dokumentasi resmi. Keempat, bergabunglah dengan komunitas programmer untuk saling berdiskusi dan belajar. Kelima, mulailah dengan proyek kecil seperti membuat kalkulator atau to-do list, kemudian tingkatkan kompleksitasnya secara bertahap. Ingat, setiap programmer hebat pernah menjadi pemula.',
            'hari_tanggal' => 'Selasa, 10 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis3->id,
            'id_kategori' => $kategoriKesehatan->id,
            'judul' => 'Pentingnya Menjaga Kesehatan Mental di Era Digital',
            'gambar' => 'artikel_mental_health.png',
            'isi' => 'Di era digital yang serba cepat ini, kesehatan mental menjadi isu yang semakin penting untuk diperhatikan. Penggunaan media sosial yang berlebihan, tekanan pekerjaan, dan gaya hidup yang tidak seimbang dapat berdampak negatif pada kesehatan mental seseorang. Beberapa cara yang bisa dilakukan untuk menjaga kesehatan mental antara lain: membatasi waktu penggunaan gadget, rutin berolahraga minimal 30 menit sehari, tidur yang cukup 7-8 jam per malam, menjaga hubungan sosial dengan orang-orang terdekat, serta tidak ragu untuk berkonsultasi dengan profesional jika merasa membutuhkan bantuan. Meditasi dan mindfulness juga terbukti efektif dalam mengurangi stres dan kecemasan. Ingat, kesehatan mental sama pentingnya dengan kesehatan fisik.',
            'hari_tanggal' => 'Rabu, 11 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategoriTeknologi->id,
            'judul' => 'Laravel: Framework PHP Terbaik untuk Pengembangan Web Modern',
            'gambar' => 'artikel_laravel.png',
            'isi' => 'Laravel adalah framework PHP yang paling populer dan banyak digunakan oleh developer di seluruh dunia. Diciptakan oleh Taylor Otwell pada tahun 2011, Laravel menawarkan sintaks yang elegan dan ekspresif, memudahkan proses pengembangan aplikasi web. Fitur-fitur unggulan Laravel meliputi Eloquent ORM untuk manajemen database, Blade templating engine untuk membuat tampilan, sistem routing yang fleksibel, middleware untuk keamanan, serta Artisan CLI untuk otomasi tugas-tugas pengembangan. Laravel juga memiliki ekosistem yang lengkap dengan tools seperti Laravel Forge, Vapor, dan Nova. Dengan dokumentasi yang sangat baik dan komunitas yang besar, Laravel menjadi pilihan ideal untuk membangun aplikasi web dari yang sederhana hingga enterprise.',
            'hari_tanggal' => 'Kamis, 12 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategoriOlahraga->id,
            'judul' => 'Manfaat Olahraga Rutin untuk Produktivitas Kerja',
            'gambar' => 'artikel_olahraga.png',
            'isi' => 'Olahraga rutin tidak hanya bermanfaat untuk kesehatan fisik, tetapi juga dapat meningkatkan produktivitas kerja secara signifikan. Penelitian menunjukkan bahwa orang yang berolahraga secara teratur memiliki tingkat konsentrasi yang lebih baik, kreativitas yang lebih tinggi, dan kemampuan mengelola stres yang lebih baik. Olahraga melepaskan endorfin yang membuat suasana hati menjadi lebih baik dan meningkatkan energi sepanjang hari. Tidak perlu olahraga berat, cukup dengan jalan kaki 30 menit, jogging ringan, atau bersepeda sudah memberikan dampak positif. Banyak perusahaan besar kini menyediakan fasilitas gym dan program kesehatan untuk karyawannya karena menyadari hubungan erat antara kebugaran fisik dan produktivitas kerja.',
            'hari_tanggal' => 'Jumat, 13 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis3->id,
            'id_kategori' => $kategoriPendidikan->id,
            'judul' => 'Peran Teknologi dalam Transformasi Pendidikan Indonesia',
            'gambar' => 'artikel_edukasi.png',
            'isi' => 'Teknologi telah membawa perubahan besar dalam dunia pendidikan Indonesia. Sejak pandemi COVID-19, pembelajaran online menjadi hal yang lumrah dan mendorong percepatan adopsi teknologi di sektor pendidikan. Platform e-learning, video conference, dan aplikasi pembelajaran interaktif kini menjadi alat bantu yang tidak terpisahkan dari proses belajar mengajar. Pemerintah juga telah meluncurkan berbagai program digitalisasi pendidikan, termasuk penyediaan infrastruktur internet di daerah terpencil. Meskipun masih ada tantangan seperti kesenjangan akses teknologi antara daerah perkotaan dan pedesaan, potensi teknologi untuk meningkatkan kualitas pendidikan di Indonesia sangatlah besar. Dengan kolaborasi antara pemerintah, institusi pendidikan, dan sektor swasta, transformasi digital pendidikan Indonesia akan terus berkembang.',
            'hari_tanggal' => 'Jumat, 13 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kategoriKesehatan->id,
            'judul' => 'Pola Makan Sehat untuk Mahasiswa dengan Budget Terbatas',
            'gambar' => 'artikel_makanan.png',
            'isi' => 'Menjaga pola makan sehat sebagai mahasiswa dengan budget terbatas memang bukan hal yang mudah, namun bukan berarti mustahil. Kunci utamanya adalah perencanaan dan pemilihan bahan makanan yang tepat. Beras merah, telur, tempe, tahu, dan sayuran lokal seperti bayam, kangkung, dan wortel adalah contoh makanan bergizi tinggi dengan harga terjangkau. Memasak sendiri di kos juga jauh lebih hemat dibandingkan makan di luar. Hindari junk food dan minuman manis kemasan yang selain mahal juga tidak sehat. Pastikan untuk minum air putih minimal 8 gelas sehari. Mengatur jadwal makan yang teratur — sarapan, makan siang, dan makan malam — juga penting untuk menjaga metabolisme tubuh tetap optimal selama menjalani aktivitas perkuliahan yang padat.',
            'hari_tanggal' => 'Kamis, 12 Juni 2026',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $kategoriTeknologi->id,
            'judul' => 'Keamanan Siber: Ancaman dan Cara Melindungi Data Pribadi',
            'gambar' => 'artikel_cybersecurity.png',
            'isi' => 'Di era digital, keamanan siber menjadi isu kritis yang harus dipahami oleh semua pengguna internet. Serangan siber seperti phishing, malware, ransomware, dan pencurian identitas semakin canggih dan menargetkan individu maupun organisasi. Untuk melindungi data pribadi, ada beberapa langkah yang bisa dilakukan: gunakan password yang kuat dan unik untuk setiap akun, aktifkan autentikasi dua faktor (2FA), perbarui perangkat lunak secara berkala, waspada terhadap email dan link mencurigakan, serta gunakan VPN saat mengakses WiFi publik. Backup data secara rutin juga sangat penting untuk mengantisipasi kehilangan data akibat serangan ransomware. Dengan kesadaran dan langkah pencegahan yang tepat, kita dapat meminimalkan risiko menjadi korban kejahatan siber.',
            'hari_tanggal' => 'Rabu, 11 Juni 2026',
        ]);
    }
}
