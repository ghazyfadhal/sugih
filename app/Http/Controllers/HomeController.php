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
            [
                'name'        => 'Sugih Original',
                'tagline'     => null,
                'description' => 'Rasakan keaslian cita rasa Nusantara dalam setiap isapan. Varian SUGIH Original menghadirkan perpaduan tembakau pilihan dan cengkeh berkualitas, memberikan sensasi hangat, kuat, dan autentik khas kretek tradisional Indonesia. Hadir dengan harga Rp 10.000',
                'image'       => 'images/products/sugih-original.png',
            ],
            [
                'name'        => 'Sugih Green Tea',
                'tagline'     => 'Flavour Collection',
                'description' => 'Aroma teh hijau yang menenangkan berpadu lembut dengan karakter tembakau terbaik. SUGIH Green Tea menawarkan pengalaman merokok yang segar, ringan, dan aromatik. Cocok untuk menemani waktu santai dengan nuansa alami yang menenangkan pikiran.',
                'image'       => 'images/products/sugih-green-tea.png',
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
                'image'    => 'images/articles/patuhi-cukai.jpg',
                'date'     => '12 Januari 2025',
                'slug'     => 'cv-prioritas-grup-patuhi-cukai',
            ],
        ];
    }
}
