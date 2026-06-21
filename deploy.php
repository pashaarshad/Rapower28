<?php
// Secure Webhook Deployment Script
$secret = 'rapower28_secure_deploy_key'; 

// Verify the request signature from GitHub
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

if (!$signature || !hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
    http_response_code(403);
    die('Access Denied: Invalid signature.');
}

// Execute deployment as the www-data user
$output = [];
$return_var = 0;
exec('cd /var/www/rapower28 && git pull origin main 2>&1', $output, $return_var);

if ($return_var === 0) {
    echo "Deployment Successful:\n" . implode("\n", $output);
} else {
    http_response_code(500);
    echo "Deployment Failed:\n" . implode("\n", $output);
}
