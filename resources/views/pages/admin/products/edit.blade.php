@extends('layouts.admin')

@section('header', 'Edit Produk')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Form Edit Produk</h2>
        <p class="text-gray-500 text-sm">Ubah detail produk di bawah ini.</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-xl font-semibold hover:bg-gray-200 transition-colors flex items-center">
        &larr; Kembali
    </a>
</div>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="dirty-check bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Kolom Kiri -->
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="collection" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Koleksi <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select id="collection" name="collection" required class="w-full px-4 py-3 rounded-xl border border-gray-300 appearance-none focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all bg-white">
                        <option value="">Pilih Koleksi...</option>
                        <option value="Original Collection" {{ old('collection', $product->collection) == 'Original Collection' ? 'selected' : '' }}>Original Collection</option>
                        <option value="Flavour Collection" {{ old('collection', $product->collection) == 'Flavour Collection' ? 'selected' : '' }}>Flavour Collection</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('collection') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="tagline" class="block text-sm font-semibold text-gray-700 mb-2">Tagline (Opsional)</label>
                <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $product->tagline) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
                @error('tagline') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Visibilitas</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" class="sr-only peer" {{ $product->is_active ? 'checked' : '' }}>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-700">Tampilkan di Website</span>
                </label>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Produk Saat Ini</label>
                @if($product->image)
                    <img src="{{ $product->image_url }}" class="w-full h-40 object-cover rounded-xl border border-gray-200 mb-4">
                @else
                    <div class="w-full h-40 bg-gray-100 rounded-xl border border-gray-200 mb-4 flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif
                
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar Baru (Opsional)</label>
                <div class="drop-zone mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-sugih-mustard transition-colors bg-gray-50 relative">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex flex-col items-center justify-center text-sm text-gray-600 gap-2">
                            <label for="image" class="relative cursor-pointer bg-sugih-mustard-900 text-sugih-mustard hover:bg-sugih-mustard-800 px-4 py-2 rounded-lg font-medium focus-within:outline-none transition-colors shadow-sm">
                                <span>Pilih File</span>
                                <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                            </label>
                            <p class="file-name-text text-gray-600">atau drag & drop gambar ke sini</p>
                        </div>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Lengkap (Opsional)</label>
                <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
        <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-colors">
            Update Produk
        </button>
    </div>

</form>
@endsection
