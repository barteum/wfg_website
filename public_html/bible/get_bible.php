<?php
// get_bible.php - Secure Proxy for web.csv
// Blocks direct access if Referer/Origin is not authorized.

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// 1. Security Check
$host = $_SERVER['HTTP_HOST'];
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Allow empty referer? usually scripts send it. 
// Strict mode: Must have referer and must match host.
$allowed = false;

if ($referer) {
    // Parse Referer host
    $ref_url = parse_url($referer);
    if (isset($ref_url['host']) && $ref_url['host'] === $host) {
        $allowed = true;
    }
}

// Fallback for local dev or if Headers are stripped (sometimes happens)
// You might remove this in PROD if strictly enforcing.
if (!$allowed && ($host === 'localhost' || $host === '127.0.0.1')) {
    $allowed = true;
}

if (!$allowed) {
    header("HTTP/1.1 403 Forbidden");
    echo "Access Denied: Unrecognized Request Origin.";
    exit;
}

// 2. Serve File
// Default or explicitly web
$file = __DIR__ . '/web.db';
if (!file_exists($file)) $file = __DIR__ . '/web.csv'; // Legacy Fallback

if (file_exists($file)) {
    // Check if user has permission? 
    // Currently public data, just protected from scraping.
    
    header('Content-Type: text/plain'); // Keep as text/plain to avoid browser trying to "save as" automatically if hit directly, though JS handles it.
    header('Content-Length: ' . filesize($file));
    readfile($file);
} else {
    header("HTTP/1.1 404 Not Found");
    echo "Data source missing.";
}
?>
