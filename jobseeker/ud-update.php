<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Details</title>

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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    <style>
        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }

        label {
            font-weight: bold;
            font-size: 17px
        }

        .services-block {
            border-top: 25px solid transparent;
            border-radius: var(--border-radius-medium);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.5s;
            padding: 40px;
        }

        .services-block:hover,
        .services-section .services-block-wrap .services-block {
            background: var(--section-bg-color);
            border-top-color: var(--secondary-color);
        }

        .services-block-icon {
            background: var(--white-color);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
            border-radius: var(--border-radius-large);
            display: block;
            color: var(--secondary-color);
            font-size: var(--h2-font-size);
            line-height: normal;
            width: 120px;
            height: 120px;
            line-height: 135px;
            margin: auto;
            margin-bottom: 24px;
            text-align: center;
            position: relative;
            transition: all 0.5s;
        }

        .services-block-body p {
            margin-bottom: 0;
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
                        <h1 class="text-white">Update Details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Update Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section class="services-section section-padding" id="services-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Update User Details</h2>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap" onclick="show(1)">
                                <i class="services-block-icon bi-person-circle" style="font-size:70px;"></i>

                                <h4 class="services-block-title">Personal Details</h4>
                            </div>
                        </div>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap" onclick="show(2)">
                                <i class="services-block-icon bi-book-half" style="font-size:70px;"></i>

                                <h4 class="services-block-title">Education Details</h4>
                            </div>
                        </div>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap" onclick="show(3)">
                                <i class="services-block-icon bi-stars" style="font-size:70px;"></i>

                                <h4 class="services-block-title">Experience Details</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if ($_SESSION['user_id']) {
            $sql = "select * from Users_tbl U INNER JOIN Education_tbl E on E.Education_Id='$_SESSION[user_id]' INNER JOIN Experience_tbl EX on EX.User_Id='$_SESSION[user_id]' where U.User_Id='$_SESSION[user_id]'";
            $data = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($data);

            switch ($result['Gender']) {
                case 'Male':
                    $ck1 = 'checked';
                    $ck2 = '';
                    $ck3 = '';
                    break;
                case 'Female':
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
            switch ($result['Is_Current']) {
                case 'Yes':
                    $c1 = 'checked';
                    $c2 = '';
                    break;
                case 'No':
                    $c1 = '';
                    $c2 = 'checked';
                    break;
            }
        ?>

            <section class="contact-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" method="post" role="form" id="personal" style="padding:0 0 50px 0;display:none !important">
                                <h2 class="text-center mb-4">Personal Informathion</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="first-name">Full Name</label>

                                        <input type="text" name="full-name" id="full-name" class="form-control" value="<?php echo $result['Name']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="email">Email Address</label>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" value="<?php echo $result['Email']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="dob">Date of Birth</label>

                                        <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $result['DOB']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="gender">Gender</label>
                                        <div class="form-control">
                                            <label><input type="radio" name="gender" id="gender" value="Male" <?php echo $ck1; ?> /> Male &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Female" <?php echo $ck2; ?> /> Female &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Other" <?php echo $ck3; ?> /> Other</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="mobile" style="display:block">Mobile</label>

                                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo $result['Mobile']; ?>" pattern={0-9}[10]>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">City</label>

                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['City']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">State</label>

                                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $result['State']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="country">Country</label>

                                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $result['Country']; ?>">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="pup">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="edu" style="display:none">
                                <h2 class="text-center mb-4">Education Details</h2>

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <label for="Course">Course</label>

                                        <input type="text" name="course" id="course" class="form-control" value="<?php echo $result['ED_Course']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="institute">Institute/University</label>
                                        <input tyoe="text" name="uni" id="uni" class="form-control" value="<?php echo $result['ED_Institute']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">City</label>

                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['ED_Inst_City']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="start">Starting Year</label>
                                        <input type="text" name="start" id="start" class="form-control" value="<?php echo $result['ED_Start_Year']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="end">Ending Year</label>
                                        <input type="text" name="end" id="end" class="form-control" value="<?php echo $result['ED_End_Year']; ?>">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="edup">Update</button>
                                    </div>
                                    <br /><br /><br />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-section">
                <div class="container">
                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form" enctype="multipart/form-data" id="exp" method="post" role="form" style="display:none">
                            <h2 class="text-center mb-4">Experience Details</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="year">Years of Experience</label>

                                    <input type="text" name="eyear" id="eyear" class="form-control" value="<?php echo $result['EX_Years']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">

                                    <label for="crntJob">Is this your current job?</label>
                                    <center>
                                        <div class="form-control">
                                            <label><input type="radio" name="iscrnt" id="crnt" value="Yes" <?php echo $c1; ?>> YES &emsp;</label>
                                            &emsp;<label><input type="radio" name="iscrnt" id="crnt" value="No" <?php echo $c2; ?>> NO </label>
                                        </div>
                                    </center>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="company">Company</label>
                                    <input tyoe="text" name="company" id="company" class="form-control" value="<?php echo $result['EX_Com']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="city">City</label>

                                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['EX_City']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="desg">Designation</label>
                                    <input type="text" name="desg" id="desg" class="form-control" value="<?php echo $result['EX_Desg']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="salary">Salary</label>
                                    <input type="number" name="salary" id="salary" class="form-control" value="<?php echo $result['EX_Salary']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="join">Joining Year</label>
                                    <input type="text" name="start" id="start" class="form-control" value="<?php echo $result['EX_Joining_Year']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="end">Leaving Year</label>
                                    <input type="text" name="end" id="end" class="form-control" value="<?php echo $result['EX_Leaving_Year']; ?>">
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="exup">Update</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        <?php } ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        function show(a) {
            if (a == 1) {
                var x = document.getElementById('personal');
                var y = document.getElementById('edu');
                var z = document.getElementById('exp');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                    z.style.display = 'none';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                    z.style.display = 'none';
                }
            }
            if (a == 2) {
                var y = document.getElementById('personal');
                var x = document.getElementById('edu');
                var z = document.getElementById('exp');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                    z.style.display = 'none';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                    z.style.display = 'none';
                }
            }
            if (a == 3) {
                var z = document.getElementById('personal');
                var y = document.getElementById('edu');
                var x = document.getElementById('exp');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                    z.style.display = 'none';
                } else {
                    x.style.display = 'none';
                    y.style.display = 'none';
                    z.style.display = 'none';
                }
            }
        }
    </script>
</body>
<?php
include 'footer.php';
//error_reporting(0);
// ();

if (isset($_POST['pup'])) {

    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $mob = $_POST['mobile'];
    $state = $_POST['state'];
    $country = $_POST['country'];


    $sql = "update User_tbl set U_Name='$name', U_Email='$email', U_DOB='$dob', U_Gender='$gender', U_City='$city', U_State='$state', U_Country='$country', U_Mobile='$mob' where U_Id='$_SESSION[user_id]'";
    $data = mysqli_query($con, $sql);
    if ($data) {
        echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
    } else {
        echo "errorrr";
    }
}


if (isset($_POST['edup'])) {
    $course = $_POST['course'];
    $uni = $_POST['uni'];
    $city = $_POST['city'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "update Education_tbl set ED_Course='$course', ED_Institute='$uni', ED_Inst_City='$city', ED_Start_Year='$start', ED_End_Year='$end' where ED_U_Id='$_SESSION[user_id]'";
    $data = mysqli_query($con, $sql);
    echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
}

if (isset($_POST['exup'])) {
    $year = $_POST['eyear'];
    $iscrnt = $_POST['iscrnt'];
    $com = $_POST['company'];
    $city = $_POST['city'];
    $desg = $_POST['desg'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $salary = $_POST['salary'];

    $sql = "update Experience_tbl set EX_Years='$year', EX_Is_Crnt='$iscrnt', EX_Com='$com',EX_City='$city',EX_Desg='$desg',EX_Salary='$salary', EX_Joining_Year='$start', EX_Leaving_Year='$end' where EX_U_Id='$_SESSION[user_id]'";
    $data = mysqli_query($con, $sql);
    if ($data) {
        echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
    } else {
        echo "errorrr";
    }
}

?>

</html>