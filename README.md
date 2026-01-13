# UAS Pemrograman Web

# Nama : Althaf Afif Faiz
# NIM : 312410404
# Kelas : TI.24.A.3

___  
# Aplikasi Manajemen Toko HandPhone 
___  


# Struktur Folder :  
```
uas_toko_hp/
│
├── app/                       <-- (LOGIKA PROGRAM)
│   ├── config/
│   │   └── config.php         (Berisi konstanta BASEURL & DB info)
│   │
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   └── HomeController.php
│   │
│   ├── core/                  <-- (JANTUNG MVC)
│   │   ├── App.php            (Mengatur URL/Routing)
│   │   ├── Controller.php     (Class utama Controller)
│   │   ├── Database.php       (Wrapper koneksi ke database)
│   │   └── Flasher.php        (Untuk pesan flash alert)
│   │
│   ├── models/
│   │   ├── ProductModel.php   (CRUD & Statistik Produk)
│   │   └── UserModel.php      (Login & Auth User)
│   │
│   └── views/                 <-- (TAMPILAN HTML)
│       ├── auth/
│       │   └── login.php
│       │
│       ├── dashboard/
│       │   ├── create.php     (Form Tambah HP)
│       │   ├── edit.php       (Form Edit HP)
│       │   └── index.php      (Tabel & Statistik Dashboard)
│       │
│       ├── home/
│       │   ├── index.php
│       │   └── detail.php
│       │
│       └── templates/
│           ├── header.php     (Navbar & CSS)
│           └── footer.php     (Script JS)
│
├── public/                    <-- (FILE YANG DIAKSES BROWSER)
│   ├── css/
│   │   ├── bootstrap.css
│   │   └── style.css
│   │
│   ├── img/                   <-- (TEMPAT GAMBAR DI-UPLOAD)
│   │   ├── default.jpg        (Gambar bawaan jika user tidak upload)
│   │   └── ... (file gambar hp lainnya)
│   │
│   ├── js/
│   │   ├── bootstrap.js
│   │   └── script.js
│   │
│   ├── .htaccess              (PENTING: Mengarahkan semua request ke index.php)
│   └── index.php              (PINTU GERBANG UTAMA/BOOTSTRAPPING)
│
└── .htaccess                  (PENTING: Redirect request ke folder public/)
```

## Penjelasan Folder Penting
1. app/: Folder ini berisi logika rahasia. Pengguna tidak boleh mengakses file di sini secara langsung lewat browser.  
2. controllers/: Mengubungkan Model dan View (seperti DashboardController.php yang kita buat).  
3. models/: Berhubungan langsung dengan Database SQL (seperti ProductModel.php).  
4. views/: File HTML yang dilihat user.  
5. public/: Hanya folder ini yang boleh diakses browser.  
6. img/: Sangat Penting! Pastikan folder ini ada. Jika belum ada, buat manual. Di sinilah script move_uploaded_file akan menyimpan gambar HP.  
7. index.php: File yang pertama kali dijalankan saat website dibuka.

___  
# 📱 APSTORE - Sistem Manajemen Stok & Point of Sale (POS)
___  
APSTORE adalah aplikasi berbasis web untuk manajemen stok dan penjualan toko Handphone. Dibangun menggunakan PHP Native dengan konsep MVC (Model-View-Controller) yang rapi, aman, dan mudah dikembangkan.

Aplikasi ini dirancang untuk membantu pemilik toko memantau stok fisik, menghitung omset kotor, serta mengetahui profit bersih secara real-time berdasarkan harga modal dan harga jual.


___  
# 🚀 Fitur Utama
___  
Admin Dashboard: Statistik visual untuk Total Stok, Barang Terjual, Omset (Kotor), dan Profit (Bersih).

Manajemen Produk (CRUD): Tambah, Edit, Hapus, dan Lihat detail produk HP.

Perhitungan Laba Otomatis: Sistem menghitung margin keuntungan (Harga Jual - Modal Beli) secara otomatis.

Upload Gambar: Dukungan upload gambar produk dengan validasi ukuran dan ekstensi.

Indikator Stok: Visualisasi stok aman (Hijau) dan stok menipis (Merah).

Pencarian Cepat: Fitur pencarian produk berdasarkan Merk atau Tipe.

Autentikasi: Sistem Login Admin yang aman menggunakan Session.

Arsitektur MVC: Struktur kode terpisah antara Logika (Controller), Data (Model), dan Tampilan (View).


___  
# 🛠️ Teknologi yang Digunakan
___  
Backend: PHP 8.0+ (Native MVC Pattern)

Database: MySQL

Frontend: Bootstrap 5 (CSS Framework)

Icons: Bootstrap Icons

Server: Apache (via XAMPP/Laragon)

___  
# UI Dari Aplikasi APSTORE :
___  

## 1. Tampilan Login :
<img width="1918" height="968" alt="image" src="https://github.com/user-attachments/assets/6b2178e7-0754-47f7-b68c-b011e3fc9c7d" />

## 2. Dashboard Dari User :
<img width="1919" height="971" alt="image" src="https://github.com/user-attachments/assets/960d607c-3fc9-4aed-8dbd-4cd272db30a0" />

## 3. Info Detail Produk : 
<img width="1919" height="964" alt="image" src="https://github.com/user-attachments/assets/fdb6902f-b3a1-4215-a176-09b3bdeae571" />

## 4. Dashboard dari Admin :
<img width="1917" height="973" alt="image" src="https://github.com/user-attachments/assets/f63426d7-6bac-4ab3-888c-8e6df3780b3b" />

