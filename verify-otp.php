<?php
include 'db/db-connect.php';

if (isset($_POST['verify'])) {
    $inputtedOTP = $_POST['otp'];

    if (isset($_SESSION['otp'])) {

        if (time() > $_SESSION['otp_expiration']) {
            // Using alert for error instead of cookies
            echo "<script>alert('The OTP has expired. Please request a new one.');</script>";
        } else {
            $session_otp = $_SESSION['otp'];

            if ($inputtedOTP == $session_otp) {
                if (isset($_SESSION['email'])) {
                    $_SESSION['verified'] = 1;
                    echo "<script>location.href='reset-password.php';</script>";
                } else {
                    // Extracting user data from session
                    $utype = $_SESSION['user_data']['utype'];
                    $name = $_SESSION['user_data']['name'];
                    $email = $_SESSION['user_data']['email'];
                    $dob = $_SESSION['user_data']['dob'];
                    $gender = $_SESSION['user_data']['gender'];
                    $city = $_SESSION['user_data']['city'];
                    $mob = $_SESSION['user_data']['mob'];
                    $state = $_SESSION['user_data']['state'];
                    $country = $_SESSION['user_data']['country'];
                    $pass = $_SESSION['user_data']['pass'];
                    $image = $_SESSION['user_data']['image']; 

                    $sql = "INSERT INTO users_tbl (User_Type, Name, Email, DOB, Gender, City, State, Country, Mobile, Image, Password, Register_Date_Date) 
                            VALUES ('$utype', '$name', '$email', '$dob', '$gender', '$city', '$state', '$country', '$mob', '$image', '$pass', NOW())";

                    if (mysqli_query($con, $sql)) {
                        $_SESSION['user_id'] = mysqli_insert_id($con);
                        
                        unset($_SESSION['user_data']);
                        unset($_SESSION['otp']);
                        unset($_SESSION['otp_expiration']);
                        
                        if ($utype == 'Jobseeker') {
                            echo "<script>location.replace('jobseeker/');</script>";
                        } else {
                            echo "<script>location.replace('employer/');</script>";
                        }
                        
                        echo "<script>alert('You have registered successfully!');</script>";
                    } else {
                        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('Wrong OTP. Please try again.');</script>";
            }
        }
    } else {
        echo "<script>alert('No OTP found. Please request a new one.');</script>";
    }
}

echo "<script>location.replace('otp-page.php');</script>";
?>
