# SUGIH — CV. Prioritas Group

Website pemasaran & profil perusahaan untuk brand **SUGIH** (kretek dari Cianjur), dibangun dengan **Laravel 12 + Blade + Tailwind CSS** dan **Supabase** (Auth, Postgres DB, Storage).

> Status iterasi ini: **struktur project + Landing Page** sudah jadi. Halaman About / Products / Articles / Contact sudah punya route, controller, view skeleton — siap diisi.

---

## 🧱 Tech Stack

| Layer      | Teknologi                                        |
|------------|--------------------------------------------------|
| Backend    | PHP 8.2+, **Laravel 12**, Eloquent ORM           |
| Frontend   | Blade Templates, **Tailwind CSS 3.4**, Alpine.js |
| Build      | Vite 5                                           |
| Carousel   | Swiper.js                                        |
| Database   | **Supabase Postgres** (driver `pgsql`)           |
| Auth       | **Supabase Auth** (via REST + middleware skeleton)|
| Storage    | **Supabase Storage** bucket                      |
| HTTP       | GuzzleHTTP (untuk komunikasi ke Supabase REST)   |

---

## 📁 Struktur Folder

```
sugih-website/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php       ← landing page (Beranda)
│   │   │   ├── AboutController.php      ← Sejarah
│   │   │   ├── ProductController.php    ← Produk + detail
│   │   │   ├── ArticleController.php    ← Berita + detail
│   │   │   └── ContactController.php
│   │   ├── Middleware/
│   │   │   └── SupabaseAuthenticate.php ← verifikasi JWT Supabase
│   │   └── Requests/
│   │       └── StoreContactMessageRequest.php
│   ├── Models/
│   │   ├── Product.php
│   │   ├── Article.php
│   │   └── ContactMessage.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   └── SupabaseServiceProvider.php   ← daftarkan layanan Supabase
│   └── Services/
│       ├── SupabaseClient.php            ← wrapper HTTP ke Supabase
│       ├── SupabaseAuthService.php       ← signUp / signIn / getUser
│       └── SupabaseStorageService.php    ← upload / publicUrl / delete
│
├── bootstrap/
│   ├── app.php
│   ├── providers.php
│   └── cache/
│
├── config/
│   ├── app.php
│   ├── database.php       ← koneksi pgsql Supabase
│   ├── services.php
│   ├── view.php
│   └── supabase.php       ← URL, anon key, service key, bucket
│
├── database/
│   ├── migrations/
│   │   ├── 2025_01_01_000001_create_products_table.php
│   │   ├── 2025_01_01_000002_create_articles_table.php
│   │   └── 2025_01_01_000003_create_contact_messages_table.php
│   ├── factories/
│   └── seeders/DatabaseSeeder.php
│
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── images/             ← logo SVG + placeholder gambar
│
├── resources/
│   ├── css/app.css         ← Tailwind + custom palette SUGIH (hijau/gold/red)
│   ├── js/
│   │   ├── app.js          ← Alpine.js + Swiper init
│   │   └── bootstrap.js
│   └── views/
│       ├── layouts/app.blade.php
│       ├── partials/
│       │   ├── header.blade.php   ← sticky green nav + hamburger
│       │   ├── warning.blade.php  ← peringatan cukai 21+
│       │   └── footer.blade.php   ← alamat, kontak, QR lokasi
│       └── pages/
│           ├── home/index.blade.php      ← LANDING PAGE FULL ✅
│           ├── about/index.blade.php
│           ├── products/{index,show}.blade.php
│           ├── articles/{index,show}.blade.php
│           └── contact/index.blade.php
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── postcss.config.js
├── tailwind.config.js
└── vite.config.js
```

---

## 🚀 Cara Menjalankan (Local)

### 1. Prasyarat
- PHP 8.2+ dengan extensions: `pdo_pgsql`, `mbstring`, `openssl`, `curl`, `xml`, `bcmath`
- Composer 2
- Node.js 18+ dan Yarn / NPM
- Akun Supabase (gratis)

### 2. Clone & Install
```bash
cd sugih-website
composer install
yarn install              # atau: npm install
cp .env.example .env
php artisan key:generate
```

### 3. Setup Supabase
1. Buat project baru di [supabase.com](https://supabase.com).
2. Ambil dari **Project Settings → API**:
   - Project URL → `SUPABASE_URL`
   - `anon` public key → `SUPABASE_ANON_KEY`
   - `service_role` secret key → `SUPABASE_SERVICE_ROLE_KEY`
   - JWT Secret → `SUPABASE_JWT_SECRET`
3. Ambil dari **Project Settings → Database**:
   - Host → `DB_HOST` (contoh: `db.xxxxxxxx.supabase.co`)
   - Database password → `DB_PASSWORD`
4. Buat **Storage Bucket** publik bernama `sugih-public` (atau sesuaikan `SUPABASE_STORAGE_BUCKET`).
5. Isi `.env` lalu jalankan migrasi:
   ```bash
   php artisan migrate
   ```

### 4. Jalankan
```bash
# Terminal 1 — backend
php artisan serve

# Terminal 2 — frontend (Vite hot-reload)
yarn dev
```

Buka: <http://localhost:8000>

### 5. Build production
```bash
yarn build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🗺️ Routes

| Method | URL                | Nama route        | Controller                      |
|--------|--------------------|-------------------|---------------------------------|
| GET    | `/`                | `home`            | `HomeController@index`          |
| GET    | `/sejarah`         | `about`           | `AboutController@index`         |
| GET    | `/produk`          | `products.index`  | `ProductController@index`       |
| GET    | `/produk/{slug}`   | `products.show`   | `ProductController@show`        |
| GET    | `/berita`          | `articles.index`  | `ArticleController@index`      |
| GET    | `/berita/{slug}`   | `articles.show`   | `ArticleController@show`        |
| GET    | `/kontak`          | `contact`         | `ContactController@index`       |
| POST   | `/kontak`          | `contact.store`   | `ContactController@store`       |

---

## 🎨 Design Tokens (Tailwind)

Palette SUGIH didefinisikan di `tailwind.config.js`:

```js
sugih.green.700  // #103f1a — header & footer
sugih.green.900  // #06200b — body background
sugih.gold       // #d6a634 — accent
sugih.red        // #c8312a — CTA button
sugih.cream      // #f5ecd5
```

Font:
- `font-display` → Playfair Display (heading)
- `font-heading` → Anton (mark/label)
- `font-sans`    → Plus Jakarta Sans (body)

---

## 🔌 Integrasi Supabase

### Auth (skeleton siap pakai)
```php
use App\Services\SupabaseAuthService;

public function login(SupabaseAuthService $auth, Request $r) {
    $result = $auth->signInWithPassword($r->email, $r->password);
    // $result['data']['access_token']
}
```

### Storage
```php
use App\Services\SupabaseStorageService;

$storage->upload('products/sugih-original.png', $file->get(), 'image/png');
$url = $storage->publicUrl('products/sugih-original.png');
```

### Middleware Auth (untuk panel admin nanti)
Daftarkan di `bootstrap/app.php`:
```php
$middleware->alias([
    'supabase.auth' => \App\Http\Middleware\SupabaseAuthenticate::class,
]);
```
Lalu pasang ke route:
```php
Route::middleware('supabase.auth')->group(function () {
    Route::get('/admin/dashboard', ...);
});
```

---

## ✅ Yang sudah selesai

- [x] Struktur Laravel 12 lengkap (MVC + Services + Providers)
- [x] Konfigurasi Tailwind dengan palette SUGIH custom
- [x] Layout (`layouts/app.blade.php`) + partials (header, warning, footer)
- [x] **Landing Page** sesuai UI Figma (Hero, Cerita Kami, Produk carousel, Berita carousel, Warning banner, Footer)
- [x] Carousel produk & berita dengan **Swiper.js**
- [x] Routes untuk semua halaman utama
- [x] Controllers + Models + Migrations (Products, Articles, ContactMessages)
- [x] Supabase service layer (Client, Auth, Storage)
- [x] Middleware skeleton untuk Supabase Auth
- [x] Form Request validation untuk Contact
- [x] Placeholder SVG (logo, wordmark, favicon)

## 📌 Next Step

- [ ] Ganti placeholder images di `public/images/` dengan asset Figma asli
- [ ] Isi halaman Sejarah, Produk (list & detail), Berita (list & detail), Kontak
- [ ] Build admin panel (CRUD Products & Articles) — pakai middleware `supabase.auth`
- [ ] Aktifkan upload gambar via `SupabaseStorageService`
- [ ] SEO meta tags & Open Graph
- [ ] Multi-language (id / en)

---

© 2025 CV. Prioritas Group — *Semua Ingin Sugih*.
