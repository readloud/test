# Solusi Error 500 pada Website Laravel

Error 500 (Internal Server Error) bisa disebabkan oleh berbagai hal. Berikut panduan lengkap untuk mendiagnosis dan memperbaikinya.

## 🔍 Langkah 1: Cek Log Error Laravel

```bash
# Cek log terbaru
cat /home/svn/test/my-cellular/storage/logs/laravel.log | tail -50

# Atau jika file terlalu besar
tail -100 /home/svn/test/my-cellular/storage/logs/laravel.log
```

## 🔍 Langkah 2: Aktifkan Debug Mode Sementara

Edit file `.env`:

```env
APP_DEBUG=true
APP_ENV=local
```

**Setelah selesai debugging, kembalikan ke:**
```env
APP_DEBUG=false
APP_ENV=production
```

## 🔍 Langkah 3: Periksa Error dari Browser

Buka website di browser, kemudian:
- **Chrome/Edge**: F12 → Console tab
- **Firefox**: F12 → Console tab

Lihat apakah ada error JavaScript atau network error.

## 🛠️ Solusi Berdasarkan Penyebab Umum

### A. **Permission Error**

```bash
# Set permission yang benar
cd /home/svn/test/my-cellular

# Set ownership (jika perlu)
chown -R www-data:www-data storage bootstrap/cache
# Atau untuk shared hosting
chown -R $(whoami):$(whoami) storage bootstrap/cache

# Set permission folder
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 755 public

# Set permission file
find storage -type f -exec chmod 664 {} \;
find bootstrap/cache -type f -exec chmod 664 {} \;
```

### B. **Missing Vendor/Autoload**

```bash
# Install composer dependencies
cd /home/svn/test/my-cellular
composer install --no-interaction

# Jika composer tidak tersedia di server, upload vendor dari lokal
# Atau force autoload dump
composer dump-autoload
```

### C. **Cache Konfigurasi Bermasalah**

```bash
# Clear semua cache
php artisan optimize:clear
# Atau
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Re-cache untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### D. **Error pada .env File**

```bash
# Backup .env dulu
cp .env .env.backup

# Generate ulang .env
php artisan key:generate

# Periksa syntax .env (pastikan tidak ada spasi di nilai)
# Contoh BENAR:
APP_NAME="HP Service"
APP_DEBUG=false

# Contoh SALAH:
APP_NAME = "HP Service"  # Ada spasi sebelum =
```

### E. **Error pada File index.php**

Akses `https://domainanda.com/test.php` - jika muncul, berarti PHP berjalan.

**Hapus file ini setelah selesai!**

### F. **Error Koneksi Database**

Akses `https://domainanda.com/db-test.php`:

**Hapus file ini setelah selesai!**

### G. **.htaccess Bermasalah**

Buat backup `.htaccess` dan gunakan versi minimal:

```apache
# public/.htaccess
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    # Redirect Trailing Slashes
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]
    
    # Handle Front Controller
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Disable directory listing
Options -Indexes

# Protect .env file
<Files .env>
    Order allow,deny
    Deny from all
</Files>
```

### H. **PHP Version Tidak Kompatibel**

Akses `https://domainanda.com/phpinfo.php

**HAPUS FILE INI SETELAH DIGUNAKAN!**

```bash
# Cek versi PHP
php -v

# Laravel 10/11 membutuhkan PHP >= 8.1
# Jika versi PHP terlalu rendah, upgrade ke PHP 8.1 atau 8.2
```
### I. **Extension PHP Kurang**

Pastikan extension berikut aktif di `php.ini`:

```ini
extension=pdo_sqlite
extension=sqlite3
extension=mbstring
extension=json
extension=tokenizer
extension=xml
extension=fileinfo
```

### J. **Struktur Path Salah**

Periksa file `public/index.php`:

```php
<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Pastikan path ini benar
require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Request::capture();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
```

## 📋 Script Diagnostik Lengkap

Buat file `diagnose.sh` di root project:

```bash
chmod +x diagnose.sh
./diagnose.sh
```

## ⚡ Quick Fix

```bash
cd /home/svn/test/my-cellular

# 1. Backup dulu
cp .env .env.backup

# 2. Set debug mode
sed -i 's/APP_DEBUG=false/APP_DEBUG=true/' .env
sed -i 's/APP_ENV=production/APP_ENV=local/' .env

# 3. Clear semua cache
php artisan optimize:clear

# 4. Fix permissions
chmod -R 775 storage bootstrap/cache

# 5. Cek error di browser (akan muncul detail error)
# Buka website di browser, refresh

# 6. Setelah tahu errornya, kembalikan .env
cp .env.backup .env
```

## 📧 Jika Masih Error, Kirimkan Informasi Ini

Kirimkan hasil dari perintah berikut:

```bash
cd /home/svn/test/my-cellular

# 1. Log error terbaru
tail -50 storage/logs/laravel.log

# 2. PHP version
php -v

# 3. Environment
cat .env | grep -E "APP_|DB_"

# 4. File permissions
ls -la storage
ls -la bootstrap/cache
ls -la public

# 5. Hasil diagnose.sh
