<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        // $articles = Article::query()->latest('published_at')->paginate(9);
        return view('pages.articles.index', [
            'articles' => [],
        ]);
    }

    public function show(string $slug): View
    {
        // $article = Article::where('slug', $slug)->firstOrFail();
        return view('pages.articles.show', [
            'article' => ['slug' => $slug],
        ]);
    }
}
