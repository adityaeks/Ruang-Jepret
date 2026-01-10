# Frame PNG Configuration

## Menambahkan Frame Versi Baru

Sistem ini mendukung multiple frame dengan ukuran yang sama. Setiap frame akan muncul sebagai template terpisah di pilihan template.

### Langkah-langkah:

1. **Siapkan File PNG Frame**
   - Simpan file PNG frame baru di folder `public/frames/`
   - Pastikan ukuran frame PNG **sama persis** dengan frame yang ada (867x2048 pixels)
   - Pastikan posisi photo holes (area transparent) **sama persis** dengan frame yang ada
   - Nama file: misalnya `frame-4x3-3photos-v2.png`

2. **Update Konfigurasi di `frame-handler.js`**
   - Buka file `public/js/frame-handler.js`
   - Cari object `this.frameConfigs` (sekitar line 44)
   - Uncomment dan tambahkan konfigurasi frame baru:

   ```javascript
   this.frameConfigs = {
       'frame-v1': {
           id: 'frame-v1',
           name: 'Frame Versi 1',
           path: '/frames/frame-4x3-3photos.png',
           ...sharedConfig
       },
       'frame-v2': {  // ← Uncomment dan sesuaikan
           id: 'frame-v2',
           name: 'Frame Versi 2',
           path: '/frames/frame-4x3-3photos-v2.png',  // ← Ganti dengan path file PNG Anda
           ...sharedConfig  // ← Menggunakan shared config (ukuran dan photoHoles yang sama)
       }
   };
   ```

3. **Refresh Browser**
   - Frame baru akan otomatis muncul sebagai template terpisah di pilihan template
   - Setiap frame akan ditampilkan dengan preview-nya sendiri

### Catatan Penting:

- **Ukuran Frame**: Semua frame harus memiliki ukuran yang sama (867x2048)
- **Photo Holes**: Posisi dan ukuran photo holes harus sama untuk semua frame
- **Transparent Areas**: Pastikan area transparent di PNG frame berada di posisi yang sama
- **File Format**: Gunakan format PNG dengan alpha channel (transparency)

### Jika Frame Memiliki Ukuran atau Photo Holes Berbeda:

Jika frame baru memiliki ukuran atau posisi photo holes yang berbeda, Anda perlu membuat `sharedConfig` terpisah. Hubungi developer untuk bantuan lebih lanjut.

