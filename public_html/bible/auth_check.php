<?php
// Load WordPress environment
error_reporting(E_ALL); // Enable error reporting for debug
ini_set('display_errors', 0); // Do not output errors to HTML, handle them

// Prevent Caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: application/json');

$debug_info = [];

try {
    // Check if wp-load exists
    if (!file_exists('../wp-load.php')) {
        throw new Exception("wp-load.php not found in ../");
    }
    
    require_once('../wp-load.php');
    
    $debug_info['wp_loaded'] = true;
    $debug_info['site_url'] = site_url();
    $debug_info['is_logged_in'] = is_user_logged_in();
    $debug_info['cookies'] = array_keys($_COOKIE); // Log which cookies exist (security: names only)

    // Bypass logout confirmation
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        wp_logout();
        // Redirect to /bible/bible.html
        wp_redirect(home_url('/bible/bible.html?t=' . time()));
        exit;
    }

    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        echo json_encode([
            'authenticated' => true,
            'username' => $current_user->user_login,
            'user_display_name' => $current_user->display_name,
            'logout_url' => 'auth_check.php?action=logout',
            'debug' => $debug_info
        ]);
    } else {
        // Redirect with timestamp to force refresh after login
        $redirect = home_url('/bible/bible.html?t=' . time());
        $login_url = wp_login_url($redirect);
        
        echo json_encode([
            'authenticated' => false,
            'login_url' => $login_url,
            'debug' => $debug_info
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'authenticated' => false,
        'error' => $e->getMessage(),
        'debug' => $debug_info
    ]);
}
?>
