<?php
/**
 * Ra. Power 28 — Main Router
 * ರಾ.ಪವರ್ 28 — ನಿಂಪು★ವಾರ್ತೆ
 */
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/includes/functions.php';

$page = $_GET['page'] ?? 'home';
$validPages = ['home','category','article','search','about','contact'];
if (!in_array($page, $validPages)) $page = 'home';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/pages/' . $page . '.php';
include __DIR__ . '/includes/footer.php';
