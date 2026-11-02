# Manis Pagi Bakery – UTS Praktek Pemrograman Web 2

Lanjutan Project Mandiri **My Store**, dikembangkan menjadi toko roti dan kue **Manis Pagi Bakery**.
Dibuat dengan **PHP (MVC), MySQL, CSS, dan JavaScript**.

## Identitas
- Nama   : Natasya Enjelika Sijabat
- NIM    : 25110119
- Prodi  : Teknik Komputer – Group B
- Dosen  : Primatua Sitompul, M.Kom

## Isi Pekerjaan (sesuai soal)
| No | Task | Status |
|----|------|--------|
| 1 | Login Admin berbasis UI, lalu diarahkan ke Dashboard Admin | Selesai |
| 1a | **Create** menu baru | Selesai |
| 1b | **Update** menu yang sudah ada | Selesai |
| 1c | **Delete** menu yang discontinued | Selesai |
| 2 | Data dummy minimal 25 produk | 30 produk bakery di `database/db.sql` |
| 3 | `readme.md` | File ini |
| 4 | Folder `screenshoot` | Ada di root project |
| 5 | Push GitHub `uts-<prodi>-<namakamu>` | Lihat di bawah |

## Fitur
- Login admin dengan password **BCRYPT** dan session. Hanya role `admin` yang bisa masuk.
- Dashboard: jumlah menu, total stok, nilai persediaan, jumlah pengguna.
- CRUD menu (nama, kategori, harga, stok, deskripsi) dengan pencarian langsung dan konfirmasi hapus.
- CRUD pengguna (khusus admin), halaman beranda publik, dan registrasi akun biasa.
- Stok di bawah 10 ditandai merah.
- Custom CSS responsif bertema bakery, plus JavaScript.
- PDO prepared statement dan `htmlspecialchars` untuk keamanan dasar.

## Kategori Produk
Roti, Pastry, Kue, Kue Kering, Minuman.

## Akun Demo
| Email | Password |
|-------|----------|
| admin@manispagi.com | admin123 |

## Cara Menjalankan
1. Nyalakan **Apache** dan **MySQL** di XAMPP.
2. Buka `http://localhost/phpmyadmin`, tab **Import**, pilih `database/db.sql`, klik **Import** (membuat database `bakery_db`).
3. Salin folder project ke `C:\xampp\htdocs\manis-pagi`.
4. Buka `http://localhost/manis-pagi/public/` lalu klik **Login Admin**.
   (Alternatif: `php -S localhost:8000 -t public`, lalu buka `http://localhost:8000`.)
5. Jika password MySQL tidak kosong, ubah `app/config/database.php`.

## Struktur Folder
```
manis-pagi/
├── app/
│   ├── config/  core/  models/  controllers/  views/
├── public/      index.php, css/, js/
├── database/    db.sql
├── screenshoot/ bukti tampilan
└── readme.md
```

## Push ke GitHub
```bash
git init
git add .
git commit -m "UTS Praktek Pemrograman Web 2 - Manis Pagi Bakery"
git branch -M main
git remote add origin https://github.com/<username>/uts-<prodi>-<namakamu>.git
git push -u origin main
```
