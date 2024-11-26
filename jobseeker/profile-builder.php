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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    <style>
        font {
            color: red;
            font-weight: bold;
        }

        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }

        label {
            font-weight: bold;
            font-size: 17px
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
                        <h1 class="text-white">Profile Building</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Profile Building</li>
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
                        <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="edu">
                            <h2 class="text-center mb-4">Education Details</h2>

                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label for="Course">Course<font>*</font></label>

                                    <input type="text" name="course" id="course" class="form-control" placeholder="course" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="institute">Institute/University<font>*</font></label>
                                    <input tyoe="text" name="uni" id="uni" class="form-control" placeholder="Universiry" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="city">City<font>*</font></label>

                                    <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="start">Starting Year<font>*</font></label>
                                    <input type="text" name="start" id="start" class="form-control" placeholder="Starting year">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="end">Ending Year</label>
                                    <input type="text" name="end" id="end" class="form-control" placeholder="Ending Year" required>
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="saveEdu">Save Details</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form" enctype="multipart/form-data" id="exp" method="post" role="form" style="display:none">
                            <h2 class="text-center mb-4">Experience Details</h2>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="year">Years of Experience<font>*</font></label>

                                    <input type="text" name="eyear" id="eyear" class="form-control" placeholder="Years of Experience" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">

                                    <label for="crntJob">Is this your current job?<font>*</font></label>
                                    <center>
                                        <div class="form-control">
                                            <label><input type="radio" name="iscrnt" id="crnt" value="True" required> YES &emsp;</label>
                                            &emsp;<label><input type="radio" name="iscrnt" id="crnt" value="False" required> NO </label>
                                        </div>
                                    </center>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="company">Company<font>*</font></label>
                                    <input tyoe="text" name="company" id="company" class="form-control" placeholder="Company" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="city">City<font>*</font></label>

                                    <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="desg">Designation<font>*</font></label>
                                    <input type="text" name="desg" id="desg" class="form-control" placeholder="Designation">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="salary">Salary<font>*</font></label>
                                    <input type="number" name="salary" id="salary" class="form-control" placeholder="Estimated Salary" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="join">Joining Year<font>*</font></label>
                                    <input type="text" name="start" id="start" class="form-control" placeholder="Starting year" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="end">Leaving Year</label>
                                    <input type="text" name="end" id="end" class="form-control" placeholder="Ending Year">
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="skill">Skills<font>*</font></label>
                                    <!--<input type="text" name="company" id="company" class="form-control" placeholder="Company" required>-->
                                    <select class="form-select form-control skills" name="skills[]" id="skills" aria-label="Default select example" multiple>
                                        <option disabled selected value>Skills</option>
                                        <?php
                                        include '../db-connect.php';
                                        $q = "select S_Id,S_Name from skill_set_tbl";
                                        $d = mysqli_query($con, $q);
                                        while ($r = mysqli_fetch_array($d)) {
                                            echo '
                                                        <option value=' . $r['S_Id'] . '>' . $r['S_Name'] . '</option>
                                                    ';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="saveExp">Save Details</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        // $(".skills").select2({
        //     //maximumSelectionLength: 2
        // });
        var myDrop = new drop({
            selector: 'skills'
        });
    </script>
</body>
<?php
include '../db-connect.php';
include 'footer.php';
//error_reporting(0);
// ();

if (isset($_POST['saveEdu'])) {
    $course = $_POST['course'];
    $uni = $_POST['uni'];
    $city = $_POST['city'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "insert into Education_tbl values(ED_Id,'$_SESSION[user_id]','$course','$uni','$city','$start','$end')";
    $data = mysqli_query($con, $sql);
    echo "<script>  var x = document.getElementById('exp');var y = document.getElementById('edu');x.style.display = 'block';y.style.display = 'none';</script>";
}

if (isset($_POST['saveExp'])) {
    $year = $_POST['eyear'];
    $iscrnt = $_POST['iscrnt'];
    $com = $_POST['company'];
    $city = $_POST['city'];
    $desg = $_POST['desg'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $salary = $_POST['salary'];
    $skills = $_POST['skills'];

    foreach ($skills as $skill) {
        $sql1 = "insert into User_Skill_tbl values(US_Id,'$_SESSION[user_id]','$skill')";
        $data1 = mysqli_query($con, $sql1);
    }
    $sql2 = "insert into experience_tbl values(EX_Id,'$_SESSION[user_id]','$year','$iscrnt','$com','$city','$desg','$start','$end','$salary')";
    $data2 = mysqli_query($con, $sql2);
    if ($data2 && $data1) {
        echo "<script> location.replace('profile.php');</script>";
    } else {
        echo "errorrr";
    }
}

?>

</html>