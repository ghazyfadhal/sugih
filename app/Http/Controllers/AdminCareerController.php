<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(10);
        return view('pages.admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('pages.admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'department' => 'required|max:100',
            'location' => 'required|max:100',
            'type' => 'required|in:Full-time,Part-time,Contract,Internship',
            'description' => 'required',
            'requirements' => 'required',
            'is_active' => 'nullable'
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        $validated['is_active'] = $request->has('is_active');

        Career::create($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Lowongan Karir berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Career $career)
    {
        return view('pages.admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'department' => 'required|max:100',
            'location' => 'required|max:100',
            'type' => 'required|in:Full-time,Part-time,Contract,Internship',
            'description' => 'required',
            'requirements' => 'required',
            'is_active' => 'nullable'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $career->update($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Lowongan Karir berhasil diperbarui.');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Lowongan Karir berhasil dihapus.');
    }
}
