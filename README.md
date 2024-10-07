# Klinik Nemara (View Berbasis CRUD)

Berikut tampilan view kami yang telah tersabungkan kedalam 1 database. View ini terbagi menjadi 3 file berbeda yaitu:
- userNemara
- doctorNemara
- adminNemara

## User:

### Untuk melakukan reservasi Konsultasi atau treatment, silakan ikuti langkah-langkah berikut:
1) Jalankan `userNemara` menggunakan command `php artisan serve`
2) Kunjungi halaman Utama, lalu pilih **Reservation**
3) Pilih **Saya Klien Baru** untuk konsultasi, pilih **Saya Klien Lama** untuk treatment
4) Setelah mengisi data untuk konsultasi atau treatment, klik **Book**.

### Untuk melakukan pembelian produk, silakan ikuti langkah-langkah berikut:
1) Jalankan `userNemara` menggunakan command `php artisan serve`
2) Kunjungi halaman Utama, lalu pilih **Buy Products**
3) Pilih pembelian produk melalui Shopee atau pembelian melalui klinik
4) Setelah mengisi data untuk pengambilan produk, klik **Pesan Sekarang**

## Akun login

### Dokter:

Untuk melakukan login sebagai dokter, silakan ikuti langkah-langkah berikut:

1) Jalankan `doctorNemara` menggunakan command `php artisan serve`
2) Kunjungi halaman login dengan mengetikkan URL berikut: `/login`
3) Setelah halaman login terbuka, masukkan akun Dokter Anda pada kolom yang tersedia:
    - **Username**: `dr.fina`
    - **Password**: `ahli1`
4) Setelah mengisi username dan password, klik tombol **Login**.

### Admin:

Kemudian, untuk melakukan login sebagai admin, silakan ikuti langkah-langkah berikut:

1) Jalankan `doctorNemara` menggunakan command `php artisan serve`
2) Kunjungi halaman login dengan mengetikkan URL berikut: `/admin/login`
3) Pada halaman login, masukkan akun Admin Anda di kolom yang tersedia:
    - **Username**: `admin1`
    - **Password**: `nemarasukses`
4) Setelah mengisi username dan password, klik tombol **Login**.
