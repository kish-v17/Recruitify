<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Job Posting</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link href="../css/owl.carousel.min.css" rel="stylesheet">

    <link href="../css/owl.theme.default.min.css" rel="stylesheet">

    <link href="tooplate-Recruitify-job.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />


    <style>
        font {
            color: red;
            font-weight: bold;
        }

        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }
    </style>
</head>

<body id="top">

    <?php include 'navbar.php'; ?>

    <main>

        <header class="site-header">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Add Company Information</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Company Info</li>
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
                            <h2 class="text-center mb-4">Add Company Details</h2>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="Company Name">Company Name<font>*</font></label>

                                    <input type="text" name="cname" id="cname" class="form-control" placeholder="Company" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="Business Stream">Business Stream<font>*</font></label>
                                    <input type="text" name="stream" id="stream" class="form-control" placeholder="Business Stream" required>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-desc">Description<font>*</font></label>
                                    <textarea name="cdesc" id="cdesc" class="form-control" placeholder="About Company" required></textarea>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="EstYear">Establish Year<font>*</font></label>
                                    <input type="month" name="estyear" id="estyear" class="form-control" placeholder="Establish Year" value="2001-01" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="Website">Website<font>*</font></label>

                                    <input type="text" name="web" id="web" class="form-control" placeholder="Website" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="city">City<font>*</font></label>

                                    <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="State">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="country">Country<font>*</font></label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Country" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="mobile" style="display:block">Mobile<font>*</font></label>
                                    <!-- Country names and Phone Code -->
                                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile" pattern={0-9}[10] required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="email">Email Address<font>*</font></label>

                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="com-logo">Company Logo<font>*</font></label>

                                    <input type="file" accept="image/jpeg,image/png,image/jpg" name="c-img" id="c-img" class="form-control" required>
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="submit">Submit</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>



</body>
<?php
include '../db-connect.php';
include 'footer.php';
//error_reporting(0);
// ();

$ip = "../images/user-img/company-profile/";
if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $stream = $_POST['stream'];
    $esty = $_POST['estyear'];
    $web = $_POST['web'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $mob = $_POST['mobile'];
    $email = $_POST['email'];
    $c_img = $ip . basename($_FILES['c-img']['name']);

    if (move_uploaded_file($_FILES['c-img']['tmp_name'], $c_img)) {
        $sql = "insert into Company_tbl values(C_Id,'$_SESSION[user__id]','$cname','$cdesc','$stream','$esty','$web','$city','$state','$country','$mob','$email','$c_img')";
        $data = mysqli_query($con, $sql);
        if ($data) {
            echo "<script> location.replace('job-post.php');</script>";
        } else {
            echo "errorrr";
        }
    } else echo "error in uploading file";
}

?>

</html>