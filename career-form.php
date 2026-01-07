<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid Request";
    exit;
}

$applying_for = $_POST['applying_for'] ?? '';
$name         = $_POST['name'] ?? '';
$email        = $_POST['email'] ?? '';
$phone        = $_POST['phone'] ?? '';
$address      = $_POST['address'] ?? '';
$lead_source  = $_POST['lead_source'] ?? '';
$source_url   = $_POST['source_url'] ?? '';

$to = "azharbhuj@gmail.com, info@mradpilot.com";  
$subject = "New Career Application from $name";

$resume_path = "";
if (!empty($_FILES['resume']['name'])) {

    $upload_dir = __DIR__ . "/uploads/";

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = time() . "-" . basename($_FILES["resume"]["name"]);
    $target_file = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        $resume_path = $target_file;
    }
}

$message = "
New Job Application Submitted:

Applying For: $applying_for
Name: $name
Email: $email
Phone: $phone
Address: $address
Lead Source: $lead_source
URL: $source_url

Resume File: " . ($resume_path ? $resume_path : "No file uploaded") . "
";

$headers  = "From: MrAdpilot Careers <admin@mradpilot.com>\r\n";
$headers .= "Reply-To: $email\r\n";


mail($to, $subject, $message, $headers);

echo json_encode([
    "status" => "success",
    "message" => "Application submitted successfully!"
]);
exit;

?>
