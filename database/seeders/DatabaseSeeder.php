<?php

namespace Database\Seeders;

use App\Models\Penulis;
use App\Models\KategoriArtikel;
use App\Models\Artikel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Penulis
        $penulis1 = Penulis::create([
            'nama_lengkap' => 'Ahmad Fauzi',
            'email' => 'ahmad@blog.com',
            'password' => bcrypt('password'),
            'foto' => 'avatar1.jpg',
        ]);

        $penulis2 = Penulis::create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email' => 'siti@blog.com',
            'password' => bcrypt('password'),
            'foto' => 'avatar2.jpg',
        ]);

        // Buat Kategori
        $teknologi = KategoriArtikel::create(['nama_kategori' => 'Teknologi']);
        $pendidikan = KategoriArtikel::create(['nama_kategori' => 'Pendidikan']);
        $kesehatan = KategoriArtikel::create(['nama_kategori' => 'Kesehatan']);
        $wisata = KategoriArtikel::create(['nama_kategori' => 'Wisata']);

        // Buat Artikel
        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $teknologi->id,
            'judul' => 'Perkembangan Artificial Intelligence di Tahun 2026',
            'gambar' => 'ai.jpg',
            'isi' => 'Artificial Intelligence (AI) terus berkembang pesat di tahun 2026. Berbagai inovasi baru bermunculan di berbagai sektor, mulai dari kesehatan, pendidikan, hingga industri manufaktur. Teknologi AI generatif kini mampu menghasilkan konten yang semakin realistis dan bermanfaat untuk berbagai kebutuhan bisnis dan kreatif.

Salah satu perkembangan paling signifikan adalah kemampuan AI dalam memahami konteks dan nuansa bahasa manusia dengan lebih baik. Model-model bahasa besar (Large Language Models) kini dapat memberikan respons yang lebih akurat dan relevan, membuat interaksi manusia-mesin menjadi lebih natural.

Di bidang kesehatan, AI telah membantu dalam diagnosa penyakit dengan tingkat akurasi yang semakin tinggi. Sistem AI dapat menganalisis gambar medis, data genetik, dan riwayat kesehatan pasien untuk memberikan rekomendasi pengobatan yang lebih personal dan efektif.',
            'hari_tanggal' => 'Senin, 09 Juni 2026 10:00',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $pendidikan->id,
            'judul' => 'Transformasi Digital dalam Dunia Pendidikan Indonesia',
            'gambar' => 'edu.jpg',
            'isi' => 'Transformasi digital telah mengubah wajah pendidikan di Indonesia secara signifikan. Penggunaan platform pembelajaran online, video conference, dan aplikasi edukasi interaktif kini menjadi bagian integral dari proses belajar mengajar di berbagai jenjang pendidikan.

Pemerintah Indonesia melalui Kementerian Pendidikan terus mendorong digitalisasi pendidikan dengan menyediakan infrastruktur teknologi yang memadai. Program-program seperti platform Merdeka Mengajar dan kurikulum digital telah membantu guru dan siswa beradaptasi dengan era pembelajaran modern.

Tantangan utama yang dihadapi adalah kesenjangan akses teknologi antara daerah perkotaan dan pedesaan. Namun, berbagai inisiatif dan program bantuan teknologi terus dilakukan untuk menjembatani kesenjangan tersebut.',
            'hari_tanggal' => 'Minggu, 08 Juni 2026 14:30',
        ]);

        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kesehatan->id,
            'judul' => 'Tips Menjaga Kesehatan Mental di Era Digital',
            'gambar' => 'health.jpg',
            'isi' => 'Di era digital yang serba cepat, menjaga kesehatan mental menjadi tantangan tersendiri. Paparan informasi yang berlebihan, tekanan media sosial, dan gaya hidup sedentari dapat berdampak negatif pada kesejahteraan mental kita.

Berikut beberapa tips untuk menjaga kesehatan mental di era digital. Pertama, batasi penggunaan media sosial. Terlalu banyak scrolling dapat menyebabkan kecemasan dan perbandingan sosial yang tidak sehat. Kedua, luangkan waktu untuk digital detox secara berkala. Matikan notifikasi dan nikmati momen tanpa layar.

Ketiga, jaga pola tidur yang teratur. Hindari penggunaan gadget setidaknya 30 menit sebelum tidur karena cahaya biru dari layar dapat mengganggu kualitas tidur. Keempat, tetap aktif secara fisik. Olahraga teratur terbukti dapat meningkatkan mood dan mengurangi gejala depresi serta kecemasan.',
            'hari_tanggal' => 'Sabtu, 07 Juni 2026 09:15',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $teknologi->id,
            'judul' => 'Framework Laravel: Mengapa Masih Menjadi Pilihan Utama Developer',
            'gambar' => 'tech.jpg',
            'isi' => 'Laravel tetap menjadi salah satu framework PHP paling populer di tahun 2026. Dengan ekosistem yang matang, dokumentasi yang lengkap, dan komunitas yang aktif, Laravel terus menjadi pilihan utama bagi developer web di seluruh dunia.

Salah satu keunggulan utama Laravel adalah sintaksnya yang ekspresif dan elegan. Fitur-fitur seperti Eloquent ORM, Blade templating engine, dan Artisan CLI membuat proses pengembangan menjadi lebih efisien dan menyenangkan. Laravel juga menyediakan solusi bawaan untuk masalah umum seperti autentikasi, otorisasi, caching, dan queue management.

Dengan hadirnya Laravel 13, framework ini semakin memperkuat posisinya dengan performa yang lebih cepat, fitur-fitur baru yang inovatif, dan dukungan penuh untuk PHP 8.3. Ekosistem Laravel yang mencakup Laravel Forge, Vapor, Nova, dan Livewire memberikan solusi end-to-end untuk berbagai kebutuhan pengembangan aplikasi web.',
            'hari_tanggal' => 'Jumat, 06 Juni 2026 16:45',
        ]);

        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $wisata->id,
            'judul' => 'Destinasi Wisata Alam Tersembunyi di Jawa Barat',
            'gambar' => 'nature.jpg',
            'isi' => 'Jawa Barat menyimpan banyak destinasi wisata alam yang masih tersembunyi dan belum banyak diketahui wisatawan. Keindahan alamnya yang memukau dan udaranya yang sejuk menjadikan provinsi ini sebagai surga bagi pecinta alam dan petualangan.

Salah satu destinasi yang wajib dikunjungi adalah Kawah Rengganis di Bandung Barat. Kawah ini menawarkan pemandangan yang eksotis dengan air panas alami berwarna biru kehijauan yang dikelilingi oleh hutan pinus yang rindang. Selain itu, ada juga Curug Malela di Bandung Barat yang dijuluki sebagai Niagara-nya Jawa Barat karena bentuknya yang melebar dan megah.

Di wilayah Garut, terdapat Situ Cangkuang yang merupakan danau kecil dengan pulau di tengahnya. Di pulau tersebut terdapat Candi Cangkuang, satu-satunya candi Hindu yang ditemukan di Jawa Barat. Kombinasi keindahan alam dan nilai historis menjadikan tempat ini sangat menarik untuk dikunjungi.',
            'hari_tanggal' => 'Kamis, 05 Juni 2026 11:20',
        ]);

        Artikel::create([
            'id_penulis' => $penulis2->id,
            'id_kategori' => $pendidikan->id,
            'judul' => 'Pentingnya Pembelajaran Coding Sejak Dini',
            'gambar' => 'coding.jpg',
            'isi' => 'Di era digital yang semakin maju, kemampuan coding atau pemrograman komputer menjadi salah satu keterampilan yang sangat berharga. Banyak negara maju telah memasukkan coding sebagai bagian dari kurikulum pendidikan dasar mereka, dan Indonesia pun mulai mengikuti tren ini.

Pembelajaran coding sejak dini tidak hanya mengajarkan anak cara membuat program komputer, tetapi juga melatih kemampuan berpikir logis, pemecahan masalah, dan kreativitas. Anak-anak yang belajar coding cenderung memiliki kemampuan analitis yang lebih baik dan lebih terbiasa dengan pola pikir sistematis.

Berbagai platform pembelajaran coding untuk anak kini tersedia secara gratis dan berbayar. Scratch, Code.org, dan Tynker adalah beberapa platform populer yang dirancang khusus untuk anak-anak dengan pendekatan visual dan gamifikasi yang membuat proses belajar menjadi menyenangkan.',
            'hari_tanggal' => 'Rabu, 04 Juni 2026 13:00',
        ]);

        Artikel::create([
            'id_penulis' => $penulis1->id,
            'id_kategori' => $kesehatan->id,
            'judul' => 'Manfaat Olahraga Pagi untuk Produktivitas Harian',
            'gambar' => 'morning.jpg',
            'isi' => 'Olahraga pagi telah terbukti memberikan banyak manfaat, tidak hanya untuk kesehatan fisik tetapi juga untuk meningkatkan produktivitas sepanjang hari. Penelitian menunjukkan bahwa orang yang rutin berolahraga di pagi hari cenderung memiliki tingkat energi dan fokus yang lebih tinggi dibandingkan mereka yang tidak.

Ketika kita berolahraga, tubuh melepaskan endorfin yang dikenal sebagai "hormon kebahagiaan". Endorfin ini membantu mengurangi stres, meningkatkan mood, dan memberikan perasaan positif yang bertahan sepanjang hari. Selain itu, olahraga pagi juga meningkatkan aliran darah ke otak, yang membantu meningkatkan konsentrasi dan kemampuan berpikir kritis.

Tidak perlu olahraga berat untuk mendapatkan manfaat ini. Cukup dengan jalan kaki selama 30 menit, yoga ringan, atau stretching di pagi hari sudah dapat memberikan dampak positif yang signifikan pada produktivitas dan kesejahteraan Anda.',
            'hari_tanggal' => 'Selasa, 03 Juni 2026 07:30',
        ]);
    }
}
