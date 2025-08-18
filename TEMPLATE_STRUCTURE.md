# Struktur Template Blade - RuangJepret (Sederhana)

## Overview
Proyek ini menggunakan Blade template Laravel dengan struktur yang sederhana dan mudah dikelola.

## Struktur Direktori

```
resources/views/
├── layouts/
│   └── app.blade.php          # Layout utama yang digunakan semua halaman
├── components/
│   ├── navbar.blade.php       # Komponen navbar
│   └── footer.blade.php       # Komponen footer
└── welcome.blade.php          # Halaman utama dengan semua konten
```

## Layout Utama (`layouts/app.blade.php`)

Layout utama yang berisi:
- Meta tags dan head section
- Konfigurasi Tailwind CSS
- Struktur HTML dasar
- Include navbar dan footer
- Yield untuk content dan stack untuk styles/scripts

### Penggunaan:
```php
@extends('layouts.app')

@section('title', 'Judul Halaman')

@section('content')
    <!-- Konten halaman -->
@endsection

@push('styles')
    <!-- CSS tambahan -->
@endpush

@push('scripts')
    <!-- JavaScript tambahan -->
@endpush
```

## Komponen (`components/`)

### 1. Navbar (`components/navbar.blade.php`)
- Navbar yang konsisten di semua halaman
- Logo dan menu navigasi
- Tombol login

### 2. Footer (`components/footer.blade.php`)
- Footer dengan informasi perusahaan
- Social media links
- Copyright

## Halaman Utama (`welcome.blade.php`)

Halaman utama yang berisi semua section:
- **Hero Section**: Banner utama dengan judul dan CTA
- **Features Section**: Penjelasan fitur-fitur aplikasi
- **Gallery Section**: Galeri foto dengan hover effects

### Struktur Konten:
```php
@extends('layouts.app')

@section('title', 'RuangJepret - Digital Photobooth Service')

@section('content')
    <!-- Hero Section -->
    <header>...</header>
    
    <!-- Features Section -->
    <section>...</section>
    
    <!-- Gallery Section -->
    <section>...</section>
@endsection
```

## Keuntungan Struktur Ini

1. **Sederhana**: Hanya 4 file utama yang perlu dikelola
2. **Mudah Dipahami**: Struktur yang jelas dan straightforward
3. **Konsisten**: Layout yang konsisten di semua halaman
4. **Maintainable**: Mudah untuk mengubah komponen navbar/footer
5. **Efisien**: Tidak ada file yang berlebihan

## Cara Menambah Halaman Baru

1. Buat file baru di `resources/views/`
2. Extend layout utama: `@extends('layouts.app')`
3. Definisikan title: `@section('title', 'Judul Halaman')`
4. Tambahkan content: `@section('content') ... @endsection`

### Contoh Halaman Baru:
```php
@extends('layouts.app')

@section('title', 'Halaman Baru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Judul Halaman</h1>
        <p>Konten halaman...</p>
    </div>
@endsection
```

## Tips Pengembangan

1. **Gunakan layout utama** untuk semua halaman
2. **Navbar dan footer** akan otomatis muncul di semua halaman
3. **Konten utama** bisa langsung ditulis di section content
4. **CSS/JS tambahan** bisa ditambahkan menggunakan @push
5. **Gunakan Tailwind CSS** untuk styling yang konsisten

## Struktur yang Dihapus

Untuk menyederhanakan, file-file berikut telah dihapus:
- `sections/` - Semua section sekarang ada di welcome.blade.php
- `components/feature-card.blade.php` - Tidak diperlukan
- `components/gallery-item.blade.php` - Tidak diperlukan
- `about.blade.php` - Contoh halaman yang tidak diperlukan

Struktur ini lebih sederhana dan mudah dikelola untuk proyek yang tidak terlalu kompleks. 
