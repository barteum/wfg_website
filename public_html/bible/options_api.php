<?php
// options_api.php - Manage User Options in options.csv
// Format: Username, OptionsBlob (Pick-style)
// OptionsBlob: Key + SM + Value + VM + Key2 + SM + Value2...

error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");

// 1. Load WordPress for Auth
$wp_load_path = __DIR__ . '/../../wp-load.php'; // Adjust path based on location in /bible/ subdir
if (file_exists($wp_load_path)) {
    require_once($wp_load_path);
} else {
    // Fallback if we can't find WP (for testing mostly)
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
$csv_file = __DIR__ . '/users.csv';

// Delimiters
$VM = chr(253); // Value Mark (Separate Items)
$SM = chr(252); // Sub-Value Mark (Key vs Value)

// Helper: Parse CSV Line
function parse_csv_line($line) {
    return str_getcsv($line);
}

// Helper: Build CSV Line
function build_csv_line($fields) {
    $fp = fopen('php://temp', 'r+');
    fputcsv($fp, $fields);
    rewind($fp);
    $data = fgets($fp);
    fclose($fp);
    return $data; // Includes newline
}

// 3. Handle Request
$action = isset($_GET['action']) ? $_GET['action'] : 'get';

if ($action === 'get') {
    $user_options = [];
    
    if (file_exists($csv_file)) {
        $lines = file($csv_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $data = parse_csv_line($line);
            if (count($data) >= 2 && $data[0] === $username) {
                // Found User
                $blob = $data[1];
                $items = explode($VM, $blob);
                foreach ($items as $item) {
                    $parts = explode($SM, $item);
                    if (count($parts) >= 2) {
                        $user_options[$parts[0]] = $parts[1];
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
    
    $updates = $input; // Key-Value pairs
    
    // Read all lines
    $lines = file_exists($csv_file) ? file($csv_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $new_lines = [];
    $found = false;
    
    foreach ($lines as $line) {
        $data = parse_csv_line($line);
        if (count($data) >= 1 && $data[0] === $username) {
            // Existing User - Merge Data
            $found = true;
            $current_blob = isset($data[1]) ? $data[1] : '';
            $current_opts = [];
            
            // Parse existing
            if ($current_blob) {
                $items = explode($VM, $current_blob);
                foreach ($items as $item) {
                    $parts = explode($SM, $item);
                    if (count($parts) >= 2) {
                        $current_opts[$parts[0]] = $parts[1];
                    }
                }
            }
            
            // Merge new
            foreach ($updates as $k => $v) {
                $current_opts[$k] = $v;
            }
            
            // Rebuild Blob
            $blob_parts = [];
            foreach ($current_opts as $k => $v) {
                $blob_parts[] = $k . $SM . $v;
            }
            $new_blob = implode($VM, $blob_parts);
            
            $new_lines[] = build_csv_line([$username, $new_blob]);
        } else {
            // Keep other users
            $new_lines[] = $line . "\n";
        }
    }
    
    if (!$found) {
        // New User Entry
        $blob_parts = [];
        foreach ($updates as $k => $v) {
            $blob_parts[] = $k . $SM . $v;
        }
        $new_blob = implode($VM, $blob_parts);
        $new_lines[] = build_csv_line([$username, $new_blob]);
    }
    
    // Write back
    file_put_contents($csv_file, implode("", $new_lines));
    
    echo json_encode(['success' => true, 'message' => 'Options saved']);
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid action']);
?>
