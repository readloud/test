#!/bin/bash

echo "========================================="
echo "    Laravel Error 500 Diagnostic Tool"
echo "========================================="
echo ""

PROJECT_DIR="/home/svn/test/my-cellular"
cd $PROJECT_DIR

echo "1. Checking PHP Version..."
php -v | head -1
echo ""

echo "2. Checking Laravel Version..."
php artisan --version 2>/dev/null || echo "❌ Artisan not found"
echo ""

echo "3. Checking Folder Permissions..."
echo "storage: $(ls -ld storage | awk '{print $1}')"
echo "bootstrap/cache: $(ls -ld bootstrap/cache | awk '{print $1}')"
echo "public: $(ls -ld public | awk '{print $1}')"
echo ""

echo "4. Checking .env file..."
if [ -f ".env" ]; then
    echo "✅ .env exists"
    echo "APP_DEBUG=$(grep APP_DEBUG .env | cut -d'=' -f2)"
    echo "APP_ENV=$(grep APP_ENV .env | cut -d'=' -f2)"
else
    echo "❌ .env file missing!"
    echo "Run: cp .env.example .env && php artisan key:generate"
fi
echo ""

echo "5. Checking Database..."
if [ -f "database/database.sqlite" ]; then
    echo "✅ Database exists"
    echo "Size: $(du -h database/database.sqlite | cut -f1)"
else
    echo "❌ Database missing!"
    echo "Run: touch database/database.sqlite"
fi
echo ""

echo "6. Checking Vendor..."
if [ -d "vendor" ]; then
    echo "✅ Vendor exists"
else
    echo "❌ Vendor missing!"
    echo "Run: composer install"
fi
echo ""

echo "7. Checking Latest Errors..."
if [ -f "storage/logs/laravel.log" ]; then
    echo "Last 5 errors:"
    tail -20 storage/logs/laravel.log | grep -i error | tail -5
else
    echo "❌ No log file found"
fi
echo ""

echo "8. Checking PHP Extensions..."
php -m | grep -E "pdo_sqlite|sqlite3|mbstring|json|tokenizer|xml" | head -10
echo ""

echo "========================================="
echo "Suggestions:"
echo "========================================="
echo "Run these commands if issues found:"
echo ""
echo "1. Fix permissions:"
echo "   chmod -R 775 storage bootstrap/cache"
echo ""
echo "2. Clear cache:"
echo "   php artisan optimize:clear"
echo ""
echo "3. Re-run migration:"
echo "   php artisan migrate:fresh --force"
echo ""
echo "4. Set correct .env values:"
echo "   APP_DEBUG=false"
echo "   APP_URL=https://yourdomain.com"
echo ""
echo "5. Check storage/logs/laravel.log for details"
