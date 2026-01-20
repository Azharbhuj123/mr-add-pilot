<?php
/* ================= SECURITY CHECKS ================= */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

if (($_POST['form_type'] ?? '') !== 'local_leads') {
    exit;
}

/* ================= SANITIZE INPUT ================= */

$name         = trim($_POST['name'] ?? '');
$business     = trim($_POST['business_name'] ?? '');
$website      = trim($_POST['website'] ?? '');
$location     = trim($_POST['location'] ?? '');
$phone        = trim($_POST['phone'] ?? '');
$email        = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$budget       = trim($_POST['budget'] ?? '');
$service      = trim($_POST['service'] ?? '');
$page_url     = trim($_POST['page_url'] ?? 'Unknown');

/* Validate email */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "fail";
    exit;
}

/* ================= CONFIG ================= */

$adminEmails = "azharbhuj@gmail.com, info@mradpilot.com, usamabrandsales@gmail.com";
$fromEmail   = "info@mradpilot.com";

/* ================= ADMIN EMAIL ================= */

$adminSubject = "New Local Leads Application";

$adminMessage = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Local Leads Application</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

<tr>
<td style="background:#0d1b2a; padding:20px; text-align:center;">
<h1 style="color:#ffffff; margin:0; font-size:22px;">Mr Adpilot</h1>
</td>
</tr>

<tr>
<td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
<p><strong>Name:</strong> '.htmlspecialchars($name).'</p>
<p><strong>Business:</strong> '.htmlspecialchars($business).'</p>
<p><strong>Website:</strong> '.htmlspecialchars($website).'</p>
<p><strong>Location:</strong> '.htmlspecialchars($location).'</p>
<p><strong>Phone:</strong> '.htmlspecialchars($phone).'</p>
<p><strong>Email:</strong> '.htmlspecialchars($email).'</p>
<p><strong>Marketing Budget:</strong> '.htmlspecialchars($budget).'</p>

<p><strong>Service Offered:</strong><br>
'.nl2br(htmlspecialchars($service)).'
</p>

<hr>
<p><strong>Submitted From:</strong><br>
'.htmlspecialchars($page_url).'
</p>
</td>
</tr>

<tr>
<td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777777;">
© '.date('Y').' Mr Adpilot ·
<a href="https://mradpilot.com" style="color:#0d1b2a; text-decoration:none;">mradpilot.com</a>
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
';

/* Admin headers */
$adminHeaders  = "MIME-Version: 1.0\r\n";
$adminHeaders .= "Content-type:text/html;charset=UTF-8\r\n";
$adminHeaders .= "From: Website Form <{$fromEmail}>\r\n";
$adminHeaders .= "Reply-To: {$email}\r\n";

/* ================= CUSTOMER EMAIL ================= */

$customerSubject = "Thanks for your application";

$customerMessage = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thanks for your application</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

<tr>
<td style="background:#0d1b2a; padding:20px; text-align:center;">
<h1 style="color:#ffffff; margin:0; font-size:22px;">Mr Adpilot</h1>
</td>
</tr>

<tr>
<td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
<p>Hi <strong>'.htmlspecialchars($name).'</strong>,</p>

<p>
Thank you for submitting your application to
<strong>Mr Adpilot</strong>. Our team will review your
details and contact you shortly.
</p>

<p><strong>Business:</strong> '.htmlspecialchars($business).'</p>
<p><strong>Website:</strong> '.htmlspecialchars($website).'</p>

<p><strong>Service:</strong><br>
'.nl2br(htmlspecialchars($service)).'
</p>

<p style="margin-top:25px;">
Regards,<br>
<strong>Mr Adpilot Team</strong>
</p>
</td>
</tr>

<tr>
<td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777777;">
© '.date('Y').' Mr Adpilot ·
<a href="https://mradpilot.com" style="color:#0d1b2a; text-decoration:none;">mradpilot.com</a>
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
';

/* Customer headers */
$customerHeaders  = "MIME-Version: 1.0\r\n";
$customerHeaders .= "Content-type:text/html;charset=UTF-8\r\n";
$customerHeaders .= "From: Mr Adpilot <{$fromEmail}>\r\n";
$customerHeaders .= "Reply-To: {$fromEmail}\r\n";

/* ================= SEND MAIL ================= */

$adminSent    = mail($adminEmails, $adminSubject, $adminMessage, $adminHeaders);
$customerSent = mail($email, $customerSubject, $customerMessage, $customerHeaders);

echo ($adminSent && $customerSent) ? "success" : "fail";

?>
