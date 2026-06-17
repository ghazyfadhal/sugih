<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class KarirController extends Controller
{
    /**
     * Dummy career data.
     * Will be replaced by database queries later.
     */
    private function dummyKarir(): array
    {
        return [
            [
                'title'       => 'Operator Sigaret Kretek Tangan (Pelinting)',
                'slug'        => 'operator-skt-pelinting',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Melakukan Produksi linting Rokok SKT.',
                    'Menjaga kualitas hasil produksi.',
                    'Merawat dan menjaga peralatan produksi dengan baik.',
                ],
                'description' => [
                    'Melakukan proses pelintingan rokok Sigaret Kretek Tangan (SKT) sesuai standar perusahaan.',
                    'Memastikan setiap batang rokok yang dihasilkan memenuhi standar kualitas produksi.',
                    'Menjaga kebersihan dan kerapihan area kerja.',
                    'Merawat dan menjaga peralatan produksi agar tetap dalam kondisi baik.',
                    'Mencapai target produksi harian yang telah ditentukan.',
                ],
                'qualifications' => [
                    'Wanita.',
                    'Usia max 45 Tahun.',
                    'Pendidikan minimal SD/SMP.',
                    'Memiliki pengalaman sebagai pelinting rokok SKT diutamakan.',
                    'Teliti, cekatan, dan mampu bekerja dalam tim.',
                    'Penempatan Cianjur.',
                ],
            ],
            [
                'title'       => 'Operator Sigaret Kretek Tangan (Kemas)',
                'slug'        => 'operator-skt-kemas',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Melakukan produksi packing rokok sigaret Kretek tangan.',
                    'Menjaga kualitas hasil produksi.',
                    'Merawat dan menjaga peralatan produksi dengan baik.',
                ],
                'description' => [
                    'Melakukan proses pengemasan (packing) rokok Sigaret Kretek Tangan sesuai standar.',
                    'Memastikan kemasan produk rapi, bersih, dan sesuai spesifikasi.',
                    'Menjaga kualitas dan konsistensi hasil pengemasan.',
                    'Merawat dan menjaga peralatan pengemasan.',
                    'Mencapai target produksi pengemasan harian.',
                ],
                'qualifications' => [
                    'Wanita.',
                    'Usia max 45 Tahun.',
                    'Pendidikan minimal SD/SMP.',
                    'Teliti, cekatan, dan mampu bekerja dalam tim.',
                    'Penempatan Cianjur.',
                ],
            ],
            [
                'title'       => 'Desainer Grafis / Desainer Produk',
                'slug'        => 'desainer-grafis',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Pembuatan Aset Visual: Membuat logo, poster, baliho, kemasan, dan konten media sosial.',
                    'Tata Letak (Layout) dan Tipografi',
                    'Branding: Membangun identitas visual merek (brand) agar konsisten.',
                ],
                'description' => [
                    'Membuat desain aset visual termasuk logo, poster, baliho, kemasan produk, dan konten media sosial.',
                    'Mendesain tata letak (layout) dan tipografi untuk berbagai kebutuhan komunikasi visual.',
                    'Membangun dan menjaga konsistensi identitas visual merek (brand) SUGIH.',
                    'Berkolaborasi dengan tim marketing untuk menghasilkan konten visual yang menarik.',
                    'Mengikuti tren desain terkini dan menerapkannya dalam pekerjaan.',
                ],
                'qualifications' => [
                    'Pria / Wanita.',
                    'Usia max 30 Tahun.',
                    'D3/S1 Desain Komunikasi Visual, Desain Grafis, atau bidang terkait.',
                    'Menguasai Adobe Creative Suite (Photoshop, Illustrator, InDesign).',
                    'Memiliki portofolio desain yang kuat.',
                    'Kreatif, detail-oriented, dan mampu bekerja dengan deadline.',
                    'Penempatan Cianjur.',
                ],
            ],
            [
                'title'       => 'Teknisi Kontrol Kualitas (QC)',
                'slug'        => 'teknisi-qc',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Memastikan kualitas rokok sesuai standar SOP yang telah ditentukan.',
                    'Menganalisis masalah – masalah yang terjadi pada produk.',
                    'Melaporkan hasil analisis dengan tepat dan akurat.',
                ],
                'description' => [
                    'Memastikan kualitas rokok sesuai standar SOP yang telah ditentukan.',
                    'Menganalisis masalah – masalah yang terjadi pada produk.',
                    'Melaporkan hasil analisis dengan tepat dan akurat.',
                    'Pengawasan dan memastikan proses produksi sesuai dengan SOP yang ditentukan.',
                    'Berkolaborasi dengan team production dan team lainya.',
                ],
                'qualifications' => [
                    'Pria.',
                    'Usia max 30 Tahun.',
                    'S1 Jurusan Teknik Industri/ Teknik Kimia.',
                    'Mampu Bekerja dalam team.',
                    'Mempunyai Pengalaman di bidang yang sama lebih di sukai.',
                    'Penempatan Cianjur.',
                ],
            ],
            [
                'title'       => 'Pengembang Web',
                'slug'        => 'pengembang-web',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Pengujian & Debugging: Memastikan agar situs berjalan lancar tanpa hambatan.',
                    'Pemeliharaan Rutin: Memperbaiki fitur, menjaga keamanan situs, dan meningkatkan kecepatan memuat halaman.',
                ],
                'description' => [
                    'Mengembangkan dan memelihara website perusahaan agar berjalan optimal.',
                    'Melakukan pengujian dan debugging untuk memastikan situs bebas hambatan.',
                    'Pemeliharaan rutin termasuk perbaikan fitur dan peningkatan performa.',
                    'Menjaga keamanan situs dan meningkatkan kecepatan loading halaman.',
                    'Berkolaborasi dengan tim desain untuk implementasi UI/UX yang baik.',
                ],
                'qualifications' => [
                    'Pria / Wanita.',
                    'Usia max 28 Tahun.',
                    'D3/S1 Teknik Informatika, Ilmu Komputer, atau bidang terkait.',
                    'Menguasai HTML, CSS, JavaScript, dan PHP/Laravel.',
                    'Memiliki pengalaman dengan Git dan deployment.',
                    'Penempatan Cianjur.',
                ],
            ],
            [
                'title'       => 'Pengawas Lapangan',
                'slug'        => 'pengawas-lapangan',
                'location'    => 'Cianjur, Jawa Barat',
                'type'        => 'Full-time',
                'summary'     => [
                    'Inspeksi Fisik, Koordinasi.',
                    'Pengendalian jadwal, pembuatan laporan harian, mingguan, dan bulanan terkait progres di lapangan.',
                    'Penerapan K3.',
                ],
                'description' => [
                    'Melakukan inspeksi fisik dan koordinasi kegiatan di lapangan.',
                    'Mengendalikan jadwal kerja dan memastikan progres sesuai target.',
                    'Membuat laporan harian, mingguan, dan bulanan terkait progres di lapangan.',
                    'Memastikan penerapan Keselamatan dan Kesehatan Kerja (K3).',
                    'Berkoordinasi dengan manajemen untuk pelaporan dan evaluasi.',
                ],
                'qualifications' => [
                    'Pria.',
                    'Usia max 35 Tahun.',
                    'Pendidikan minimal SMA/SMK.',
                    'Memiliki pengalaman sebagai pengawas lapangan minimal 2 tahun.',
                    'Tegas, disiplin, dan memiliki kemampuan leadership.',
                    'Penempatan Cianjur.',
                ],
            ],
        ];
    }

    public function index(): View
    {
        $allKarir = $this->dummyKarir();

        return view('pages.karir.index', [
            'featuredKarir' => array_slice($allKarir, 0, 3),
            'allKarir'      => $allKarir,
        ]);
    }

    public function show(string $slug): View
    {
        $allKarir = $this->dummyKarir();
        $karir = collect($allKarir)->firstWhere('slug', $slug);

        if (! $karir) {
            abort(404);
        }

        return view('pages.karir.show', [
            'karir' => $karir,
        ]);
    }
}
