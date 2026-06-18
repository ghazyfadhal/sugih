<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Contracts\View\View;

class KarirController extends Controller
{
    public function index(): View
    {
        $allKarir = Career::where('is_active', true)->latest()->get();

        return view('pages.karir.index', [
            'featuredKarir' => $allKarir->take(3),
            'allKarir'      => $allKarir,
        ]);
    }

    public function show(string $slug): View
    {
        $karir = Career::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('pages.karir.show', [
            'karir' => $karir,
        ]);
    }
}
