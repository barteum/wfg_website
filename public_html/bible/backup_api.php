<?php
/**
 * backup_api.php
 * Handles backup and restore of personal bible data (CSV).
 * 
 * Actions:
 * - ?action=backup (POST): Uploads file.
 * - ?action=check (GET): Checks if backup exists.
 * - ?action=restore (GET): Downloads backup.
 */

// Load WordPress to check auth
require_once('../wp-load.php');

header('Content-Type: application/json');

if (!is_user_logged_in()) {
    http_response_code(401);
    echo json_encode(['error' => 'Authentication required']);
    exit;
}

$current_user = wp_get_current_user();
$username = $current_user->user_login;
// Use a hash of username for filename security
$user_hash = md5($username . 'wfg_salt_2024'); 
$backup_dir = __DIR__ . '/user_backups/';
$backup_file = $backup_dir . $user_hash . '.csv';

// Ensure backup dir exists
if (!file_exists($backup_dir)) {
    mkdir($backup_dir, 0755, true);
    // Secure the directory
    file_put_contents($backup_dir . '.htaccess', "Order Deny,Allow\nDeny from all");
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'backup':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
             http_response_code(405);
             echo json_encode(['error' => 'Method Not Allowed']);
             exit;
        }

        if (!isset($_FILES['backup_file'])) {
            http_response_code(400);
            echo json_encode(['error' => 'No file uploaded']);
            exit;
        }

        // Validate file
        $file = $_FILES['backup_file'];
        if ($file['size'] > 5000000) { // 5MB limit
             http_response_code(400);
             echo json_encode(['error' => 'File too large']);
             exit;
        }

        if (move_uploaded_file($file['tmp_name'], $backup_file)) {
            echo json_encode([
                'success' => true, 
                'message' => 'Backup uploaded successfully. It will be available for 7 days.',
                'timestamp' => date('c')
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to save file']);
        }
        break;

    case 'check':
        if (file_exists($backup_file)) {
            // Check file age (optional, e.g. 7 days expiry)
            $mtime = filemtime($backup_file);
            $age_days = (time() - $mtime) / (60 * 60 * 24);
            
            if ($age_days > 7) {
                unlink($backup_file); // Delete expired
                echo json_encode(['exists' => false]);
            } else {
                echo json_encode([
                    'exists' => true,
                    'timestamp' => date('c', $mtime),
                    'age_days' => round($age_days, 1)
                ]);
            }
        } else {
            echo json_encode(['exists' => false]);
        }
        break;

    case 'restore':
        if (file_exists($backup_file)) {
            // Force download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="my_bible_backup.csv"');
            header('Content-Length: ' . filesize($backup_file));
            readfile($backup_file);
            
            // Optional: Delete after restore? 
            // The user requested "transient", but maybe safer to keep for 7 days anyway?
            // "it should delete the server copy as it should only be held for a maximum of 7 days" 
            // implies manual deletion or expiry. Let's keep it for safety unless explicitly asked to delete on restore.
            exit;
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Backup not found']);
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action']);
        break;
}
