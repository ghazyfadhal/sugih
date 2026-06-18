@extends('layouts.admin')

@section('header', 'Edit Artikel')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.articles.index') }}" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Kembali ke Daftar Artikel</a>
        <h2 class="text-xl font-bold text-gray-800">Form Edit Artikel</h2>
    </div>
</div>

<form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel <span class="text-red-500">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="excerpt" class="block text-sm font-semibold text-gray-700 mb-2">Kutipan Singkat / Excerpt (Opsional)</label>
            <textarea id="excerpt" name="excerpt" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">{{ old('excerpt', $article->excerpt) }}</textarea>
            @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Isi Konten Artikel <span class="text-red-500">*</span></label>
            <textarea id="content" name="content" rows="10" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">{{ old('content', $article->content) }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Gunakan format teks atau HTML sederhana.</p>
            @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Utama Saat Ini</label>
                @if($article->image)
                    <img src="{{ $article->image_url }}" class="w-full h-48 object-cover rounded-xl border border-gray-200 mb-4">
                @else
                    <div class="w-full h-48 bg-gray-100 rounded-xl border border-gray-200 mb-4 flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif
                
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar Baru (Opsional)</label>
                <input id="image" name="image" type="file" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#E6C981]/20 file:text-[#8B753A] hover:file:bg-[#E6C981]/30 transition-colors">
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col justify-center">
                <label class="block text-sm font-semibold text-gray-700 mb-4">Status Publikasi</label>
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" class="sr-only peer" {{ $article->is_published ? 'checked' : '' }}>
                        <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-green-500"></div>
                        <span class="ms-4 text-sm font-semibold text-gray-800">Publish ke Publik</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-2">Jika dinonaktifkan, artikel hanya akan disimpan sebagai Draft.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
        <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-colors">
            Update Artikel
        </button>
    </div>

</form>
@endsection
