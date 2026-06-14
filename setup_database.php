<?php
// setup_database.php
// HAPUS FILE INI SETELAH DIGUNAKAN!

$dbPath = __DIR__ . '/database/database.sqlite';

// Hapus database lama jika ada
if (file_exists($dbPath)) {
    unlink($dbPath);
    echo "Database lama dihapus\n";
}

// Buat database baru
touch($dbPath);
chmod($dbPath, 0777);
echo "Database baru dibuat\n";

// Koneksi ke database
$pdo = new PDO("sqlite:" . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Buat tabel galleries
$pdo->exec("
CREATE TABLE IF NOT EXISTS galleries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    image TEXT NOT NULL,
    category TEXT NOT NULL,
    device_type TEXT,
    description TEXT,
    `order` INTEGER DEFAULT 0,
    is_active INTEGER DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
)
");
echo "Tabel galleries dibuat\n";

// Buat tabel testimonials
$pdo->exec("
CREATE TABLE IF NOT EXISTS testimonials (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    device TEXT NOT NULL,
    device_type TEXT NOT NULL,
    message TEXT NOT NULL,
    rating INTEGER DEFAULT 5,
    avatar TEXT,
    is_approved INTEGER DEFAULT 0,
    created_at DATETIME,
    updated_at DATETIME
)
");
echo "Tabel testimonials dibuat\n";

// Insert sample data
$pdo->exec("
INSERT OR IGNORE INTO testimonials (name, device, device_type, message, rating, is_approved, created_at, updated_at)
VALUES 
    ('Sarah Wijaya', 'iPhone 11', 'iphone', 'Service sangat cepat dan profesional! iPhone 11 saya mati total, 1 hari sudah selesai.', 5, 1, datetime('now'), datetime('now')),
    ('Budi Santoso', 'Samsung S22 Ultra', 'android', 'Ganti LCD hasilnya sempurna seperti baru. Harga terjangkau dan garansi panjang.', 5, 1, datetime('now'), datetime('now')),
    ('Linda Kartika', 'Xiaomi 12 Pro', 'android', 'Service battery fast respon dan hasil memuaskan. Recommended!', 5, 1, datetime('now'), datetime('now'))
");
echo "Sample data testimonial dimasukkan\n";

echo "\n✅ Setup database selesai!\n";
echo "📁 Database location: " . $dbPath . "\n";
echo "⚠️  HAPUS FILE setup_database.php SEKARANG untuk keamanan!\n";
