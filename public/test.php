<?php
// public/test.php
echo "PHP Version: " . phpversion() . "<br>";
echo "Laravel Path: " . __DIR__ . "<br>";

// Cek ekstensi yang dibutuhkan
$required = ['pdo', 'pdo_sqlite', 'json', 'mbstring', 'tokenizer', 'xml'];
foreach($required as $ext) {
    echo extension_loaded($ext) ? "✓ $ext loaded<br>" : "✗ $ext NOT loaded<br>";
}
