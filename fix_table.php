<?php
require_once 'config/db.php';
try {
    $db = getDB();
    $db->exec("ALTER TABLE rp_articles ADD COLUMN IF NOT EXISTS is_featured TINYINT(1) DEFAULT 0 AFTER is_breaking");
    echo "✅ Success\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
