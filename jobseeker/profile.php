<?php
include '../db-connect.php';

//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Profile</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link href="../css/owl.carousel.min.css" rel="stylesheet">

    <link href="../css/owl.theme.default.min.css" rel="stylesheet">

    <link href="tooplate-Recruitify-job.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />

    <style>
        input[type="file"]::file-selector-button {
            border-radius: 500px !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../images/logo.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">Recruitify</strong>
                    <small class="logo-slogan">Online Job Portal</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Homepage</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Recruitify</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="job-listings.php">Job Listings</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="job-listings.php">Job Listings</a></li>

                                <li><a class="dropdown-item" href="job-details.php">Job Details</a></li>
                            </ul>
                        </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <?php


                    if ($_SESSION['user__id']) {
                        $sql = "select * from User_tbl U INNER JOIN Education_tbl E on E.ED_U_Id='$_SESSION[user__id]' INNER JOIN Experience_tbl EX on EX.EX_U_Id='$_SESSION[user__id]' where U_Id='$_SESSION[user__id]'";
                        $data = mysqli_query($con, $sql);
                        $result = mysqli_fetch_array($data);

                        echo '  <li class="nav-item ms-lg-auto">
                                <a class="nav-link"><img class="avatar-image img-fluid"  src="../' . $result['U_Image'] . '" alt="Image"></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link custom-btn btn" href="../logout.php">Log out</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <header class="site-header">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">    
                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">My Profile</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    </div>
                </div>
            </header>

           <section class="contact-section section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                    <center>   
                        <div class="col-lg-4 col-md-4 col-6 mx-auto" >
                            <img height="350px" width="350px" style="object-fit: cover;border-radius:50%;"  src="../' . $result['U_Image'] . '" alt="Image">
                            <br/><br/>
                            <button class="custom-btn btn ms-lg-auto" onclick="showForm()" href="#change"><i class="fa fa-file-image-o"></i>&ensp;<b>Change Profile</b></button> &ensp;&ensp;
                            <a class="custom-btn btn ms-lg-auto" href="profile-builder.php"><b>Build Your Profile</b></a><br/><br/>
                        
                                <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="change" style="display:none !important">
                                
                                        <label for="Profile"> Update Profile Photo</label>

                                        <input type="file" accept="image/jpeg,image/png,image/jpg" name="img" id="img" class="form-control" required>
                                    
                                    
                                        <button type="submit" class="custom-btn btn ms-lg-auto" name="change">Change Picture</button>
                                    
                                </form>
                        </div>
                    </center>
                        <div class="col-lg-5 col-12 mb-3 mx-auto">
                        <fieldset style="font-weight:bold;">
                        <legend style="padding:5px 0 0; text-decoration:underline;" align="center"><h3>Personal Information</h3></legend>
                            <div class="contact-info-wrap" style="padding:0 7px 7px 7px">
                            
                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Username</span>

                                        ' . $result['U_Name'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Email</span>

                                        ' . $result['U_Email'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Mobile</span>

                                        ' . $result['U_Mobile'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Gender</span>

                                        ' . $result['U_Gender'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Date of Birth</span>

                                        ' . $result['U_DOB'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Address</span>

                                        ' . $result['U_City'] . ', ' . $result['U_Country'] . '
                                    </p>
                                </div>   
                            </div>
                            
                            </fieldset>
                        </div>';



                        echo '<div class="col-lg-5 col-12 mb-3 mx-auto">
                        <fieldset style="font-weight:bold;">
                        <legend style="padding:5px 0 0; text-decoration:underline;" align="center"><h3>Education & Experience</h3></legend>
                            <div class="contact-info-wrap" style="padding:0 7px 7px 7px">
                            
                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Cource</span>

                                        ' . $result['ED_Course'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Institute</span>

                                        ' . $result['ED_Institute'] . ',  ' . $result['ED_Inst_City'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Duration of Course</span>

                                        ' . $result['ED_Start_Year'] . ' to ' . $result['ED_End_Year'] . '
                                    </p>
                                </div>
   
                            </div>
                         
                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Years of Experience</span>

                                        ' . $result['EX_Years'] . ' years as ' . $result['EX_Desg'] . ' 
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Comapny</span>

                                        ' . $result['EX_Com'] . ', ' . $result['EX_City'] . '
                                    </p>
                                </div>

                                <div class="contact-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="contact-info-small-title">Duration of Job</span>

                                        ' . $result['EX_Joining_Year'] . ' to ' . $result['EX_Leaving_Year'] . '
                                    </p>
                                </div>
   
                            </div>
                            </fieldset>
                            <div class="col-lg-6 col-12 mb-lg-5 mb-3" align="center" style="padding-top:30px">
                                <a href="ud-update.php" id="form" class="custom-btn btn ms-lg-auto" width="100%"><i class="fa fa-edit" style="font-size:18px"></i>&ensp;<b>Update Information</b></a>
                            </div>
                        </div>
                        </div>
            </section>
            ';
                    } ?>


                    <section class="cta-section">
                        <div class="section-overlay"></div>

                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6 col-10">
                                    <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                                    <p class="text-white">RECRUITIFY JOBS - Come, Browse & Get Desired Job. </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    </main>
</body>
<script>
    function showForm() {
        var x = document.getElementById('change');
        if (x.style.display == 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
</script>

</html>

<?php

// error_reporting(0);





$ip = "../images/user-img/user-profile/";
$ip2 = "images/user-img/user-profile/";
if (isset($_POST['change'])) {
    $img = $ip . basename($_FILES['img']['name']);
    $img2 = $ip2 . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
        $sql = "update User_tbl set U_Image='$img2' where U_Id='$_SESSION[user__id]'";
        $data = mysqli_query($con, $sql);
        if ($data) {
            echo "<script> location.replace('profile.php');</script>";
        } else {
            echo "Profile was not Changed!!";
        }
    } else echo "Profile was not Changed!!";
}
include 'footer.php';
?>