# 🏍️ Toko Online - CodeIgniter 4

Proyek ini adalah aplikasi toko online berbasis web yang dikembangkan menggunakan framework **CodeIgniter 4**. Aplikasi ini mendukung fitur penjualan produk, manajemen diskon dinamis oleh admin, keranjang belanja, sistem checkout dengan ongkir, serta integrasi Web Service API untuk dashboard eksternal.

---

## 📌 Fitur Aplikasi

### 👤 Autentikasi Pengguna

* Register dan login pengguna
* Role: admin & user biasa
* Manajemen sesi login

### 🍭 Produk & Diskon

* Menampilkan daftar produk
* Fitur pencarian produk
* Gambar produk
* Diskon otomatis (jika tersedia hari ini)

### 🛒 Keranjang Belanja

* Tambah produk ke keranjang
* Edit kuantitas produk
* Hapus produk dari keranjang
* Diskon langsung diterapkan pada total keranjang

### 💵 Checkout & Transaksi

* Form alamat pengiriman
* Pilih kelurahan dan layanan pengiriman (RajaOngkir API)
* Hitung ongkir otomatis
* Simpan transaksi lengkap (total, ongkir, alamat, item)

### 📁 Riwayat & Detail Transaksi

* Riwayat transaksi per pengguna
* Detail jumlah item dan subtotal harga

### 🎟️ Manajemen Diskon (Admin)

* Admin bisa menambah, edit, dan hapus diskon
* Diskon berdasarkan tanggal
* Diskon berlaku otomatis jika tanggal hari ini cocok

### 📊 Dashboard Eksternal (API Client)

* Aplikasi dashboard sederhana (client) menampilkan data transaksi dari Web Service API
* Tampil:

  * Username
  * Alamat
  * Total harga
  * Jumlah item
  * Ongkir
  * Status transaksi
  * Tanggal transaksi

---

## ⚙️ Persyaratan Sistem

* PHP >= 8.2
* Composer
* MySQL / MariaDB
* Web server (XAMPP / Laragon)
* API Key dari RajaOngkir (untuk fitur ongkir)
* API Key internal untuk Web Service (default: `iniapinjirwkwkwk`)


### 2. Install Dependency

```bash
composer install
```

### 3. Konfigurasi `.env`

* Rename file `.env.example` → `.env`
* Ubah konfigurasi database dan API key:

  ```dotenv
  database.default.hostname = localhost
  database.default.database = db_ci4
  database.default.username = root
  database.default.password =
  COST_KEY = API_KEY_RAJAONGKIR
  API_KEY = iniapinjirwkwkwkw
  ```

### 4. Buat Database

* Jalankan XAMPP / phpMyAdmin
* Buat database baru dengan nama: `db_ci4`

### 5. Migrasi & Seeder

```bash
php spark migrate
php spark db:seed ProductSeeder
php spark db:seed UserSeeder
```

### 6. Jalankan Server

```bash
php spark serve
```

Akses aplikasi di browser: [http://localhost:8080](http://localhost:8080)

---

## 📂 Struktur Proyek

```
app/
├── Controllers/
│   ├── AuthController.php
│   ├── DiskonController.php
│   ├── ProdukController.php
│   ├── TransaksiController.php
│   └── ApiController.php
├── Models/
│   ├── UserModel.php
│   ├── ProductModel.php
│   ├── TransactionModel.php
│   ├── TransactionDetailModel.php
│   └── DiskonModel.php
├── Views/
│   ├── diskon/              # View admin untuk diskon
│   ├── v_home.php           # Halaman produk
│   ├── v_keranjang.php      # Keranjang belanja
│   ├── v_checkout.php       # Form checkout
│   ├── v_transaksi.php      # Riwayat transaksi
│   └── layout.php           # Template layout utama
public/
├── img/                    # Gambar produk
├── DashboardSederhana/     # Folder dashboard API eksternal
.env
README.md
```

---

## 💻 Dashboard Eksternal (Client API)

### Lokasi

```
public/DashboardSederhana/index.php
```

### Fitur

* Tampilkan semua transaksi dari endpoint API
* Tabel berisi:

  * Username
  * Alamat
  * Total harga
  * Jumlah item
  * Ongkir
  * Status
  * Tanggal transaksi

### Akses

```
http://localhost:8080/
```

