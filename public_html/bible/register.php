<?php
/**
 * API: User Registration (AJAX)
 * Path: bible/register.php
 * Description: Creates new WordPress users with "Bible User" role.
 */

// 1. Load WordPress Core
require_once('../wp-load.php');

// 2. Set Headers
header('Content-Type: application/json');

// 3. Ensure "bible_user" role exists (one-time setup)
if (!wp_roles()->is_role('bible_user')) {
    add_role('bible_user', 'Bible User', array(
        'read' => true,
        'level_0' => true
    ));
}

// 4. Get Data
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

$username = sanitize_user($data['username'] ?? '');
$email = sanitize_email($data['email'] ?? '');
$password = $data['password'] ?? '';

// 5. Validation
$errors = array();

if (empty($username)) {
    $errors[] = 'Username is required.';
}
if (empty($email) || !is_email($email)) {
    $errors[] = 'Valid email is required.';
}
if (empty($password) || strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters.';
}
if (username_exists($username)) {
    $errors[] = 'Username already taken.';
}
if (email_exists($email)) {
    $errors[] = 'Email already registered.';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// 6. Create User
$user_id = wp_create_user($username, $password, $email);

if (is_wp_error($user_id)) {
    echo json_encode(['success' => false, 'message' => $user_id->get_error_message()]);
    exit;
}

// 7. Set Role
$user = new WP_User($user_id);
$user->set_role('bible_user');

// 8. Auto-Login
$creds = array(
    'user_login'    => $username,
    'user_password' => $password,
    'remember'      => true
);
$login_result = wp_signon($creds, false);

if (is_wp_error($login_result)) {
    // User created but login failed - rare case
    echo json_encode([
        'success' => true, 
        'message' => 'Account created! Please log in manually.',
        'user' => ['id' => $user_id, 'name' => $username, 'email' => $email],
        'autoLoggedIn' => false
    ]);
} else {
    wp_set_current_user($user_id);
    echo json_encode([
        'success' => true, 
        'message' => 'Account created successfully!',
        'user' => ['id' => $user_id, 'name' => $username, 'email' => $email],
        'autoLoggedIn' => true
    ]);
}
exit;
