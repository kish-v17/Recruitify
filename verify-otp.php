<?php
include 'db-connect.php';
if (isset($_POST['verify'])) {
    $inputtedOTP = $_POST['otp'];

    if (isset($_SESSION['otp'])) {

        if (time() > $_SESSION['otp_expiration']) {
            setcookie('error', "The OTP has expired. Please request a new one.", time() + 5, "/");
        } else {
            $session_otp = $_SESSION['otp'];

            if ($inputtedOTP == $session_otp) {
                if (isset($_SESSION['email'])) {
                    $_SESSION['verified'] = 1;
                    echo "<script>location.href='reset-password.php';</script>";
                } else {
                    $utype =  $_SESSION['user_data']['utype'];
                    $name =  $_SESSION['user_data']['name'];
                    $email =  $_SESSION['user_data']['email'];
                    $dob =  $_SESSION['user_data']['dob'];
                    $gender =  $_SESSION['user_data']['gender'];
                    $city =  $_SESSION['user_data']['city'];
                    $mob =  $_SESSION['user_data']['mob'];
                    $state =  $_SESSION['user_data']['state'];
                    $country =  $_SESSION['user_data']['country'];
                    $pass =  $_SESSION['user_data']['pass'];

                    $sql = "insert into User_tbl(U_Id, U_Type_Id, U_Name, U_Email, U_DOB, U_Gender, U_City, U_State, U_Country, U_Mobile, U_Password, U_Reg_Date) values(U_Id,'$utype','$name','$email','$dob','$gender','$city','$state','$country','$mob','$pass',NOW())";

                    if (mysqli_query($con, $sql)) {
                        unset($_SESSION['user_data']);
                        unset($_SESSION['otp']);
                        unset($_SESSION['otp_expiration']);

                        $_SESSION['user_id'] = mysqli_insert_id($con);
                        setcookie('success', "You have registered successfully!", time() + 5, "/");
                        echo "<script> location.replace('jobseeker/');</script>";
                    } else {
                        setcookie('error', mysqli_error($con), time() + 5, "/");
                    }
                }
            } else {
                setcookie('error', "Wrong OTP. Please try again.", time() + 5, "/");
            }
        }
    } else {
        setcookie('error', "No OTP found. Please request a new one.", time() + 5, "/");
    }
}
echo "<script>location.replace('otp-page.php');</script>";
