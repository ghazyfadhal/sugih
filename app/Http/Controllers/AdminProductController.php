<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBubble;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->paginate(10);
        return view('pages.admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('pages.admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:160',
            'collection' => 'required|in:Original Collection,Flavour Collection',
            'tagline' => 'nullable|max:120',
            'description' => 'nullable',
            'is_active' => 'nullable',
            'image' => 'nullable|image|max:30720' // Maksimal 30MB
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $contents = file_get_contents($file->getRealPath());
            $filename = uniqid('product-') . '.' . $file->getClientOriginalExtension();
            $path = 'products/' . $filename;
            
            app(\App\Services\SupabaseStorageService::class)->upload($path, $contents, $file->getMimeType());
            $validated['image'] = $path;
        }

        $validated['sort_order'] = Product::max('sort_order') + 1;
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        $product->load('bubbles');
        return view('pages.admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:160',
            'collection' => 'required|in:Original Collection,Flavour Collection',
            'tagline' => 'nullable|max:120',
            'description' => 'nullable',
            'is_active' => 'nullable',
            'image' => 'nullable|image|max:30720' // Maksimal 30MB
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($product->image && !\Illuminate\Support\Str::startsWith($product->image, 'images/')) {
                app(\App\Services\SupabaseStorageService::class)->delete($product->image);
            }
            
            $file = $request->file('image');
            $contents = file_get_contents($file->getRealPath());
            $filename = uniqid('product-') . '.' . $file->getClientOriginalExtension();
            $path = 'products/' . $filename;
            
            app(\App\Services\SupabaseStorageService::class)->upload($path, $contents, $file->getMimeType());
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && !\Illuminate\Support\Str::startsWith($product->image, 'images/')) {
            app(\App\Services\SupabaseStorageService::class)->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function updateOrder(Request $request)
    {
        $orderData = $request->input('order');
        if (is_array($orderData)) {
            foreach ($orderData as $item) {
                Product::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
            }
        }
        return response()->json(['success' => true]);
    }

    /**
     * Upload a bubble animation asset for a product.
     */
    public function storeBubble(Request $request, Product $product)
    {
        $request->validate([
            'images' => 'required|array|max:3',
            'images.*' => 'image|mimes:png,webp|max:2048',
        ]);

        $currentCount = $product->bubbles()->count();
        $newFiles = $request->file('images');
        
        if ($currentCount + count($newFiles) > 3) {
            return back()->with('error', 'Total maksimal 3 asset animasi per produk. Anda mencoba mengupload ' . count($newFiles) . ' file, sedangkan sisa slot hanya ' . (3 - $currentCount) . '.');
        }

        foreach ($newFiles as $file) {
            $contents = file_get_contents($file->getRealPath());
            $filename = 'bubble-' . $product->id . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'bubbles/' . $filename;

            app(\App\Services\SupabaseStorageService::class)->upload($path, $contents, $file->getMimeType());

            $product->bubbles()->create([
                'image' => $path,
                'sort_order' => $product->bubbles()->count(),
            ]);
        }

        return back()->with('success', count($newFiles) . ' asset animasi berhasil diupload.');
    }

    /**
     * Delete a bubble animation asset.
     */
    public function destroyBubble(Product $product, ProductBubble $bubble)
    {
        if ($bubble->image) {
            app(\App\Services\SupabaseStorageService::class)->delete($bubble->image);
        }
        $bubble->delete();

        return back()->with('success', 'Asset animasi berhasil dihapus.');
    }
}
