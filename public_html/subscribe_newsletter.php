<?php
header('Content-Type: application/json');

// Helper to send JSON response
function sendResponse($status, $message) {
    echo json_encode(['status' => $status, 'message' => $message]);
    exit;
}

// 1. Validate Request Method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    sendResponse('error', 'Method Not Allowed');
}

// 2. Validate Inputs
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$name || !$email) {
    http_response_code(400);
    sendResponse('error', 'Please provide a valid name and email.');
}

// 3. Bootstrap WordPress (Required for MailPoet API)
// We look for wp-load.php in the current directory or one level up
if (file_exists('wp-load.php')) {
    require_once('wp-load.php');
} elseif (file_exists('../wp-load.php')) {
    require_once('../wp-load.php');
} else {
    // If we can't load WordPress, we can't use MailPoet.
    // Fallback: Send a basic email notification to admin instead?
    // Or just fail gracefully.
    http_response_code(500);
    sendResponse('error', 'Unable to connect to newsletter system (WordPress core not found).');
}

// 4. Check for MailPoet API
if (!class_exists(\MailPoet\API\API::class)) {
    http_response_code(500);
    sendResponse('error', 'Newsletter system is currently unavailable.');
}

try {
    $mailpoet_api = \MailPoet\API\API::MP('v1');
    $subscriber = [
        'first_name' => $name,
        'email' => $email,
    ];
    
    // Get Lists (Optional: Check if specific list exists, otherwise add to default)
    // Here we just add to the default lists if any, or a specific list ID if known (e.g., 2)
    // For now, we try to get lists and pick the first one, or just add without lists if API allows.
    // Ideally, catch the 'Default Newsletter' list.
    $lists = $mailpoet_api->getLists();
    $list_ids = [];
    if (!empty($lists)) {
        // Just add to the first available list for simplicity
        $list_ids[] = $lists[0]['id'];
    }

    // Check if subscriber exists
    try {
        $existing_subscriber = $mailpoet_api->getSubscriber($email);
    } catch (\Exception $e) {
        $existing_subscriber = false;
    }

    if (!$existing_subscriber) {
        // Add new subscriber
        $mailpoet_api->addSubscriber($subscriber, $list_ids);
        sendResponse('success', 'You have been successfully subscribed!');
    } else {
        // Subscribe to new list if not already
        $mailpoet_api->subscribeToLists($email, $list_ids);
        sendResponse('success', 'You are already subscribed, but we updated your list preferences!');
    }

} catch (\Exception $e) {
    // Log error internally if needed
    // error_log($e->getMessage());
    http_response_code(500);
    sendResponse('error', 'Subscription failed. Please try again later.');
}
?>
