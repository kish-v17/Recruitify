<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Applicant Profile</title>

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

<?php include "navbar.php"; ?>

<main>
    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">    
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Applicant Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

<?php

// Get user_id from URL
$user_id = $_GET['user_id'];

// Fetch user details
$query = "SELECT * FROM users_tbl WHERE User_Id=" . $user_id;
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Fetch education details
$educationQuery = "SELECT * FROM education_tbl WHERE User_Id=" . $user_id;
$educationResult = mysqli_query($con, $educationQuery);

// Fetch experience details
$experienceQuery = "
    SELECT e.Experience_Id, e.Designation, e.Joining_Date, e.Leaving_Date, c.Name as 'Company_Name', CONCAT(', ',b.city,', ', b.country) as 'Branch_Address'
    FROM experience_tbl e
    INNER JOIN company_tbl c ON e.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON e.Branch_Id = b.Branch_Id
    WHERE e.User_Id = " . $user_id;

$experienceResult = mysqli_query($con, $experienceQuery);

// Fetch skills details
$skillsQuery = "SELECT s.Skill_Name FROM user_skills_tbl us
                JOIN skills_tbl s ON us.Skill_Id = s.Skill_Id
                WHERE us.User_Id = " . $user_id;
$skillsResult = mysqli_query($con, $skillsQuery);
?>
                <center>   
                    <div class="col-lg-4 col-md-4 col-6 mx-auto mb-5" >
                        <img height="150px" width="150px" style="object-fit: cover; border-radius:50%;" src="../<?= $user['Image'] ?>" alt="Profile Image">
                    </div>
                </center>
<!-- Personal Information -->
<div class="row justify-content-center">
    <div class="col-lg-8 col-12 mb-3 mx-auto">
        <fieldset style="font-weight:bold;">
            <legend style="padding:5px 0 0; text-decoration:underline;" align="center">
                <h3>Personal Information</h3>
            </legend>
            <div class="contact-info-wrap" style="padding:0 7px 7px 7px">
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Username</span>
                        <?= $user['Name'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Email</span>
                        <?= $user['Email'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Mobile</span>
                        <?= $user['Mobile'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Gender</span>
                        <?= $user['Gender'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Date of Birth</span>
                        <?= $user['DOB'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title">Address</span>
                        <?= $user['City'] ?>, <?= $user['State'] ?>, <?= $user['Country'] ?>
                    </p>
                </div>
                <div class="contact-info d-flex align-items-center">
                    <p class="mb-0">
                        <span class="contact-info-small-title mb-1">Skills</span>
                        <?php while ($skill = mysqli_fetch_assoc($skillsResult)): ?>
                            <span class="badge"><?= $skill['Skill_Name'] ?></span>
                        <?php endwhile; ?>
                    </p>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<!-- Education Information -->
<div class="row justify-content-center mb-3">
    <div class="col-12 mb-3 mx-auto">
        <fieldset style="font-weight:bold;">
            <legend style="padding:5px 0 0; text-decoration:underline;" align="center">
                <h3>Education</h3>
            </legend>
            <div class="row">
            <?php 
            while ($education = mysqli_fetch_assoc($educationResult)) {
            ?>                                  
                <div class="col-lg-6 col-12 contact-info-wrap position-relative" style="padding:0 7px 7px 7px">
                    <div class="contact-info d-flex align-items-center">
                        <p class="mb-0">
                            <span class="contact-info-small-title">Course</span>
                            <?= $education['Course'] ?>
                        </p>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <p class="mb-0">
                            <span class="contact-info-small-title">Institute</span>
                            <?= $education['Institute'] ?>, <?= $education['Institute_City'] ?>
                        </p>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <p class="mb-0">
                            <span class="contact-info-small-title">Duration</span>
                            <?php 
                            $end_date = $education['End_Date'];
                            $end_date = $end_date == "" ? "" : date('d-m-Y', strtotime($end_date));
                            echo date('d-m-Y', strtotime($education['Start_Date'])) . ($end_date != "" ? " to " . $end_date : "");
                            ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </fieldset>
    </div>
</div>

<!-- Experience Information -->
<div class="row justify-content-center">
    <div class="col-lg-12 col-12 mb-3 mx-auto">
        <fieldset style="font-weight:bold;">
            <legend style="padding:5px 0 0; text-decoration:underline;" align="center">
                <h3>Experience</h3>
            </legend>
            <div class="row">
            <?php 
            while ($experience = mysqli_fetch_assoc($experienceResult)) {
                $joiningDate = new DateTime($experience['Joining_Date']);
                $leavingDate = $experience['Leaving_Date'] ? new DateTime($experience['Leaving_Date']) : new DateTime(); // Current date if NULL
                $interval = $joiningDate->diff($leavingDate);
                $years = $interval->y;
                $months = $interval->m;
                $experienceString = "as " . $experience['Designation'] . " for " . ($years > 0 ? $years . " year" . ($years > 1 ? "s" : "") : "") . ($months > 0 ? " " . $months . " month" . ($months > 1 ? "s" : "") : "") . " at " . $experience['Company_Name'];
            ?>
                <div class="col-lg-6 col-12 mb-3 mx-auto">
                    <div class="contact-info-wrap position-relative" style="padding:0 7px 7px 7px">
                        <div class="contact-info d-flex align-items-center">
                            <p class="mb-0">
                                <span class="contact-info-small-title">Company</span>
                                <?= $experience['Company_Name'] ?>
                            </p>
                        </div>
                        <div class="contact-info d-flex align-items-center">
                            <p class="mb-0">
                                <span class="contact-info-small-title">Location</span>
                                <?= $experience['Branch_Address'] ?>
                            </p>
                        </div>
                        <div class="contact-info d-flex align-items-center">
                            <p class="mb-0">
                                <span class="contact-info-small-title">Duration</span>
                                <?= $experienceString ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </fieldset>
    </div>
</div>

</div>
</section>

</main>

<?php include "footer.php"; ?>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/waypoints.min.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
