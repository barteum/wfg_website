<?php
// options_api.php - Manage User Options in users.csv
// ARCHITECTURE: Pure Pick/MultiValue Format
// Format: Username (ID) + AM + OptionsBlob
// OptionsBlob: Key + SM + Value + VM + Key2 + SM + Value2...

error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");

// 1. Load WordPress for Auth
$wp_load_path = __DIR__ . '/../../wp-load.php'; 
if (file_exists($wp_load_path)) {
    require_once($wp_load_path);
} else {
    echo json_encode(['success' => false, 'error' => 'WordPress not found']);
    exit;
}

// 2. Auth Check
if (!is_user_logged_in()) {
    echo json_encode(['success' => false, 'error' => 'Authentication required']);
    exit;
}

$current_user = wp_get_current_user();
$username = $current_user->user_login;
$db_file = __DIR__ . '/users.db'; // Renamed to .db for Pick Format consistency

// Delimiters
$AM = chr(254); // Attribute Mark (Separates Username from Data)
$VM = chr(253); // Value Mark (Separates Options)
$SM = chr(252); // Sub-Value Mark (Key vs Value)

// 3. Handle Request
$action = isset($_GET['action']) ? $_GET['action'] : 'get';

if ($action === 'get') {
    $user_options = [];
    
    if (file_exists($db_file)) {
        // Read file - simpler now, no CSV parsing overhead
        $lines = file($db_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Pick Parse: Split by AM
            // Expected: Username + AM + OptionsBlob
            if (strpos($line, $username . $AM) === 0) {
                $parts = explode($AM, $line);
                if (count($parts) >= 2) {
                    $blob = $parts[1]; // The Options Blob
                    // Parse Blob
                    $items = explode($VM, $blob);
                    foreach ($items as $item) {
                        $kv = explode($SM, $item);
                        if (count($kv) >= 2) {
                            $user_options[$kv[0]] = $kv[1];
                        }
                    }
                }
                break;
            }
        }
    }
    
    echo json_encode(['success' => true, 'options' => $user_options]);
    exit;
}

if ($action === 'update') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        echo json_encode(['success' => false, 'error' => 'Invalid JSON input']);
        exit;
    }
    
    $updates = $input; // New Key-Values to merge
    
    $lines = file_exists($db_file) ? file($db_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $new_file_content = "";
    $found = false;
    
    foreach ($lines as $line) {
        // Check ID
        if (strpos($line, $username . $AM) === 0) {
            $found = true;
            $parts = explode($AM, $line);
            
            // Reconstruct Current Options
            $current_opts = [];
            if (count($parts) >= 2) {
                $blob = $parts[1];
                $items = explode($VM, $blob);
                foreach ($items as $item) {
                    $kv = explode($SM, $item);
                    if (count($kv) >= 2) {
                        $current_opts[$kv[0]] = $kv[1];
                    }
                }
            }
            
            // Merge Updates
            foreach ($updates as $k => $v) {
                $current_opts[$k] = $v;
            }
            
            // Re-Serialize Blob
            $blob_parts = [];
            foreach ($current_opts as $k => $v) {
                $blob_parts[] = $k . $SM . $v; // Key + SM + Value
            }
            $new_blob = implode($VM, $blob_parts); // Join by VM
            
            // Write User Line: Username + AM + Blob
            $new_file_content .= $username . $AM . $new_blob . "\n";
            
        } else {
            // Keep other users
            $new_file_content .= $line . "\n";
        }
    }
    
    if (!$found) {
        // New User
        $blob_parts = [];
        foreach ($updates as $k => $v) {
            $blob_parts[] = $k . $SM . $v;
        }
        $new_blob = implode($VM, $blob_parts);
        $new_file_content .= $username . $AM . $new_blob . "\n";
    }
    
    // Write Atomic
    file_put_contents($db_file, $new_file_content);
    
    echo json_encode(['success' => true, 'message' => 'Options saved']);
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid action']);
?>
