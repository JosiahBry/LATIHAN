# Sistem Pendaftaran Sekolah

Project ini adalah aplikasi web untuk pendaftaran siswa sekolah menggunakan PHP, MySQL, dan AJAX.

## Fitur

- Menampilkan daftar siswa
- Menambah siswa baru (dengan AJAX)
- Menghapus data siswa
- Interface yang responsif dengan Bootstrap

## Persyaratan Sistem

- Web server dengan PHP (XAMPP, WAMP, LAMP, atau serupa)
- MySQL Database
- Browser web modern

## Cara Menjalankan

### 1. Install Web Server

#### Untuk Windows:
- Download dan install [XAMPP](https://www.apachefriends.org/download.html)
- Jalankan XAMPP Control Panel
- Start Apache dan MySQL

#### Untuk Mac:
- Download dan install [XAMPP](https://www.apachefriends.org/download.html) atau [MAMP](https://www.mamp.info/)

#### Untuk Linux:
```bash
sudo apt install apache2 php mysql-server php-mysql
```

### 2. Setup Database

1. Buka browser dan akses `http://localhost/phpmyadmin`
2. Klik "Import" di menu atas
3. Pilih file `db_sekolah.sql` dari folder project
4. Klik "Go" untuk mengimport database

**Atau bisa juga dengan cara manual:**
1. Buka phpMyAdmin
2. Buat database baru dengan nama `db_sekolah`
3. Jalankan query SQL berikut:

```sql
CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    jenis_kelamin VARCHAR(10),
    tanggal_lahir DATE
);
```

### 3. Setup Project

1. Copy folder project ke direktori web server:
   - **XAMPP Windows**: `C:\xampp\htdocs\pendaftaran-sekolah`
   - **XAMPP Mac**: `/Applications/XAMPP/htdocs/pendaftaran-sekolah`
   - **Linux**: `/var/www/html/pendaftaran-sekolah`

2. Pastikan konfigurasi database di `config.php` sesuai:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_sekolah";
```

### 4. Jalankan Aplikasi

1. Pastikan Apache dan MySQL sudah berjalan
2. Buka browser dan akses: `http://localhost/pendaftaran-sekolah`
3. Aplikasi siap digunakan!

## Struktur File

```
pendaftaran-sekolah/
├── index.php           # Halaman utama (daftar siswa)
├── tambah_ajax.php     # Form tambah siswa
├── register_ajax.php   # Backend untuk registrasi
├── hapus_ajax.php      # Backend untuk hapus data
├── config.php          # Konfigurasi database
├── db_sekolah.sql      # File database
└── README.md           # Dokumentasi ini
```

## Penggunaan

1. **Melihat Daftar Siswa**: Buka halaman utama
2. **Menambah Siswa**: Klik tombol "Tambah Siswa" dan isi form
3. **Menghapus Siswa**: Klik tombol "Hapus" pada baris data siswa

## Troubleshooting

### Error "Koneksi gagal"
- Pastikan MySQL sudah berjalan
- Periksa konfigurasi database di `config.php`
- Pastikan database `db_sekolah` sudah dibuat

### Error "Page not found"
- Pastikan Apache sudah berjalan
- Periksa path folder project di htdocs
- Pastikan mengakses URL yang benar

### AJAX tidak bekerja
- Pastikan JavaScript diaktifkan di browser
- Periksa console browser untuk error
- Pastikan jQuery berhasil dimuat

## Pengembangan Lebih Lanjut

Project ini dapat dikembangkan dengan menambahkan:
- Fitur edit data siswa
- Sistem login/autentikasi
- Validasi form yang lebih baik
- Pencarian dan filter data
- Export data ke Excel/PDF
- Upload foto siswa

## Lisensi

Project ini dibuat untuk tujuan pembelajaran. 