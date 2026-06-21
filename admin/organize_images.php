<?php
/**
 * One-time script to organize existing flat images into monthly subfolders
 * and move permanent news images into a permanent/ subfolder.
 * 
 * Structure after running:
 *   data/news_images/permanent/   - images from permanent_news.json
 *   data/news_images/2025-08/     - images from August 2025 articles
 *   data/news_images/2025-09/     - images from September 2025 articles
 *   etc.
 */

if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['admin_logged_in'])) { header('Location: login.php'); exit; }
require_once '../config/app.php';

$basePath = BASE_PATH . '/data/news_images/';
$results = ['moved' => 0, 'skipped' => 0, 'errors' => []];

// 1. Collect permanent news image filenames
$permanentImages = [];
$permPath = BASE_PATH . '/data/permanent_news.json';
if (file_exists($permPath)) {
    $permNews = json_decode(file_get_contents($permPath), true) ?: [];
    foreach ($permNews as $art) {
        if (!empty($art['image'])) {
            $permanentImages[$art['image']] = true;
        }
    }
}

// 2. Collect editable news images with their published_at dates
$newsImages = [];
$newsPath = BASE_PATH . '/data/news.json';
if (file_exists($newsPath)) {
    $news = json_decode(file_get_contents($newsPath), true) ?: [];
    foreach ($news as $art) {
        if (!empty($art['image']) && !empty($art['published_at'])) {
            $newsImages[$art['image']] = $art['published_at'];
        }
    }
}

// 3. Create permanent folder
$permFolder = $basePath . 'permanent/';
if (!is_dir($permFolder)) {
    mkdir($permFolder, 0755, true);
    @chmod($permFolder, 0755);
}

// 4. Process all files in the flat news_images directory
$files = glob($basePath . '*');
foreach ($files as $file) {
    if (is_dir($file)) continue; // skip subdirectories
    
    $filename = basename($file);
    
    // Determine target folder
    if (isset($permanentImages[$filename])) {
        // It's a permanent image
        $targetDir = $permFolder;
        $newRelative = 'permanent/' . $filename;
    } elseif (isset($newsImages[$filename])) {
        // It's an editable news image - use the article's published_at month
        $month = date('Y-m', strtotime($newsImages[$filename]));
        $targetDir = $basePath . $month . '/';
        $newRelative = $month . '/' . $filename;
    } else {
        // Unknown image - try to guess month from filename timestamp
        // Filenames like: IMG-20250826-WA0320.jpg or news_1776091149_101.jpg
        if (preg_match('/IMG[-_](\d{4})(\d{2})\d{2}/', $filename, $m)) {
            $month = $m[1] . '-' . $m[2];
        } elseif (preg_match('/news_(\d{10})/', $filename, $m)) {
            $month = date('Y-m', (int)$m[1]);
        } else {
            // Fallback: put in permanent
            $targetDir = $permFolder;
            $newRelative = 'permanent/' . $filename;
            if (!is_dir($targetDir)) { mkdir($targetDir, 0755, true); @chmod($targetDir, 0755); }
            if (!file_exists($targetDir . $filename)) {
                rename($file, $targetDir . $filename);
                @chmod($targetDir . $filename, 0644);
                $results['moved']++;
            } else {
                $results['skipped']++;
            }
            continue;
        }
        $targetDir = $basePath . $month . '/';
        $newRelative = $month . '/' . $filename;
    }
    
    // Create target directory if needed
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
        @chmod($targetDir, 0755);
    }
    
    // Move the file
    if (!file_exists($targetDir . $filename)) {
        if (rename($file, $targetDir . $filename)) {
            @chmod($targetDir . $filename, 0644);
            $results['moved']++;
        } else {
            $results['errors'][] = "Failed to move: $filename";
        }
    } else {
        $results['skipped']++;
    }
}

// 5. Now update permanent_news.json image paths to include "permanent/" prefix
if (file_exists($permPath)) {
    $permNews = json_decode(file_get_contents($permPath), true) ?: [];
    $updated = false;
    foreach ($permNews as &$art) {
        if (!empty($art['image']) && !str_starts_with($art['image'], 'permanent/')) {
            $art['image'] = 'permanent/' . $art['image'];
            $updated = true;
        }
    }
    if ($updated) {
        file_put_contents($permPath, json_encode($permNews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

// 6. Update news.json image paths to include month prefix
if (file_exists($newsPath)) {
    $news = json_decode(file_get_contents($newsPath), true) ?: [];
    $updated = false;
    foreach ($news as &$art) {
        if (!empty($art['image']) && !str_contains($art['image'], '/')) {
            // Only update if it's still a flat filename (no folder prefix yet)
            if (!empty($art['published_at'])) {
                $month = date('Y-m', strtotime($art['published_at']));
                $art['image'] = $month . '/' . $art['image'];
                $updated = true;
            }
        }
    }
    if ($updated) {
        file_put_contents($newsPath, json_encode(array_values($news), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

// 7. Create .htaccess to ensure images are served properly on Hostinger
$htaccess = $basePath . '.htaccess';
$htaccessContent = <<<'HTACCESS'
# Allow direct access to image files in this directory
Options +Indexes
<IfModule mod_rewrite.c>
    RewriteEngine Off
</IfModule>

# Ensure proper MIME types
<IfModule mod_mime.c>
    AddType image/jpeg .jpg .jpeg
    AddType image/png .png
    AddType image/gif .gif
    AddType image/webp .webp
    AddType image/svg+xml .svg
    AddType video/mp4 .mp4
</IfModule>

# Allow all access to images
<FilesMatch "\.(jpg|jpeg|png|gif|webp|svg|mp4)$">
    Order Allow,Deny
    Allow from all
    Require all granted
</FilesMatch>
HTACCESS;
file_put_contents($htaccess, $htaccessContent);
@chmod($htaccess, 0644);

// Output results
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="kn">
<head>
    <meta charset="UTF-8">
    <title>Image Organization Complete</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; background: #f0f4f8; }
        .card { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        h1 { color: #1e40af; font-size: 1.5rem; }
        .stat { display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #e2e8f0; }
        .stat:last-child { border-bottom: none; }
        .label { color: #64748b; }
        .value { font-weight: bold; color: #1e293b; }
        .success { color: #16a34a; }
        .error { color: #dc2626; }
        .back-link { display: inline-block; margin-top: 1.5rem; padding: 0.5rem 1.5rem; background: #1e40af; color: white; border-radius: 8px; text-decoration: none; }
        .back-link:hover { background: #1e3a8a; }
    </style>
</head>
<body>
<div class="card">
    <h1>✅ Image Organization Complete</h1>
    <div class="stat"><span class="label">Files moved:</span> <span class="value success"><?= $results['moved'] ?></span></div>
    <div class="stat"><span class="label">Files skipped (already exists):</span> <span class="value"><?= $results['skipped'] ?></span></div>
    <div class="stat"><span class="label">Permanent images folder:</span> <span class="value">data/news_images/permanent/</span></div>
    <div class="stat"><span class="label">Monthly folders created:</span> <span class="value">data/news_images/YYYY-MM/</span></div>
    <div class="stat"><span class="label">.htaccess created:</span> <span class="value success">Yes</span></div>
    <?php if (!empty($results['errors'])): ?>
        <h3 class="error">Errors:</h3>
        <ul>
        <?php foreach ($results['errors'] as $err): ?>
            <li class="error"><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php?p=dashboard" class="back-link">← Back to Dashboard</a>
</div>
</body>
</html>
