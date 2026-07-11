<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('bubbles')->where('is_active', true)->orderBy('sort_order')->get();

        return view('pages.products.index', [
            'products' => $products,
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('pages.products.show', [
            'product' => $product,
        ]);
    }
}
