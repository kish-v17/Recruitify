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

<?php include "navbar.php"; ?>

<main>
    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">    
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">My Profile</h1>
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


<?php
$query = "SELECT * FROM users_tbl WHERE User_Id=" . $_SESSION["user_id"];
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

$educationQuery = "SELECT * FROM education_tbl WHERE User_Id=" . $_SESSION["user_id"];
$educationResult = mysqli_query($con, $educationQuery);

$experienceQuery = "
    SELECT e.Experience_Id, e.Designation, e.Joining_Date, e.Leaving_Date, c.Name as 'Company_Name', CONCAT(', ',b.city,', ', b.country) as 'Branch_Address'
    FROM experience_tbl e
    INNER JOIN company_tbl c ON e.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON e.Branch_Id = b.Branch_Id
    WHERE e.User_Id = " . $_SESSION["user_id"];

$experienceResult = mysqli_query($con, $experienceQuery);

$skillsQuery = "SELECT s.Skill_Name FROM user_skills_tbl us
                JOIN skills_tbl s ON us.Skill_Id = s.Skill_Id
                WHERE us.User_Id = " . $_SESSION["user_id"];
$skillsResult = mysqli_query($con, $skillsQuery);
?>
<section class="contact-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <center>   
                    <div class="col-lg-4 col-md-4 col-6 mx-auto mb-5" >
                        <img height="150px" width="150px" style="object-fit: cover; border-radius:50%;" src="../<?= $user["Image"] ?>" alt="Profile Image">
                        <br/><br/>
                        <button class="custom-btn btn ms-lg-auto" onclick="showForm()" href="#change"><i class="fa fa-file-image-o"></i>&ensp;<b>Change Profile</b></button> &ensp;&ensp;

                        <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="change" style="display:none !important">
                            <label for="Profile">Update Profile Photo</label>
                            <input type="file" accept="image/jpeg,image/png,image/jpg" name="img" id="img" class="form-control" required>
                            <button type="submit" class="custom-btn btn ms-lg-auto" name="change">Change Picture</button>
                        </form>
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
            <div class="col-12 mb-lg-5 mb-3" align="center" style="margin-top:50px">
                <a href="ud-update.php" class="custom-btn btn">Edit Profile</a>
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
            $count=0;  
            
            while ($education = mysqli_fetch_assoc($educationResult)){ 
            $count++; 
            ?>                                    
                <div class="col-lg-6 col-12 contact-info-wrap position-relative" style="padding:0 7px 7px 7px">
                    <div class="d-flex justify-content-end position-absolute top-0 end-0 pt-3 pe-5" >
                        <a href="update-education.php?education_id=<?= $education['Education_Id']?>" class="btn btn-dark btn-sm mx-1" title="Update">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="delete-education.php?education_id=<?= $education['Education_Id']?>" class="btn btn-danger btn-sm mx-1" title="Delete">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
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
                            <?php $end_date = $education['End_Date'];
                            $end_date= $end_date==""?"":date('d-m-Y', strtotime($end_date));?> 
                            <?= date('d-m-Y', strtotime($education['Start_Date']))  ?> <?= ($end_date!=""? "to ".$end_date: "") ?>
                        </p>
                    </div>
                </div>
                <?= $count%2==0? "<hr>" : "" ?>
            <?php } ?>
            </div>
            <div align="center">
                <a href="add-education.php" class="custom-btn btn">Add New Education</a>
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
            $count=0; 
            while ($experience = mysqli_fetch_assoc($experienceResult)) {
                $count++;
                $joiningDate = new DateTime($experience['Joining_Date']);
                $leavingDate = $experience['Leaving_Date'] ? new DateTime($experience['Leaving_Date']) : new DateTime(); // Current date if NULL
                $interval = $joiningDate->diff($leavingDate);
                $years = $interval->y; // Extract the years
                $months = $interval->m; // Extract the months
            
                // Format the output
                $experienceString = "as " . $experience['Designation'] . " for ";
                if ($years > 0) {
                    $experienceString .= $years . " year" . ($years > 1 ? "s" : ""); // Handle plural
                }
                if ($months > 0) {
                    if ($years > 0) $experienceString .= " and "; // Add "and" if both years and months exist
                    $experienceString .= $months . " month" . ($months > 1 ? "s" : ""); // Handle plural
                }
                ?>
                <div class="col-lg-6 col-12 contact-info-wrap position-relative" style="padding:0 7px 7px 7px">
                    <div class="d-flex justify-content-end position-absolute top-0 end-0 pt-3 pe-5" >
                        <a href="update-experience.php?experience_id=<?= $experience['Experience_Id']?>" class="btn btn-dark btn-sm mx-1" title="Update">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="delete-experience.php?experience_id=<?= $experience['Experience_Id']?>" class="btn btn-danger btn-sm mx-1" title="Delete">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <p class="mb-0">
                            <span class="contact-info-small-title">Company</span>
                            <?= $experience['Company_Name'] .' '.  $experience['Branch_Address']  ?>
                        </p>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <p class="mb-0">
                            <span class="contact-info-small-title">Designation</span>
                            <?= $experienceString ?>
                        </p>
                    </div>
                </div>
                <?= $count%2==0? "<hr>" : "" ?>
            <?php } ?>
            </div>

            <div align="center">
                <a href="add-experience.php" class="custom-btn btn">Add New Experience</a>
            </div>
        </fieldset>
    </div>
</div>
            </div>
        </div>
    </section>

    

</main>

<script>
    function showForm() {
        var form = document.getElementById("change");
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>

<?php include "footer.php"; 
$ip = "../images/user-img/user-profile/";
$ip2 = "images/user-img/user-profile/";
if (isset($_POST['change'])) {
    $img = $ip . basename($_FILES['img']['name']);
    $img2 = $ip2 . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
        $sql = "update Users_tbl set Image='$img2' where User_Id='$_SESSION[user__id]'";
        $data = mysqli_query($con, $sql);
        if ($data) {
            echo "<script> location.replace('profile.php');</script>";
        } else {
            echo "Profile was not Changed!!";
        }
    } else echo "Profile was not Changed!!";
}
?>
</body>
</html>