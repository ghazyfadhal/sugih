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
        $products = Product::where('is_active', true)->get();
        $articles = Article::where('is_published', true)->latest()->take(3)->get();

        return view('pages.home.index', [
            'products' => $products,
            'articles' => $articles,
        ]);
    }
}
