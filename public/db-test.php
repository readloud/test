<?php
// public/db-test.php
try {
    $dbPath = __DIR__ . '/../database/database.sqlite';
    echo "Database path: " . $dbPath . "<br>";
    
    if (!file_exists($dbPath)) {
        echo "❌ Database file not found!<br>";
    } else {
        echo "✅ Database file exists<br>";
        echo "File size: " . filesize($dbPath) . " bytes<br>";
        echo "Is writable: " . (is_writable($dbPath) ? "Yes" : "No") . "<br>";
    }
    
    $pdo = new PDO("sqlite:" . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'");
    echo "<br>Tables found:<br>";
    while($row = $tables->fetch(PDO::FETCH_ASSOC)) {
        echo "- " . $row['name'] . "<br>";
    }
    
    echo "<br>✅ Database connection successful!";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
