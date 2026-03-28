<?php
require_once __DIR__ . '/config/app.php';

$db = new PDO("mysql:host=127.0.0.1;dbname=rapower28;charset=utf8mb4", 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT * FROM rp_articles ORDER BY published_at DESC");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create data directory if it doesn't exist
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

// Convert numbers, etc. properly
$json = json_encode($articles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents($dataDir . '/articles.json', $json);

echo "Successfully dumped " . count($articles) . " articles to data/articles.json\n";
