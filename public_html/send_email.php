<?php
header('Content-Type: application/json');

// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

// Configuration
$to = 'info@walkforgod.org';
$subject = 'New Message from Walk For God Website';

// Sanitize and Validate Inputs
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$suburb_live = filter_input(INPUT_POST, 'suburb_live', FILTER_SANITIZE_STRING);
$suburb_serve = filter_input(INPUT_POST, 'suburb_serve', FILTER_SANITIZE_STRING);
$church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Basic Validation
if (!$name || !$phone || !$email || !$suburb_live || !$suburb_serve || !$church) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
    exit;
}

// Construct Email Body
$email_content = "You have received a new enquiry from the Walk For God website.\n\n";
$email_content .= "Name: $name\n";
$email_content .= "Phone: $phone\n";
$email_content .= "Email: $email\n";
$email_content .= "Suburb (Live): $suburb_live\n";
$email_content .= "Suburb (Serve): $suburb_serve\n";
$email_content .= "Church Group: $church\n\n";
$email_content .= "Message:\n$message\n";

// Email Headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send Email
if (mail($to, $subject, $email_content, $headers)) {
    echo json_encode(['status' => 'success', 'message' => 'Thank you! Your message has been sent.']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Oops! Something went wrong and we couldn\'t send your message.']);
}
?>
