@extends('layouts.admin')

@section('header', 'Kelola Produk')

@section('content')
<div x-data="productReorder({{ $products->firstItem() ?? 1 }})">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Daftar Produk</h2>
            <p class="text-gray-500 text-sm">Kelola katalog produk SUGIH (Original & Flavour).</p>
        </div>
        
        <div class="flex space-x-3">
            {{-- Default Action --}}
            <button x-show="!reorderMode" @click="startReorder()" class="bg-white border border-gray-200 text-gray-700 px-5 py-2.5 rounded-xl font-semibold hover:bg-gray-50 transition-colors flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-8m-4 8l-4-8"></path></svg>
                Atur Urutan
            </button>
            <a x-show="!reorderMode" href="{{ route('admin.products.create') }}" class="bg-sugih-green-900 text-sugih-gold px-5 py-2.5 rounded-xl font-semibold hover:bg-sugih-green-800 transition-colors flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Produk
            </a>

            {{-- Reorder Actions --}}
            <button x-show="reorderMode" @click="cancelReorder()" x-cloak class="bg-white border border-gray-200 text-red-600 px-5 py-2.5 rounded-xl font-semibold hover:bg-red-50 transition-colors flex items-center shadow-sm">
                Batalkan
            </button>
            <button x-show="reorderMode" @click="saveOrder()" x-cloak class="bg-sugih-terracotta text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-red-800 transition-colors flex items-center shadow-sm">
                <svg x-show="!isSaving" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <svg x-show="isSaving" class="animate-spin w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                Simpan Urutan
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-xl border border-green-100 flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300" :class="reorderMode ? 'ring-2 ring-sugih-terracotta shadow-md' : ''">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4 font-medium">Gambar</th>
                        <th class="px-6 py-4 font-medium">Nama Produk</th>
                        <th class="px-6 py-4 font-medium">Koleksi</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="product-table-body">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors product-row bg-white" data-id="{{ $product->id }}">
                        <td class="px-6 py-4">
                            @if($product->image)
                                <img src="{{ $product->image_url }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm">
                            @else
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">{{ $product->name }}</div>
                            <div class="text-xs text-gray-500">{{ $product->tagline ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium {{ $product->collection == 'Original Collection' ? 'bg-[#E6C981]/20 text-[#8B753A]' : 'bg-purple-100 text-purple-700' }}">
                                {{ $product->collection }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($product->is_active)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <span class="w-2 h-2 mr-1.5 bg-gray-500 rounded-full"></span> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            
                            {{-- Reorder Mode Actions --}}
                            <div x-show="reorderMode" x-cloak class="inline-flex space-x-2">
                                <button @click="moveUp($event)" type="button" class="text-gray-500 hover:text-sugih-terracotta p-2 bg-gray-100 hover:bg-red-50 rounded-lg transition-colors" title="Pindah ke Atas">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </button>
                                <button @click="moveDown($event)" type="button" class="text-gray-500 hover:text-sugih-terracotta p-2 bg-gray-100 hover:bg-red-50 rounded-lg transition-colors" title="Pindah ke Bawah">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            </div>

                            {{-- Normal Actions --}}
                            <div x-show="!reorderMode" class="inline-block">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium mr-4">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            Belum ada data produk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productReorder', (offset) => ({
            reorderMode: false,
            isSaving: false,
            initialHtml: '',
            
            startReorder() {
                // Save state to allow discarding
                this.initialHtml = document.getElementById('product-table-body').innerHTML;
                this.reorderMode = true;
            },
            
            cancelReorder() {
                // Restore state
                document.getElementById('product-table-body').innerHTML = this.initialHtml;
                this.reorderMode = false;
            },
            
            moveUp(event) {
                let row = event.target.closest('tr');
                if (row.previousElementSibling) {
                    // Visual animation flair
                    row.style.transition = 'all 0.3s ease';
                    row.style.transform = 'translateY(-10px)';
                    row.style.backgroundColor = '#fdf2f2'; // light red/terracotta
                    
                    setTimeout(() => {
                        row.parentNode.insertBefore(row, row.previousElementSibling);
                        row.style.transform = '';
                        setTimeout(() => row.style.backgroundColor = '', 300);
                    }, 150);
                }
            },
            
            moveDown(event) {
                let row = event.target.closest('tr');
                if (row.nextElementSibling) {
                    row.style.transition = 'all 0.3s ease';
                    row.style.transform = 'translateY(10px)';
                    row.style.backgroundColor = '#fdf2f2';
                    
                    setTimeout(() => {
                        row.parentNode.insertBefore(row.nextElementSibling, row);
                        row.style.transform = '';
                        setTimeout(() => row.style.backgroundColor = '', 300);
                    }, 150);
                }
            },
            
            saveOrder() {
                this.isSaving = true;
                let rows = document.querySelectorAll('.product-row');
                let order = Array.from(rows).map((row, index) => {
                    return { id: row.dataset.id, sort_order: offset + index };
                });
                
                fetch('{{ route('admin.products.updateOrder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ order: order })
                }).then(res => res.json())
                  .then(data => {
                      if (data.success) {
                          window.location.reload();
                      } else {
                          alert('Terjadi kesalahan saat menyimpan urutan.');
                          this.isSaving = false;
                      }
                  }).catch(err => {
                      alert('Gagal menghubungi server.');
                      this.isSaving = false;
                  });
            }
        }));
    });
</script>
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
