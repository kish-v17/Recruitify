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
            $sql = "select * from Experience_tbl where Experience_Id=".$_GET["experience_id"];
            $data = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($data);

            switch ($result['Is_Current']) {
                case '0':
                    $c1 = 'checked';
                    $c2 = '';
                    break;
                case '1':
                    $c1 = '';
                    $c2 = 'checked';
                    break;
            }
        ?>

            <section class="contact-section section-padding">
                <div class="container">
                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form" enctype="multipart/form-data" id="exp" method="post" role="form">
                            <h2 class="text-center mb-4">Experience Details</h2>
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="hidden" name="experience_id" value="<?= $_GET["experience_id"] ?>">
                                    <label for="crntJob">Is this your current job?</label>
                                    <center>
                                        <div class="form-control">
                                            <label><input type="radio" name="iscrnt" id="crnt" value="1" <?php echo $c1; ?>> YES &emsp;</label>
                                            &emsp;<label><input type="radio" name="iscrnt" id="crnt" value="0" <?php echo $c2; ?>> NO </label>
                                        </div>
                                    </center>
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
                                                echo '<option value="' . $row['Company_Id'] . '" ' . ($result['Company_Id']==$row['Company_Id']?'selected ':'') . ' >' . $row['Name'] . '</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="branch">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                    <?php
                                        $query = "SELECT Branch_Id, CONCAT(Address,' ', City,', ', State) AS Address FROM branch_tbl where Company_Id=" . $result["Company_Id"];
                                        $data = mysqli_query($con, $query);
                                        echo '<option value="">Select Branch</option>';
                                        if ($data && mysqli_num_rows($data) > 0) {
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                echo '<option value="' . $row['Branch_Id'] . '" ' . ($result['Branch_Id']==$row['Branch_Id']?'selected ':'') . ' >' . $row['Address'] . '</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="desg">Designation</label>
                                    <input type="text" name="desg" id="desg" class="form-control" value="<?php echo $result['Designation']; ?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="join">Joining Date</label>
                                    <input type="date" name="start" id="start" class="form-control" value="<?php echo $result['Joining_Date']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="end">Leaving Date</label>
                                    <input type="date" name="end" id="end" class="form-control" value="<?php echo $result['Leaving_Date']; ?>">
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

</body>
<?php
include 'footer.php';

if (isset($_POST['exup'])) {
    $iscrnt = $_POST['iscrnt'];
    $com = $_POST['company'];
    $branch = $_POST['branch'];
    $desg = $_POST['desg'];
    $start = $_POST['start'];
    $end = $_POST['end'] ==""?"NULL": $_POST['end'];
    $experience_id = $_POST["experience_id"];

    $sql = "update Experience_tbl set Is_Current='$iscrnt', Company_Id='$com',Branch_Id='$branch',Designation='$desg', Joining_Date='$start', Leaving_Date=$end where Experience_Id='$experience_id'";
    $data = mysqli_query($con, $sql);
    if ($data) {
        echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
    } else {
        echo "errorrr";
    }
}

?>

</html>