<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

if (!isset($_POST['form_type']) || $_POST['form_type'] !== 'results_form') {
    exit;
}

$website = strip_tags($_POST['website_url']);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$name    = strip_tags($_POST['name']);

$to = "azharbhuj@gmail.com, info@mradpilot.com";
$subject = "New Website Results Request";

$message = "
Website URL: $website
Name: $name
Email: $email
";

$headers  = "From: Website Results <admin@mradpilot.com>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "success";
} else {
    echo "fail";
}
 