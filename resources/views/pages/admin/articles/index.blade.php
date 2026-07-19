@extends('layouts.admin')

@section('header', 'Kelola Artikel / Berita')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Artikel</h2>
        <p class="text-gray-500 text-sm">Kelola berita dan artikel di website SUGIH.</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="bg-sugih-terracotta text-white shadow-sm px-5 py-2.5 rounded-xl font-semibold hover:bg-sugih-terracotta-hover transition-all hover:-translate-y-0.5 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Artikel
    </a>
</div>

@if(session('success'))
    <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-xl border border-green-100 flex items-center">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4 font-medium">Gambar</th>
                    <th class="px-6 py-4 font-medium">Judul Artikel</th>
                    <th class="px-6 py-4 font-medium">Kutipan</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($articles as $article)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        @if($article->image)
                            <img src="{{ $article->image_url }}" class="w-24 h-16 object-cover rounded-lg border border-gray-200">
                        @else
                            <div class="w-24 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800">{{ $article->title }}</div>
                        <div class="text-xs text-gray-400">{{ $article->created_at->format('d M Y') }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600 truncate max-w-xs">
                        {{ $article->excerpt ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($article->is_published)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span> Publik
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <span class="w-2 h-2 mr-1.5 bg-gray-500 rounded-full"></span> Draft
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline-block delete-form" data-confirm-text="Anda yakin ingin menghapus artikel ini?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                        Belum ada data artikel.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($articles->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection
