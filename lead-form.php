<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

if (!isset($_POST['form_type']) || $_POST['form_type'] !== 'lead_form') {
    exit;
}

$firstName   = strip_tags($_POST['firstName']);
$lastName    = strip_tags($_POST['lastName']);
$business    = strip_tags($_POST['businessName']);
$email       = filter_var($_POST['emailAddress'], FILTER_SANITIZE_EMAIL);
$phone       = strip_tags($_POST['phoneNumer']);

$to = "azharbhuj@gmail.com, info@mradpilot.com"; 
$subject = "Holyday Lighting Lead Form Submission";

$message = "
First Name: $firstName
Last Name: $lastName
Business: $business
Email: $email
Phone: $phone
";

$headers  = "From: Lead Form <admin@mradpilot.com>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "success";
} else {
    echo "fail";
}
 