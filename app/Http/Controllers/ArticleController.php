<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    /**
     * Dummy articles data (shared between index and show).
     * Will be replaced by Supabase queries later.
     */
    private function dummyArticles(): array
    {
        return [
            [
                'title'   => 'CV. PRIORITAS GRUP Patuhi Cukai',
                'excerpt' => 'CV. Prioritas Grup berkomitmen mematuhi seluruh regulasi cukai pemerintah dalam memproduksi rokok kretek SUGIH.',
                'body'    => '<p>CV. Prioritas Grup, produsen rokok kretek SUGIH asal Cianjur, menegaskan komitmennya untuk mematuhi seluruh regulasi cukai yang ditetapkan oleh pemerintah Indonesia. Langkah ini diambil sebagai bentuk tanggung jawab perusahaan terhadap negara dan masyarakat.</p>

<p>Dalam pernyataan resminya, manajemen CV. Prioritas Grup menyatakan bahwa kepatuhan terhadap regulasi cukai merupakan bagian integral dari nilai-nilai perusahaan. &ldquo;Kami percaya bahwa kepatuhan bukan hanya kewajiban hukum, tetapi juga cerminan dari integritas kami sebagai produsen yang bertanggung jawab,&rdquo; ungkap Deni Rahmat, Founder CV. Prioritas Grup.</p>

<p>Perusahaan telah memastikan bahwa seluruh produk SUGIH yang beredar di pasaran telah dilengkapi dengan pita cukai resmi sesuai ketentuan yang berlaku. Selain itu, CV. Prioritas Grup juga aktif berkoordinasi dengan Direktorat Jenderal Bea dan Cukai untuk memastikan kepatuhan yang berkelanjutan.</p>

<p>Komitmen ini sejalan dengan visi SUGIH untuk menjadi merek kretek lokal yang tidak hanya berkualitas, tetapi juga legal dan terpercaya. Dengan mematuhi regulasi cukai, CV. Prioritas Grup berharap dapat memberikan kontribusi positif bagi pendapatan negara sekaligus melindungi konsumen dari produk-produk ilegal.</p>

<p>&ldquo;Kami mengajak seluruh pelaku industri rokok untuk bersama-sama mematuhi regulasi cukai. Ini bukan hanya soal bisnis, tetapi juga soal tanggung jawab kita bersama,&rdquo; tambah Deni Rahmat.</p>',
                'image'   => 'images/artikel1.png',
                'date'    => '12 Januari 2025',
                'slug'    => 'cv-prioritas-grup-patuhi-cukai',
            ],
        ];
    }

    public function index(): View
    {
        return view('pages.articles.index', [
            'articles' => $this->dummyArticles(),
        ]);
    }

    public function show(string $slug): View
    {
        $articles = $this->dummyArticles();
        $article = collect($articles)->firstWhere('slug', $slug);

        if (! $article) {
            abort(404);
        }

        return view('pages.articles.show', [
            'article' => $article,
        ]);
    }
}
