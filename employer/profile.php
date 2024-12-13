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
            border-radius: 500px;
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
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <?php
        if ($_SESSION['user_id']) {
            // $sql = "select C.*, U.*, B.*, C.Name as 'Company_Name', CONCAT(B.City, ', ', B.State, ', ', B.Country) as 'Address' from company_tbl C 
            //             inner join Users_tbl U on C.Company_Id = U.Company_Id
            //             inner join branch_tbl B on B.Branch_Id =  U.Branch_Id
            //             where User_Id='$_SESSION[user_id]'";
            $sql = "select * from Users_tbl where User_Id='$_SESSION[user_id]'";
            $data = mysqli_query($con, $sql);
            if (mysqli_num_rows($data) > 0) {
                $result = mysqli_fetch_assoc($data);
                switch ($result['Gender']) {
                    case 'Male':
                        $ck1 = 'checked';
                        $ck2 = '';
                        $ck3 = '';
                        break;
                    case
                    'Female':
                        $ck1 = '';
                        $ck2 = 'checked';
                        $ck3 = '';
                        break;
                    case 'Other':
                        $ck1 = '';
                        $ck2 = '';
                        $ck3 = 'checked';
                        break;
                }
        ?>
                <section class="contact-section section-padding">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <center><img height="350px" width="350px" style="object-fit: cover;border-radius:50%;" src="../<?= $result['Image'] ?>" alt="Image">
                                    <br /><br />
                                    <button class="custom-btn btn ms-lg-auto" style="width:100%" onclick="showForm()" href="#change"><i class="fa fa-file-image-o"></i>&ensp;<b>Change Profile</b></button> &ensp;&ensp;
                                </center>

                                <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="change" style="display:none !important">

                                    <label for="Profile"> Update Profile Photo</label>

                                    <input type="file" accept="image/jpeg,image/png,image/jpg" name="img" id="img" class="form-control" required>


                                    <button type="submit" class="custom-btn btn ms-lg-auto" name="change">Change Picture</button>

                                </form>
                            </div>


                            <div class="col-lg-5 col-12 mb-3 mx-auto">
                                <fieldset style="font-weight:bold;">
                                    <legend style="padding:5px 0 0; text-decoration:underline;" align="center">
                                        <h3>Personal Information</h3>
                                    </legend>
                                    <div class="contact-info-wrap" style="padding:0 7px 7px 7px">

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Username</span>

                                                <?= $result['Name'] ?>
                                            </p>
                                        </div>

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Email</span>
                                                <?= $result['Email'] ?>
                                            </p>
                                        </div>

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Mobile</span>
                                                <?= $result['Mobile'] ?>
                                            </p>
                                        </div>

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Gender</span>
                                                <?= $result['Gender'] ?>
                                            </p>
                                        </div>

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Date of Birth</span>
                                                <?= $result['DOB'] ?>
                                            </p>
                                        </div>

                                        <div class="contact-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <span class="contact-info-small-title">Address</span>
                                                <?= $result['City'] . ' , ' . $result['State'] . ' ' . $result['Country'] ?>
                                            </p>
                                        </div>
                                        <?php
                                        $q = "select C.Name as 'Company_Name', CONCAT(B.City, ', ', B.State, ', ', B.Country) as 'Address' from company_tbl C inner join branch_tbl B on B.Branch_Id =  C.Main_Branch_Id where C.Posted_by='$_SESSION[user_id]'";
                                        $d = mysqli_query($con, $q);
                                        if (mysqli_num_rows($d) > 0) {
                                            $company = mysqli_fetch_assoc($d);
                                        ?>
                                            <div class="contact-info d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="contact-info-small-title">Company</span>
                                                    <?= $company['Company_Name'] ?>
                                                </p>
                                            </div>
                                            <div class="contact-info d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="contact-info-small-title">Company Address</span>
                                                    <?= $company['Address'] ?>
                                                </p>
                                            </div>
                                        <?php } else { ?>
                                            <div class="contact-info d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="contact-info-small-title">Company</span>
                                                    <?php echo 'Not Added Yet.!'; ?>
                                                    
                                                </p>
                                            </div>
                                            <div class="contact-info d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="contact-info-small-title">Company Address</span>
                                                    <?php echo 'Nan'; ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                        </center>
                                    </div><br />
                                    <center>
                                        <button onclick="showForm(2)" id="form" class="custom-btn btn ms-lg-auto"><i class="fa fa-edit" style="font-size:18px"></i>&ensp;<b>Update Information</b></button>
                                        <center>
                                </fieldset>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="contact-section" style="padding:0 0 50px 0;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-12 mx-auto">
                                <form class="custom-form contact-form" method="post" role="form" id="update" style="display:none !important">
                                    <h2 class="text-center mb-4">Update Information</h2>

                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <label for="first-name">Full Name</label>

                                            <input type="text" name="full-name" id="full-name" class="form-control" value='<?= $result["Name"] ?>'>
                                        </div>

                                        <!-- <div class="col-lg-6 col-md-6 col-12">
                            <label for="email">Email Address</label>

                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" value='<?= $result["Email"] ?>' >
                        </div> -->

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="dob">Date of Birth</label>

                                            <input type="date" name="dob" id="dob" class="form-control" value='<?= $result["DOB"] ?>'>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="gender">Gender</label>
                                            <div class="form-control">
                                                <label><input type="radio" name="gender" id="gender" value="Male" <?= $ck1 ?> /> Male &emsp;</label>
                                                <label><input type="radio" name="gender" id="gender" value="Female" <?= $ck2 ?> /> Female &emsp;</label>
                                                <label><input type="radio" name="gender" id="gender" value="Other" <?= $ck3 ?> /> Other</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="mobile" style="display:block">Mobile</label>

                                            <input type="tel" name="mobile" id="mobile" class="form-control" value='<?= $result["Mobile"] ?>' pattern={0-9}[10]>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="city">City</label>

                                            <input type="text" name="city" id="city" class="form-control" value='<?= $result["City"] ?>'>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="state">State</label>

                                            <input type="text" name="state" id="state" class="form-control" value='<?= $result["State"] ?>'>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="country">Country</label>

                                            <input type="text" name="country" id="country" class="form-control" value='<?= $result["Country"] ?>'>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="company">Company</label>
                                            <select name="company" id="company" class="form-control">
                                                <?php
                                                $query = "SELECT Company_Id, Name FROM company_tbl";
                                                $data = mysqli_query($con, $query);
                                                echo '<option value="">Select Company</option>';
                                                if ($data && mysqli_num_rows($data) > 0) {
                                                    while ($row = mysqli_fetch_assoc($data)) {
                                                        echo '<option value="' . $row['Company_Id'] . '" >' . $row['Name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p class="d-flex justify-content-center">
                                                Can't find your company?
                                                <a href="add-company.php" class="ms-2">Add Company</a>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="branch">Branch</label>
                                            <select name="branch" id="branch" class="form-control">
                                                <option value="">Select Branch</option>
                                            </select>
                                            <p class="d-flex justify-content-center">
                                                Can't find your branch?
                                                <a href="add-branch.php" class="ms-2">Add Branch</a>
                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                            <button type="submit" class="form-control" name="update">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
        <?php } else {
                echo 'byee';
            }
        } ?>

        <section class="cta-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10">
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">Recruitify Job is a free HTML CSS template for job hunting related websites. This layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting Tooplate website.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    function showForm(a) {
        if (a == 2) {
            var x = document.getElementById('update');
            if (x.style.display == 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        } else {
            var x = document.getElementById('change');
            if (x.style.display == 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        }
    }
    document.addEventListener('DOMContentLoaded', () => {
        const companyDropdown = document.getElementById('company');
        const branchDropdown = document.getElementById('branch');

        // Listen for changes in the company dropdown
        companyDropdown.addEventListener('change', () => {
            const companyId = companyDropdown.value; // Get selected company ID

            if (companyId) {
                fetch('../php/fetch-branches.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `company_id=${companyId}`,
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text(); // Parse response as text
                    })
                    .then((data) => {
                        // Populate the branch dropdown with received options
                        console.log(data); // Debug the response here
                        branchDropdown.innerHTML = data;
                    })
                    .catch((error) => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            } else {
                branchDropdown.innerHTML = '<option value="">Select Branch</option>';
            }
        });
    });
</script>

</html>

<?php

if (isset($_POST['update'])) {
    $name = $_POST['full-name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $company_id = $_POST['company'];
    $branch_id = $_POST['branch'];

    $query = " UPDATE users_tbl SET Name='$name', DOB='$dob', Gender='$gender', City='$city', State='$state', Country='$country', Mobile='$mobile', Company_Id=" . ($company_id ? "'$company_id'" : "NULL") . ", Branch_Id=" . ($branch_id ? "'$branch_id'" : "NULL") . " WHERE User_Id=" . $_SESSION["user_id"];

    // Execute query
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Profile updated successfully!'); location.replace('profile.php');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}



$ip = "../images/user-img/user-profile/";
$ip2 = "images/user-img/user-profile/";
if (isset($_POST['change'])) {
    $img = $ip . basename($_FILES['img']['name']);
    $img2 = $ip2 . basename($_FILES['img']['name']);
    if (move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
        $sql = "update Users_tbl set Image='$img2' where User_Id='$_SESSION[user_id]'";
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