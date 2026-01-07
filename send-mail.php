<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    $to = "azharbhuj@gmail.com, info@mradpilot.com";
    $subject = "New Form Submission";

    $message = "
    Name: $name
    Phone: $phone
    Email: $email
    ";

    $headers = "From: Website Form <no-reply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
