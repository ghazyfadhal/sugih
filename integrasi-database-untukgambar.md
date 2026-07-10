# Rencana Migrasi Penyimpanan Gambar CRUD ke Supabase Storage

Dokumen ini mendeskripsikan rencana teknis untuk memigrasikan penyimpanan gambar dari sistem file lokal server ke bucket Supabase Storage untuk fitur CRUD Produk dan CRUD Artikel/Berita.

## User Review Required

> [!IMPORTANT]
> **Kebijakan Akses Bucket Supabase**:
> Agar berkas dapat diakses secara publik dan ditampilkan di frontend, pastikan bucket **`sugih-public`** di Supabase Storage memiliki kebijakan akses (**Storage Policies**) sebagai berikut:
> 1. **`Select/Read`**: Diizinkan untuk publik (tanpa autentikasi).
> 2. **`Insert/Update/Delete`**: Diizinkan untuk admin (dapat dibatasi menggunakan token API Service Role Key yang dikirim oleh backend Laravel).

## Open Questions

> [!NOTE]
> Tidak ada pertanyaan terbuka saat ini. Implementasi akan menggunakan service helper `SupabaseStorageService` yang sudah terdaftar di container aplikasi.

---

## Proposed Changes

### 1. Model Abstractions (Pembaruan URL Accessor)

Memperbarui model `Product` dan `Article` agar mengembalikan URL publik dari Supabase Storage alih-alih local disk URL ketika kolom `image` bernilai non-statis (tidak diawali dengan `images/`).

#### [MODIFY] [Product.php](file:///d:/Code/Jokian/sugih/app/Models/Product.php)
* Ubah method `getImageUrlAttribute()` agar memanggil `app(SupabaseStorageService::class)->publicUrl($this->image)`.

#### [MODIFY] [Article.php](file:///d:/Code/Jokian/sugih/app/Models/Article.php)
* Ubah method `getImageUrlAttribute()` agar memanggil `app(SupabaseStorageService::class)->publicUrl($this->image)`.

---

### 2. Admin Controllers (Pembaruan Logika Upload & Delete)

Memperbarui CRUD controller agar mengunggah gambar baru dan menghapus gambar lama menggunakan `SupabaseStorageService` alih-alih Local Storage.

#### [MODIFY] [AdminProductController.php](file:///d:/Code/Jokian/sugih/app/Http/Controllers/AdminProductController.php)
* Ubah method `store()`: Ambil konten file gambar (`file_get_contents`) dan panggil `SupabaseStorageService::upload()` dengan remote path `products/product-[random].ext`.
* Ubah method `update()`: Jika ada file baru, hapus berkas lama di Supabase via `SupabaseStorageService::delete()`, lalu unggah berkas baru.
* Ubah method `destroy()`: Hapus berkas lama dari Supabase sebelum menghapus record produk.

#### [MODIFY] [AdminArticleController.php](file:///d:/Code/Jokian/sugih/app/Http/Controllers/AdminArticleController.php)
* Ubah method `store()`, `update()`, dan `destroy()` dengan alur yang sama seperti `AdminProductController`, menggunakan remote path `articles/artikel-[random].ext`.

---

## Verification Plan

### Automated Tests
Tidak ada test otomatis khusus yang tersedia saat ini. Kita akan melakukan pengujian fungsional secara manual.

### Manual Verification
1. **Tambah Produk Baru**:
   * Akses halaman tambah produk di Panel Admin.
   * Isi data dan unggah gambar produk.
   * Simpan, lalu pastikan produk berhasil dibuat dan gambarnya muncul di halaman daftar produk & detail produk frontend.
   * Periksa di dashboard Supabase Storage untuk memastikan file gambar berada di dalam bucket `sugih-public/products/`.

2. **Perbarui Produk**:
   * Ganti gambar produk yang baru saja dibuat.
   * Pastikan gambar baru muncul di frontend dan gambar lama terhapus dari bucket Supabase Storage.

3. **Hapus Produk**:
   * Hapus produk tersebut.
   * Pastikan data terhapus dari database dan file gambar terhapus dari bucket Supabase Storage.

4. **Ulangi Pengujian untuk CRUD Artikel/Berita**:
   * Pastikan gambar berita juga terunggah dan terhapus dengan benar di subfolder `articles/` dalam bucket Supabase Storage.
