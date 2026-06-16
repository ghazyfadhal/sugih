<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Dummy products data (shared between index and show).
     * Will be replaced by Supabase queries later.
     */
    private function dummyProducts(): array
    {
        return [
            [
                'name'        => 'Sugih Original',
                'slug'        => 'sugih-original',
                'collection'  => 'Original Collection',
                'tagline'     => 'Kretek Asli Nusantara',
                'description' => 'Rasakan keaslian cita rasa Nusantara dalam setiap isapan. Varian SUGIH Original menghadirkan perpaduan tembakau pilihan dan cengkeh berkualitas, memberikan sensasi hangat, kuat, dan autentik khas kretek tradisional Indonesia. Hadir dengan harga Rp 10.000',
                'image'       => 'images/products/sugih-original.png',
            ],
            [
                'name'        => 'Sugih Green Tea',
                'slug'        => 'sugih-green-tea',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Segar Alami',
                'description' => 'Aroma teh hijau yang menenangkan berpadu lembut dengan karakter tembakau terbaik. SUGIH Green Tea menawarkan pengalaman merokok yang segar, ringan, dan aromatik. Cocok untuk menemani waktu santai dengan nuansa alami yang menenangkan pikiran.',
                'image'       => 'images/products/sugih-green-tea.png',
            ],
            [
                'name'        => 'Sugih Mango',
                'slug'        => 'sugih-mango',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Eksotis Tropis',
                'description' => 'Manisnya mangga tropis berpadu harmonis dengan kehangatan tembakau pilihan. SUGIH Mango menghadirkan sensasi eksotis yang menyegarkan, menjadikan setiap momen lebih berwarna dan penuh karakter.',
                'image'       => 'images/products/sugih-mango.png',
            ],
            [
                'name'        => 'Sugih Purple',
                'slug'        => 'sugih-purple',
                'collection'  => 'Flavour Collection',
                'tagline'     => 'Misterius & Elegan',
                'description' => 'Sentuhan aroma berry yang misterius dan elegan. SUGIH Purple menawarkan pengalaman merokok yang unik dengan perpaduan rasa buah dan tembakau premium, menciptakan karakter yang berbeda dan memukau.',
                'image'       => 'images/products/sugih-purple.png',
            ],
        ];
    }

    public function index(): View
    {
        return view('pages.products.index', [
            'products' => $this->dummyProducts(),
        ]);
    }

    public function show(string $slug): View
    {
        $products = $this->dummyProducts();
        $product = collect($products)->firstWhere('slug', $slug);

        if (! $product) {
            abort(404);
        }

        return view('pages.products.show', [
            'product' => $product,
        ]);
    }
}
