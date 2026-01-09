<?php
/**
 * API: User Authentication (AJAX)
 * Path: bible/authenticate.php
 * Description: Securely logs in a user via wp_signon without page reload.
 */

// 1. Load WordPress Core (adjust path if needed)
require_once('../wp-load.php');

// 2. Set Headers
header('Content-Type: application/json');

// 3. Security Checks
// (Optional: CSRF check if we had nonces, but for raw login we rely on credentials)

// 4. Get Data
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Username and Password are required.']);
    exit;
}

// 5. Attempt Login
$creds = array(
    'user_login'    => $username,
    'user_password' => $password,
    'remember'      => true
);

$user = wp_signon($creds, false); // false = don't enforce SSL here (handled by server)

if (is_wp_error($user)) {
    // Login Failed
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid username or password.' // Generic message for security? Or $user->get_error_message()
    ]);
} else {
    // Login Success
    // Set current user just in case
    wp_set_current_user($user->ID);
    
    echo json_encode([
        'success' => true,
        'user' => [
            'id' => $user->ID,
            'name' => $user->display_name,
            'email' => $user->user_email
        ]
    ]);
}
exit;
