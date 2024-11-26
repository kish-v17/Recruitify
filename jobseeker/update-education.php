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

        <?php
        if ($_SESSION['user_id']) {
            $sql = "select * from Education_tbl E where E.Education_Id=" . $_GET["education_id"];
            $data = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($data);
        ?>

            <section class="contact-section section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="edu">
                                <h2 class="text-center mb-4">Update Education Details</h2>

                                <input type="hidden" name="education_id" value="<?= $_GET["education_id"] ?>" />
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <label for="Course">Course</label>
                                        <input type="text" name="course" id="course" class="form-control" value="<?php echo $result['Course']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="institute">Institute/University</label>
                                        <input tyoe="text" name="uni" id="uni" class="form-control" value="<?php echo $result['Institute']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">City</label>

                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['Institute_City']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="start">Starting Date</label>
                                        <input type="date" name="start" id="start" class="form-control" value="<?php echo $result['Start_Date']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="end">Ending Date</label>
                                        <input type="date" name="end" id="end" class="form-control" value="<?php echo $result['End_Date']; ?>">
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
        <?php } ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/index.js"></script>
</body>
<?php
include 'footer.php';

if (isset($_POST['edup'])) {
    $course = $_POST['course'];
    $uni = $_POST['uni'];
    $city = $_POST['city'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $education_id = $_POST["education_id"];

    $sql = "update Education_tbl set Course='$course', Institute='$uni', Institute_City='$city', Start_Date='$start', End_Date='$end' where Education_Id='$education_id'";
    $data = mysqli_query($con, $sql);
    echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
}

?>

</html>