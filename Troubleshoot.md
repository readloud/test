# Solusi Error Database SQLite pada Laravel

### Langkah 1: Hapus File Database SQLite

```bash
# Hapus file database.sqlite yang ada
rm /home/svn/test/my-cellular/database/database.sqlite
```

### Langkah 2: Buat File Database Baru

```bash
# Buat file database.sqlite kosong
touch /home/svn/test/my-cellular/database/database.sqlite

# Beri permission writable
chmod 777 /home/svn/test/my-cellular/database/database.sqlite
```


### Langkah 3: Hapus Semua Migration Lama dan Jalankan Ulang

```bash
# Masuk ke direktori project
cd /home/svn/test/my-cellular

# Hapus semua file migration lama (kecuali file baru yang sudah dibuat)
rm database/migrations/*.php

# Copy file migration baru ke folder database/migrations/
# (sudah selesai di langkah 3)

# Jalankan migration dari awal
php artisan migrate:fresh --force
```

### Langkah 5: Jalankan Migration dengan Perintah yang Benar

```bash
# Opsi 1: Reset dan jalankan semua migration dari awal
php artisan migrate:fresh --seed

# Opsi 2: Jika hanya ingin menjalankan migration tanpa seeder
php artisan migrate:fresh

# Opsi 3: Rollback dan migrate ulang
php artisan migrate:rollback
php artisan migrate
```

### Langkah 6: Jika Masih Error, Gunakan SQLite Manual

```bash
cd /home/svn/test/my-cellular
php setup_database.php
```

**SETELAH BERHASIL, HAPUS FILE TERSEBUT!**

```bash
rm setup_database.php
```

### Langkah 8: Perbaiki Konfigurasi .env

Pastikan konfigurasi database SQLite benar:

```env
DB_CONNECTION=sqlite
# DB_HOST=
# DB_PORT=
# DB_DATABASE=/home/svn/test/my-cellular/database/database.sqlite
DB_DATABASE=/absolute/path/to/your/database.sqlite
```

**Catatan:** Gunakan **absolute path** (full path) untuk DB_DATABASE, bukan relative path.

### Langkah 9: Cache Konfigurasi Ulang

```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

### Langkah 10: Buat Storage Link

```bash
php artisan storage:link
```

---

## 📋 Script Perbaikan Otomatis

```bash
chmod +x fix_database.sh
./fix_database.sh
```

---

## 🚨 Pencegahan Error

### 1. Gunakan Migration yang Idempotent

```php
// Gunakan dropIfExists sebelum create
Schema::dropIfExists('table_name');
Schema::create('table_name', function (Blueprint $table) {
    // ...
});
```

### 2. Gunakan `migrate:fresh` untuk Development

```bash
php artisan migrate:fresh --seed
```

### 3. Backup Database Sebelum Migration

```bash
cp database/database.sqlite database/database.sqlite.backup
php artisan migrate
```

### 4. Hindari Foreign Key di SQLite (Opsional)

SQLite memiliki dukungan terbatas untuk foreign key. Jika masalah berlanjut, hapus sementara foreign key constraints:

```php
// Di config/database.php
'sqlite' => [
    // ...
    'foreign_key_constraints' => false, // Nonaktifkan sementara
],
```

---
