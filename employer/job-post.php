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
                        <h1 class="text-white">Job Posting</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Job Posting</li>
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
                            <h2 class="text-center mb-4">Add the job</h2>

                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label for="job-title">Job Title<font>*</font></label>

                                    <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" required>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-desc">Description<font>*</font></label>
                                    <textarea name="desc" id="desc" class="form-control" placeholder="About Job" required></textarea>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-reqs">Requirements<font>*</font></label>
                                    <textarea name="reqs" id="reqs" class="form-control" placeholder="Requirements" required></textarea>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-desc">Benefits<font>*</font></label>
                                    <textarea name="benefit" id="benefit" class="form-control" placeholder="Benefits" required></textarea>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="company">Company<font>*</font></label> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="insert-company.php" color="black">Add Your Company</a></u>
                                    <!--<input type="text" name="company" id="company" class="form-control" placeholder="Company" required>-->
                                    <select class="form-select form-control" name="company" id="company" aria-label="Default select example">
                                        <option disabled selected value>Company</option>
                                        <?php
                                        include '../db-connect.php';
                                        $q = "select C_Id,C_Name from Company_tbl";
                                        $d = mysqli_query($con, $q);
                                        while ($r = mysqli_fetch_array($d)) {
                                            echo '
                                                        <option value=' . $r['C_Id'] . '>' . $r['C_Name'] . '</option>
                                                    ';
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="Type">Job Type<font>*</font></label>

                                    <select class="form-select form-control" name="type" id="type" aria-label="Default select example">
                                        <option disabled selected value>Job Type</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Part Time">Part Time</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="salary">Salary<font>*</font></label>

                                    <input type="number" name="salary" id="salary" class="form-control" placeholder="Estimated Salary" required>
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
                                    <label for="">Country<font>*</font></label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Country" required>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-img">Job Image<font>*</font></label>

                                    <input type="file" accept="image/jpeg,image/png,image/jpg" name="j-img" id="j-img" class="form-control" required>
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

$ip = "../images/user-img/job-profile/";
$ip2 = "images/user-img/job-profile/";
if (isset($_POST['submit'])) {
    $title = $_POST['job-title'];
    $desc = $_POST['desc'];
    $reqs = $_POST['reqs'];
    $benefit = $_POST['benefit'];
    $com = $_POST['company'];
    $type = $_POST['type'];
    $salary = $_POST['salary'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $j_img = $ip . basename($_FILES['j-img']['name']);
    $j_pro = $ip2 . basename($_FILES['j-img']['name']);

    if (move_uploaded_file($_FILES['j-img']['tmp_name'], $j_img)) {
        $sql = "insert into Job_List_tbl values(J_Id,'$_SESSION[user_id]','$title',NOW(),'$desc','$com','$type','$reqs','$benefit','$salary','$j_pro','$city','$state','$country')";
        $data = mysqli_query($con, $sql);
        if ($data) {
            echo "<script> location.replace('job-listings.php');</script>";
        } else {
            echo "errorrr";
        }
    } else echo "error in uploading file";
}

?>

</html>