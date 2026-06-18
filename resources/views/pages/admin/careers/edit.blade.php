@extends('layouts.admin')

@section('header', 'Edit Lowongan Karir')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Form Edit Lowongan</h2>
        <p class="text-gray-500 text-sm">Ubah detail lowongan karir di bawah ini.</p>
    </div>
    <a href="{{ route('admin.careers.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-xl font-semibold hover:bg-gray-200 transition-colors flex items-center">
        &larr; Kembali
    </a>
</div>

<form action="{{ route('admin.careers.update', $career->id) }}" method="POST" class="dirty-check bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Kolom Kiri -->
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Posisi / Judul <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $career->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="department" class="block text-sm font-semibold text-gray-700 mb-2">Departemen / Divisi <span class="text-red-500">*</span></label>
                <input type="text" id="department" name="department" value="{{ old('department', $career->department) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
                @error('department') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Penempatan <span class="text-red-500">*</span></label>
                <input type="text" id="location" name="location" value="{{ old('location', $career->location) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
                @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Tipe Pekerjaan <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select id="type" name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 appearance-none focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all bg-white">
                        <option value="">Pilih Tipe...</option>
                        <option value="Full-time" {{ old('type', $career->type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ old('type', $career->type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="Contract" {{ old('type', $career->type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                        <option value="Internship" {{ old('type', $career->type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div class="pt-4 border-t border-gray-100">
                <label class="block text-sm font-semibold text-gray-700 mb-4">Status Lowongan</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" class="sr-only peer" {{ $career->is_active ? 'checked' : '' }}>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-700">Terima Lamaran (Buka)</span>
                </label>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-6">
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pekerjaan <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="6" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">{{ old('description', $career->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan Pekerjaan <span class="text-red-500">*</span></label>
                <textarea id="requirements" name="requirements" rows="6" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">{{ old('requirements', $career->requirements) }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Anda bisa menggunakan daftar titik-titik (bullet points) atau HTML.</p>
                @error('requirements') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
        <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-colors">
            Update Lowongan
        </button>
    </div>

</form>
@endsection
