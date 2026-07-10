<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('pages.admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('pages.admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'excerpt' => 'nullable|max:255',
            'content' => 'required',
            'is_published' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $contents = file_get_contents($file->getRealPath());
            $filename = uniqid('artikel-') . '.' . $file->getClientOriginalExtension();
            $path = 'articles/' . $filename;
            
            app(\App\Services\SupabaseStorageService::class)->upload($path, $contents, $file->getMimeType());
            $validated['image'] = $path;
        }

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('pages.admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'excerpt' => 'nullable|max:255',
            'content' => 'required',
            'is_published' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image && !\Illuminate\Support\Str::startsWith($article->image, 'images/')) {
                app(\App\Services\SupabaseStorageService::class)->delete($article->image);
            }
            $file = $request->file('image');
            $contents = file_get_contents($file->getRealPath());
            $filename = uniqid('artikel-') . '.' . $file->getClientOriginalExtension();
            $path = 'articles/' . $filename;
            
            app(\App\Services\SupabaseStorageService::class)->upload($path, $contents, $file->getMimeType());
            $validated['image'] = $path;
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->image && !\Illuminate\Support\Str::startsWith($article->image, 'images/')) {
            app(\App\Services\SupabaseStorageService::class)->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
