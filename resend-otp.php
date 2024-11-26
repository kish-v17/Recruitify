<?php
include 'db/db-connect.php';

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['user_data'])) {
    $username = $_SESSION['user_data']['full-name'];
    $email_id = $_SESSION['user_data']['email'];
} else {
    $email_id = $_SESSION['email'];
    $sql = "select * from users_tbl where Email='$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    $username = $user['Name'];
}
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'purebitegroceryshop@gmail.com';
    $mail->Password = 'ojpb rwba znvs mjac';
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('purebitegroceryshop@gmail.com');
    $mail->addAddress($email_id, $username);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expiration'] = time() + 120;

    $body = "<html>
                    <body>
                        <h2>Resend OTP for Email Verification</h2>
                        <p>Dear {$username},</p>
                        <p>Your new OTP for email verification is: <strong>$otp</strong></p>
                        <p>This OTP will expire in 2 minutes.</p>
                        <p>If you didn't request this, please ignore this email.</p>
                    </body>
                </html>";

    $mail->Body = $body;

    if ($mail->send()) {
        setcookie('success', 'New OTP has been sent to your email.', time() + 5, "/");
        echo "<script>location.href='otp-page.php';</script>";
    } else {
        setcookie('error', "Failed to resend OTP: " . $mail->ErrorInfo, time() + 5, "/");
    }
} catch (Exception $e) {
    setcookie('error', "Error in sending email: " . $e->getMessage(), time() + 5, "/");
}
