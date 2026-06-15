<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Landing page utama SUGIH.
     */
    public function index(): View
    {
        // NOTE: Saat tabel Supabase belum siap, gunakan data dummy.
        // Ganti ke `Product::query()->where('is_active', true)->get()` setelah migrasi.
        $products = $this->dummyProducts();
        $articles = $this->dummyArticles();

        return view('pages.home.index', [
            'products' => $products,
            'articles' => $articles,
        ]);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function dummyProducts(): array
    {
        return [
            // ── Original Collection ──
            [
                'name'        => 'Sugih Original',
                'collection'  => 'Original Collection',
                'tagline'     => null,
                'description' => 'Rasakan keaslian cita rasa Nusantara dalam setiap isapan. Varian SUGIH Original menghadirkan perpaduan tembakau pilihan dan cengkeh berkualitas, memberikan sensasi hangat, kuat, dan autentik khas kretek tradisional Indonesia. Hadir dengan harga Rp 10.000',
                'image'       => 'images/products/sugih-original.png',
            ],
            // ── Flavour Collection ──
            [
                'name'        => 'Sugih Green Tea',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Flavour Collection',
                'description' => 'Aroma teh hijau yang menenangkan berpadu lembut dengan karakter tembakau terbaik. SUGIH Green Tea menawarkan pengalaman merokok yang segar, ringan, dan aromatik. Cocok untuk menemani waktu santai dengan nuansa alami yang menenangkan pikiran.',
                'image'       => 'images/products/sugih-green-tea.png',
            ],
            [
                'name'        => 'Sugih Mango',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Flavour Collection',
                'description' => 'Manisnya mangga tropis berpadu harmonis dengan kehangatan tembakau pilihan. SUGIH Mango menghadirkan sensasi eksotis yang menyegarkan, menjadikan setiap momen lebih berwarna dan penuh karakter.',
                'image'       => 'images/products/sugih-mango.png',
            ],
            [
                'name'        => 'Sugih Purple',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Flavour Collection',
                'description' => 'Sentuhan aroma berry yang misterius dan elegan. SUGIH Purple menawarkan pengalaman merokok yang unik dengan perpaduan rasa buah dan tembakau premium, menciptakan karakter yang berbeda dan memukau.',
                'image'       => 'images/products/sugih-purple.png',
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function dummyArticles(): array
    {
        return [
            [
                'title'    => 'CV. PRIORITAS GRUP Patuhi Cukai',
                'excerpt'  => 'CV. Prioritas Grup berkomitmen mematuhi seluruh regulasi cukai pemerintah dalam memproduksi rokok kretek SUGIH.',
                'image'    => 'images/artikel1.png',
                'date'     => '12 Januari 2025',
                'slug'     => 'cv-prioritas-grup-patuhi-cukai',
            ],
        ];
    }
}
