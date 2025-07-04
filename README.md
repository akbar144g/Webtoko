# 🛒 Toko - Aplikasi Manajemen Toko Sederhana (CodeIgniter 4)

Project ini merupakan aplikasi manajemen toko berbasis web yang dibuat menggunakan **CodeIgniter 4**.  
Fitur utamanya mencakup pengelolaan **produk**, **diskon harian**, dan **keranjang belanja**, dengan sistem login untuk admin.

---

## ✨ Fitur

### 🔐 Login Admin

- Sistem autentikasi berbasis username dan password yang sudah dienkripsi (menggunakan bcrypt).
- Hanya user dengan role `'admin'` yang dapat mengakses area manajemen (diskon, data toko, dsb).

### 💰 Diskon Harian Otomatis

- Sistem secara otomatis mengecek apakah ada diskon yang berlaku di tanggal hari ini.
- Jika ada, nominal diskon tersebut akan disimpan ke dalam session untuk digunakan saat transaksi.

### 🧾 CRUD Diskon (Admin Only)

- Admin dapat melakukan **Tambah**, **Edit**, dan **Hapus** data diskon.
- Validasi dilakukan agar tanggal diskon **tidak boleh duplikat**.
- Semua data ditampilkan dalam bentuk **tabel responsif**, dan form input diskon menggunakan **Bootstrap modal** untuk pengalaman pengguna yang baik.

### 🛒 Fitur Keranjang Belanja _(akan dikembangkan)_

- Diskon yang tersimpan otomatis akan diterapkan saat proses checkout.
- Akan dilengkapi dengan fitur detail transaksi dan pengurangan stok barang.

---
