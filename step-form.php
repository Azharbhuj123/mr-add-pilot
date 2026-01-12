<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
    $page_url = trim(strip_tags($_POST['page_url'] ?? 'Unknown'));

$adminEmails = "azharbhuj@gmail.com, info@mradpilot.com, usamabrandsales@gmail.com";
$fromEmail   = "admin@mradpilot.com";

// ADMIN EMAIL TEMPLATE
$adminSubject = "New Contact Form Submission";

    $adminMessage = '
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>NEW CONTACT FORM SUBMISSION</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                <!-- Header -->
                <tr>
                    <td style="background:#0d1b2a; padding:20px; text-align:center;">
                        <h1 style="color:#ffffff; margin:0; font-size:22px;">
                            Mr Adpilot
                        </h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
                        <p>Home Service Business: <strong>'.htmlspecialchars($home_service).'</strong>,</p>
                        <p>Business Name: <strong>'.htmlspecialchars($business_name).'</strong>,</p>
                        <p>Website: <strong>'.htmlspecialchars($website).'</strong>,</p>
                        <p>Location: <strong>'.htmlspecialchars($location).'</strong>,</p>
                        <p>Vehicles: <strong>'.htmlspecialchars($vehicles).'</strong>,</p>
                        <p>Monthly Budget: <strong>'.htmlspecialchars($budget).'</strong>,</p>
                        <p>Annual Revenue: <strong>'.htmlspecialchars($revenue).'</strong>,</p>
                       
                       
                        <p>----------------------------------</p> 
                        
                        <p>Name: <strong>'.htmlspecialchars($full_name).'</strong>,</p>
                        <p>Phone: <strong>'.htmlspecialchars($phone).'</strong>,</p>
                        <p>Email: <strong>'.htmlspecialchars($email).'</strong>,</p>
                        <p>Source: <strong>'.htmlspecialchars($source).'</strong>,</p>
                      

                       <p>----------------------------------</p> 
                        <p>Submitted From: <strong>'.htmlspecialchars($page_url).'</strong>,</p>
                        <p>----------------------------------</p> 

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777777;">
                        © '.date('Y').' Mr Adpilot ·
                        <a href="https://mradpilot.com" style="color:#0d1b2a; text-decoration:none;">
                            mradpilot.com
                        </a>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
';

$adminHeaders  = "MIME-Version: 1.0\r\n";
$adminHeaders .= "Content-type: text/html; charset=UTF-8\r\n";
$adminHeaders .= "From: Website Form <{$fromEmail}>\r\n";
$adminHeaders .= "Reply-To: $email\r\n";


// CUSTOMER EMAIL TEMPLATE
$customerSubject = "We’ve received your request";

$customerMessage = '
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>We’ve received your request</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                <!-- Header -->
                <tr>
                    <td style="background:#0d1b2a; padding:20px; text-align:center;">
                        <h1 style="color:#ffffff; margin:0; font-size:22px;">
                            Mr Adpilot
                        </h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
                        <p>Hi <strong>'.htmlspecialchars($name).'</strong>,</p>

                        <p>
                            Thank you for contacting <strong>Mr Adpilot</strong>.
                            We’ve received your request and our team will review it shortly.
                        </p>

                        <p>
                            If you have any additional information to share,
                            simply reply to this email and we’ll be happy to assist.
                        </p>

                        <p style="margin-top:30px;">
                            Best regards,<br>
                            <strong>Mr Adpilot Team</strong>
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777777;">
                        © '.date('Y').' Mr Adpilot ·
                        <a href="https://mradpilot.com" style="color:#0d1b2a; text-decoration:none;">
                            mradpilot.com
                        </a>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
';


$customerHeaders  = "MIME-Version: 1.0\r\n";
$customerHeaders .= "Content-type: text/html; charset=UTF-8\r\n";
$customerHeaders .= "From: Mr Adpilot <{$fromEmail}>\r\n";
$customerHeaders .= "Reply-To:  {$fromEmail}\r\n";


$adminSent    = mail($adminEmails, $adminSubject, $adminMessage, $adminHeaders);
$customerSent = mail($email, $customerSubject, $customerMessage, $customerHeaders);

if ($adminSent && $customerSent) {
    echo "success";
} else {
    echo "fail";
}
}
?>
 