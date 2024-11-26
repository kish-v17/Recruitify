<?php
include 'db-connect.php';
session_start();

// Set the content-type to JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect POST data
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
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Upload the image
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
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
            'image' => $image
        ];

        // Check if the email is already in use
        $email_check_query = "SELECT * FROM users_tbl WHERE Email = '$email' LIMIT 1";
        $result = mysqli_query($con, $email_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['Active_Status'] == 1) {
                echo json_encode(['success' => false, 'error' => 'Your account already exists.']);
                exit();
            }
        }

        // Insert new user into the database
        $query = "INSERT INTO users_tbl (User_Type, Name, Email, DOB, Gender, City, State, Country, Mobile, Image, Password, Register_Date_Date) 
                  VALUES ('$utype', '$name', '$email', '$dob', '$gender', '$city', '$state', '$country', '$mob', '$image', '$pass', NOW())";

        if (mysqli_query($con, $query)) {
            // Send the user ID back to the session
            $_SESSION['user_data']['user_id'] = mysqli_insert_id($con);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Registration failed.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Image upload failed.']);
    }
}
?>
