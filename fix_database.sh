#!/bin/bash

echo "=== Memperbaiki Database SQLite ==="

# Set direktori project
PROJECT_DIR="/home/svn/test/my-cellular"
DB_PATH="$PROJECT_DIR/database/database.sqlite"

cd $PROJECT_DIR

# Backup database lama jika ada
if [ -f "$DB_PATH" ]; then
    echo "Backup database lama..."
    cp "$DB_PATH" "$DB_PATH.backup_$(date +%Y%m%d_%H%M%S)"
fi

# Hapus database lama
echo "Menghapus database lama..."
rm -f "$DB_PATH"

# Buat database baru
echo "Membuat database baru..."
touch "$DB_PATH"
chmod 777 "$DB_PATH"

# Hapus migration lama
echo "Menghapus migration lama..."
rm -f database/migrations/*.php

# Copy migration baru (sesuaikan path)
# echo "Copy migration baru..."
# cp /path/to/new/migrations/*.php database/migrations/

# Jalankan migration
echo "Menjalankan migration..."
php artisan migrate:fresh --force

# Clear cache
echo "Clear cache..."
php artisan config:clear
php artisan cache:clear

echo "✅ Database berhasil diperbaiki!"
echo "Jalankan 'php artisan db:seed' jika perlu menambah data sample."
