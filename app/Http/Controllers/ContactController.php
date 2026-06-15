<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact.index');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        // TODO: simpan ke tabel `contact_messages` via Supabase
        // ContactMessage::create($request->validated());

        return redirect()
            ->route('contact')
            ->with('success', 'Terima kasih, pesan Anda telah kami terima.');
    }
}
