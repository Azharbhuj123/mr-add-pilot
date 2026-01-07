<?php

// ❌ direct access block
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// ✅ check specific form
if (!isset($_POST['form_type']) || $_POST['form_type'] !== 'contact_form') {
    exit;
}

// sanitize inputs
$name    = trim(strip_tags($_POST['full_name']));
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$hear    = trim(strip_tags($_POST['how_hear']));
$service = trim(strip_tags($_POST['service']));
$summary = trim(strip_tags($_POST['summary']));

// email config
$to = "azharbhuj@gmail.com, info@mradpilot.com";
$subject = "Contact Form Submission";

$message = "
Name: $name
Email: $email
Heard From: $hear
Service: $service
Summary:
$summary
";

$headers  = "From: Website Form <admin@mradpilot.com>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "success";
} else {
    echo "fail";
}
