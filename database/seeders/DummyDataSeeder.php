<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Article;
use App\Models\Career;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Products
        $products = [
            [
                'name'        => 'Sugih Coklat',
                'slug'        => 'sugih-coklat',
                'collection'  => 'Original Collection',
                'tagline'     => 'Kretek Asli Nusantara',
                'description' => 'Rasakan keaslian cita rasa Nusantara dalam setiap isapan. Varian SUGIH Original menghadirkan perpaduan tembakau pilihan dan cengkeh berkualitas, memberikan sensasi hangat, kuat, dan autentik khas kretek tradisional Indonesia. Hadir dengan harga Rp 10.000',
                'image'       => 'images/products/sugih-original.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sugih Green Tea',
                'slug'        => 'sugih-green-tea',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Segar Alami',
                'description' => 'Aroma teh hijau yang menenangkan berpadu lembut dengan karakter tembakau terbaik. SUGIH Green Tea menawarkan pengalaman merokok yang segar, ringan, dan aromatik. Cocok untuk menemani waktu santai dengan nuansa alami yang menenangkan pikiran.',
                'image'       => 'images/products/sugih-green-tea.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sugih Mango',
                'slug'        => 'sugih-mango',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Eksotis Tropis',
                'description' => 'Manisnya mangga tropis berpadu harmonis dengan kehangatan tembakau pilihan. SUGIH Mango menghadirkan sensasi eksotis yang menyegarkan, menjadikan setiap momen lebih berwarna dan penuh karakter.',
                'image'       => 'images/products/sugih-mango.png',
                'is_active'   => true,
            ],
            [
                'name'        => 'Sugih Purple',
                'slug'        => 'sugih-purple',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Misterius & Elegan',
                'description' => 'Sentuhan aroma berry yang misterius dan elegan. SUGIH Purple menawarkan pengalaman merokok yang unik dengan perpaduan rasa buah dan tembakau premium, menciptakan karakter yang berbeda dan memukau.',
                'image'       => 'images/products/sugih-purple.png',
                'is_active'   => true,
            ],
        ];

        foreach ($products as $p) {
            Product::firstOrCreate(['slug' => $p['slug']], $p);
        }

        // 2. Articles
        $articles = [
            [
                'title'   => 'CV. PRIORITAS GRUP Patuhi Cukai',
                'slug'    => 'cv-prioritas-grup-patuhi-cukai',
                'excerpt' => 'CV. Prioritas Grup berkomitmen mematuhi seluruh regulasi cukai pemerintah dalam memproduksi rokok kretek SUGIH.',
                'content' => '<p>CV. Prioritas Grup, produsen rokok kretek SUGIH asal Cianjur, menegaskan komitmennya untuk mematuhi seluruh regulasi cukai yang ditetapkan oleh pemerintah Indonesia. Langkah ini diambil sebagai bentuk tanggung jawab perusahaan terhadap negara dan masyarakat.</p>
<p>Dalam pernyataan resminya, manajemen CV. Prioritas Grup menyatakan bahwa kepatuhan terhadap regulasi cukai merupakan bagian integral dari nilai-nilai perusahaan. &ldquo;Kami percaya bahwa kepatuhan bukan hanya kewajiban hukum, tetapi juga cerminan dari integritas kami sebagai produsen yang bertanggung jawab,&rdquo; ungkap Deni Rahmat, Founder CV. Prioritas Grup.</p>
<p>Perusahaan telah memastikan bahwa seluruh produk SUGIH yang beredar di pasaran telah dilengkapi dengan pita cukai resmi sesuai ketentuan yang berlaku. Selain itu, CV. Prioritas Grup juga aktif berkoordinasi dengan Direktorat Jenderal Bea dan Cukai untuk memastikan kepatuhan yang berkelanjutan.</p>
<p>Komitmen ini sejalan dengan visi SUGIH untuk menjadi merek kretek lokal yang tidak hanya berkualitas, tetapi juga legal dan terpercaya. Dengan mematuhi regulasi cukai, CV. Prioritas Grup berharap dapat memberikan kontribusi positif bagi pendapatan negara sekaligus melindungi konsumen dari produk-produk ilegal.</p>
<p>&ldquo;Kami mengajak seluruh pelaku industri rokok untuk bersama-sama mematuhi regulasi cukai. Ini bukan hanya soal bisnis, tetapi juga soal tanggung jawab kita bersama,&rdquo; tambah Deni Rahmat.</p>',
                'image'        => 'images/artikel1.png',
                'is_published' => true,
            ],
        ];

        foreach ($articles as $a) {
            Article::firstOrCreate(['slug' => $a['slug']], $a);
        }

        // 3. Careers
        $careers = [
            [
                'title'       => 'Operator Sigaret Kretek Tangan (Pelinting)',
                'slug'        => 'operator-skt-pelinting',
                'department'  => 'Produksi',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Melakukan proses pelintingan rokok Sigaret Kretek Tangan (SKT) sesuai standar perusahaan.
Memastikan setiap batang rokok yang dihasilkan memenuhi standar kualitas produksi.
Menjaga kebersihan dan kerapihan area kerja.
Merawat dan menjaga peralatan produksi agar tetap dalam kondisi baik.
Mencapai target produksi harian yang telah ditentukan.',
                'requirements' => 'Wanita.
Usia max 45 Tahun.
Pendidikan minimal SD/SMP.
Memiliki pengalaman sebagai pelinting rokok SKT diutamakan.
Teliti, cekatan, dan mampu bekerja dalam tim.
Penempatan Cianjur.',
                'is_active' => true,
            ],
            [
                'title'       => 'Operator Sigaret Kretek Tangan (Kemas)',
                'slug'        => 'operator-skt-kemas',
                'department'  => 'Produksi',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Melakukan proses pengemasan (packing) rokok Sigaret Kretek Tangan sesuai standar.
Memastikan kemasan produk rapi, bersih, dan sesuai spesifikasi.
Menjaga kualitas dan konsistensi hasil pengemasan.
Merawat dan menjaga peralatan pengemasan.
Mencapai target produksi pengemasan harian.',
                'requirements' => 'Wanita.
Usia max 45 Tahun.
Pendidikan minimal SD/SMP.
Teliti, cekatan, dan mampu bekerja dalam tim.
Penempatan Cianjur.',
                'is_active' => true,
            ],
            [
                'title'       => 'Desainer Grafis / Desainer Produk',
                'slug'        => 'desainer-grafis',
                'department'  => 'Kreatif',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Membuat desain aset visual termasuk logo, poster, baliho, kemasan produk, dan konten media sosial.
Mendesain tata letak (layout) dan tipografi untuk berbagai kebutuhan komunikasi visual.
Membangun dan menjaga konsistensi identitas visual merek (brand) SUGIH.
Berkolaborasi dengan tim marketing untuk menghasilkan konten visual yang menarik.
Mengikuti tren desain terkini dan menerapkannya dalam pekerjaan.',
                'requirements' => 'Pria / Wanita.
Usia max 30 Tahun.
D3/S1 Desain Komunikasi Visual, Desain Grafis, atau bidang terkait.
Menguasai Adobe Creative Suite (Photoshop, Illustrator, InDesign).
Memiliki portofolio desain yang kuat.
Kreatif, detail-oriented, dan mampu bekerja dengan deadline.
Penempatan Cianjur.',
                'is_active' => true,
            ],
            [
                'title'       => 'Teknisi Kontrol Kualitas (QC)',
                'slug'        => 'teknisi-qc',
                'department'  => 'Quality Control',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Memastikan kualitas rokok sesuai standar SOP yang telah ditentukan.
Menganalisis masalah – masalah yang terjadi pada produk.
Melaporkan hasil analisis dengan tepat dan akurat.
Pengawasan dan memastikan proses produksi sesuai dengan SOP yang ditentukan.
Berkolaborasi dengan team production dan team lainya.',
                'requirements' => 'Pria.
Usia max 30 Tahun.
S1 Jurusan Teknik Industri/ Teknik Kimia.
Mampu Bekerja dalam team.
Mempunyai Pengalaman di bidang yang sama lebih di sukai.
Penempatan Cianjur.',
                'is_active' => true,
            ],
            [
                'title'       => 'Pengembang Web',
                'slug'        => 'pengembang-web',
                'department'  => 'IT',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Mengembangkan dan memelihara website perusahaan agar berjalan optimal.
Melakukan pengujian dan debugging untuk memastikan situs bebas hambatan.
Pemeliharaan rutin termasuk perbaikan fitur dan peningkatan performa.
Menjaga keamanan situs dan meningkatkan kecepatan loading halaman.
Berkolaborasi dengan tim desain untuk implementasi UI/UX yang baik.',
                'requirements' => 'Pria / Wanita.
Usia max 28 Tahun.
D3/S1 Teknik Informatika, Ilmu Komputer, atau bidang terkait.
Menguasai HTML, CSS, JavaScript, dan PHP/Laravel.
Memiliki pengalaman dengan Git dan deployment.
Penempatan Cianjur.',
                'is_active' => true,
            ],
            [
                'title'       => 'Pengawas Lapangan',
                'slug'        => 'pengawas-lapangan',
                'department'  => 'Operasional',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'description' => 'Melakukan inspeksi fisik dan koordinasi kegiatan di lapangan.
Mengendalikan jadwal kerja dan memastikan progres sesuai target.
Membuat laporan harian, mingguan, dan bulanan terkait progres di lapangan.
Memastikan penerapan Keselamatan dan Kesehatan Kerja (K3).
Berkoordinasi dengan manajemen untuk pelaporan dan evaluasi.',
                'requirements' => 'Pria.
Usia max 35 Tahun.
Pendidikan minimal SMA/SMK.
Memiliki pengalaman sebagai pengawas lapangan minimal 2 tahun.
Tegas, disiplin, dan memiliki kemampuan leadership.
Penempatan Cianjur.',
                'is_active' => true,
            ],
        ];

        foreach ($careers as $c) {
            Career::firstOrCreate(['slug' => $c['slug']], $c);
        }
    }
}
