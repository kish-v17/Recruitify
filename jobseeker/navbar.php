<?php
include '../db/db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php" style="margin-left:-30px">
                <img src="../images/logo.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">Recruitify</strong>
                    <small class="logo-slogan">Online Job Portal</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:-20px">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="job-listings.php">Browse Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <?php


                    if ($_SESSION['user_id']) {
                        $sql = "select Name, Image from Users_tbl where User_Id='$_SESSION[user_id]'";
                        $data = mysqli_query($con, $sql);
                        $result = mysqli_fetch_array($data);
                        $_SESSION["username"] = $result['Name'];
                        $img = $result['Image'];
                        if (isset($_SESSION['username'])) {
                            $use = $_SESSION['username'];
                        }

                        echo '
                             <li class="nav-item ms-lg-auto dropdown" style="margin-right:-50px">
                                <a class="nav-link dropdown-toggle" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="avatar-image img-fluid"  style="border:5px solid lightgray;height:55px;width:55px" src="../' . $img . '" alt="Image" href="profile.php">&ensp;' . $use . '</a>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="job-applied.php">Applied jobs</a></li>
                            <li><a class="dropdown-item" href="../logout.php">Log out</a></li>
                        </ul>
                        </li>';
                    } else {
                        echo ' <li class="nav-item ms-lg-auto">
                            <a class="nav-link" href="../register.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link custom-btn btn" href="../login.php">Login</a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        // if (isset($_COOKIE['success']) || isset($_COOKIE['error'])) {
        //     $message = isset($_COOKIE['success']) ? $_COOKIE['success'] : $_COOKIE['error'];

    //         echo '
    // <div class="toast-container position-fixed end-0 p-3 ">
    //     <div class="toast align-items-center ' . (isset($_COOKIE['success']) ? 'bg-success' : 'bg-danger') . ' text-white border-0" data-bs-delay="3000" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
    //         <div class="d-flex">
    //         <div class="toast-body">
    //             ' . $message . '
    //         </div>
    //         <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    //         </div>
    //     </div>
    // </div>
    // <script>
    //     window.onload = function() {
    //         var myToast = document.getElementById("myToast");
    //         var toast = new bootstrap.Toast(myToast);
    //         toast.show();
    //     };
    // </script>';
    // echo '
    //     <div class="alert ' . (isset($_COOKIE['success']) ? 'alert-success' : 'alert-danger') . '" role="alert" id="myAlert">
    //         '.$message.'
    //     </div>
    //     <script>
    //         setTimeout(()=>{
    //             const alert = bootstrap.Alert.getOrCreateInstance("#myAlert");
    //             alert.close();
    //         },3000);
    //     </script>
    //     ';
    //     }

        ?>
