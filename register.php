<?php
include_once("navbar.php");
?>

<main>

    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Register</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="contact-section" style="padding:50px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form">
                        <h2 class="text-center mb-4">Welcome to Recruitify</h2>

                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <center>
                                    <b style="font-size:25px"><label for="type">Register as<font>*</font></label>
                                        <div class="form-control">
                                            <label><input type="radio" name="utype" id="utype" value="Jobseeker" required> Job seeker &emsp;</label>
                                            &emsp;<label><input type="radio" name="utype" id="utype" value="Employer" required> Employer</label>
                                        </div>
                                    </b>
                                </center>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="first-name">Full Name<font>*</font></label>

                                <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="email">Email Address<font>*</font></label>

                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                            </div>



                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="dob">Date of Birth<font>*</font></label>

                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="gender">Gender<font>*</font></label>
                                <div class="form-control">
                                    <label><input type="radio" name="gender" id="gender" value="Male" required> Male &emsp;</label>
                                    <label><input type="radio" name="gender" id="gender" value="Female" required> Female &emsp;</label>
                                    <label><input type="radio" name="gender" id="gender" value="Other" required> Other</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="mobile" style="display:block">Mobile<font>*</font></label>

                                <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile" pattern={0-9}[10] required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="city">City<font>*</font></label>

                                <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="State">State<font>*</font></label>

                                <input type="text" name="state" id="state" class="form-control" placeholder="State" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="country">Country<font>*</font></label>

                                <input type="text" name="country" id="country" class="form-control" placeholder="Country" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="password">Password<font>*</font></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required minlength="8">
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="conpassword">Confirm Password<font>*</font></label>
                                <input type="password" name="conpassword" id="conpassword" class="form-control" placeholder="Confirm Password" required minlength="8">
                            </div>
                            <div class="col-12">
                                <label for="Profile">Profile Photo<font>*</font></label>

                                <input type="file" accept="image/jpeg,image/png,image/jpg" name="img" id="img" class="form-control" required>
                            </div>

                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="submit" onclick="validatePasswords()">Register</button>
                            </div>
                            <br /><br /><br />
                            <h5 style="text-align:center">Already have an account??&nbsp;<u><a href="login.php">Log in</a></u></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>



</body>
<?php

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $utype = $_POST['utype'];
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $mob = $_POST['mobile'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pass = $_POST['password'];

    $image = uniqid("", true) . $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];
    $image_folder = 'images/user-img/user-profile/' . $image;

    $email_check_query = "SELECT * FROM Users_tbl WHERE Email = '$email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);

    if (mysqli_num_rows($result)) {
        echo "<script>alert('Your account already exists.');
        location.replace('login.php');
        </script>";
        exit();
    } else if (move_uploaded_file($image_tmp, $image_folder)) {
        $_SESSION['user_data'] = [
            'utype' => $utype,
            'name' => $name,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender,
            'city' => $city,
            'mob' => $mob,
            'state' => $state,
            'country' => $country,
            'pass' => $pass,
            'image' => $image_folder
        ];



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
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiration'] = time() + 120;

            $body = "<html>
                                <body>
                                    <h2>Email Verification</h2>
                                    <p>Dear {$_SESSION['user_data']['fname']},</p>
                                    <p>Your OTP for email verification is: <strong>$otp</strong></p>
                                    <p>This OTP will expire in 5 minutes.</p>
                                    <p>If you didn't request this, please ignore this email.</p>
                                </body>
                            </html>";

            $mail->Body = $body;

            if (!$mail->send()) {
                setcookie('error', "Error in sending email: " . $mail->ErrorInfo, time() + 5, "/");
            } else {
                setcookie('success', 'Email sent successfully. Please check your inbox for OTP.', time() + 5, "/");
            }
        } catch (Exception $e) {
            echo "<script>alert('Error in sending email: " . $mail->ErrorInfo . "')</script>";
        }

        echo "<script> location.replace('otp-page.php');</script>";
    } else {
        echo "<script>alert('Image upload failed.');</script>";
    }
}


?>



</html>