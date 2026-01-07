<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $to = "azharbhuj@gmail.com, info@mradpilot.com"; 
    $subject = "Get Started Form";

    // Sanitize inputs
    $home_service = $_POST['home_service'] ?? '';
    $business_name = $_POST['business_name'] ?? '';
    $website = $_POST['website'] ?? '';
    $location = $_POST['location'] ?? '';
    $vehicles = $_POST['vehicles'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $revenue = $_POST['revenue'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $source = $_POST['source'] ?? '';

    $message = "
Home Service Business: $home_service
Business Name: $business_name
Website: $website
Location: $location

Vehicles: $vehicles
Monthly Budget: $budget
Annual Revenue: $revenue

Name: $full_name
Phone: $phone
Email: $email
Source: $source
";

    // IMPORTANT HEADERS
    $headers  = "From: Website Form <admin@mradpilot.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
