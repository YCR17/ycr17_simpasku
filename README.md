# Simpasku
## Sistem Manajemen Pasien PKU

![PHP](https://img.shields.io/badge/PHP-8.0-blue) ![Laravel](https://img.shields.io/badge/Laravel-10-red) ![License](https://img.shields.io/badge/License-MIT-green)

Simpasku adalah aplikasi **Sistem Manajemen Pasien** berbasis web yang dirancang untuk memudahkan administrasi pasien, manajemen staf, dan kontrol akses multi-level di lingkungan PKU. Aplikasi ini memanfaatkan **PHP Laravel** sebagai backend untuk performa dan keamanan yang optimal.

---

## Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| Login & Register | Autentikasi aman untuk berbagai level pengguna |
| Manajemen Staf (CRUD) | Data lengkap termasuk avatar, email, username, fullname, role, dan password |
| Manajemen Pasien | Integrasi dengan API eksternal untuk sinkronisasi data pasien, CRUD pasien lengkap |
| Multi-Level User | Role-based access control untuk membedakan hak akses admin, staff, atau user lain |

---

## Teknologi

- Backend: **PHP Laravel**
- Database: **MySQL**
- Frontend: **Blade Templates / TailwindCSS / Bootstrap**

---

## Persyaratan Sistem

- PHP >= 8.0  
- Composer  
- MySQL

---

## Instalasi & Setup

1. **Clone Repository**
```bash
git clone https://github.com/YCR17/ycr17_simpasku
cd ycr17_simpasku
```

2. **Install Dependencies**
```bash
composer install
```

3. **Buat File .env**
```bash
cp .env.example .env
```
Konfigurasikan database dan environment sesuai sistem.


---


## Setting Environment (.env)


Pastikan environment di `.env` disesuaikan dengan lokal user:


| Variable | Contoh |
|----------|--------|
| DB_CONNECTION | mysql |
| DB_HOST | 127.0.0.1 |
| DB_PORT | 3306 |
| DB_DATABASE | your_db_name |
| DB_USERNAME | your_db_username |
| DB_PASSWORD | your_db_password |


---

4. **Generate Key Laravel**
```bash
php artisan key:generate
```

5. **Migrasi Database**
```bash
php artisan migrate
```

6. **Seed Database**
```bash
php artisan db:seed
```

7. **Storage Link**
```bash
php artisan storage:link
```

8. **Jalankan Server Laravel**
```bash
php artisan serve
```
Akses aplikasi di `http://localhost:8000`.



## Informasi Login Default


| Role | Username | Password |
|------|----------|----------|
| Admin | admin@pkuwsb.id | KataSandi123 |
| Staff | staffsatu@pkuwsb.id | KataSandi456 |


---

## Tips & Catatan

- Pastikan sudah mengikuti instruksi installasi di atas.
- Pastikan sudah menjalankan `php artisan key:generate`.
- Pastikan sudah menjalankan `php artisan migrate`.
- Pastikan sudah menjalankan `php artisan db:seed`.
- Login menggunakan informasi login default di atas.

---

## License

Lisensi dapat disesuaikan (misal MIT, GPL, atau internal/private).
