<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    // Admin Email
    $to = "hai740321@gmail.com"; // 👉 yahan apna email daalo

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
