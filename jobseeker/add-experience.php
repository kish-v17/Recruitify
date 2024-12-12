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
                        <h1 class="text-white">Add Experience</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Add Experience</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>


            <section class="contact-section section-padding">
                <div class="container">
                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form" enctype="multipart/form-data" id="exp" method="post" role="form">
                            <h2 class="text-center mb-4">Experience Details</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="company">Company</label>
                                    <select name="company" id="company" class="form-control" required>
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
                                    <select name="branch" id="branch" class="form-control" required>
                                        <option value="">Select Branch</option>
                                    </select>
                                    <p class="d-flex justify-content-center">
                                        Can't find your branch? 
                                        <a href="add-branch.php" class="ms-2">Add Branch</a>
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="crntJob">Is this your current job?</label>
                                    <center>
                                        <div class="form-control">
                                            <label><input type="radio" name="iscrnt" id="crnt" value="1" > YES &emsp;</label>
                                            &emsp;<label><input type="radio" name="iscrnt" id="crnt" value="0" checked> NO </label>
                                        </div>
                                    </center>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="desg">Designation</label>
                                    <input required type="text" name="desg" id="desg" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="join">Joining Date</label>
                                    <input required type="date" name="start" id="start" class="form-control" >
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="end">Leaving Date</label>
                                    <input type="date" name="end" id="end" class="form-control">
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="exup">Add Experience</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        function toggleNewCompanyInput() {
    const companySelect = document.getElementById('company');
    const newCompanyInput = document.getElementById('new-company');
    
    if (companySelect.value === "") {
        newCompanyInput.style.display = "block";
    } else {
        newCompanyInput.style.display = "none";
    }
}

function toggleNewBranchInput() {
    const branchSelect = document.getElementById('branch');
    const newBranchInput = document.getElementById('new-branch');
    
    if (branchSelect.value === "") {
        newBranchInput.style.display = "block";
    } else {
        newBranchInput.style.display = "none";
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

</body>
<?php
include 'footer.php';

if (isset($_POST['exup'])) {
    $iscrnt = $_POST['iscrnt'];
    $com = $_POST['company'];
    $branch = $_POST['branch'];
    $desg = $_POST['desg'];
    $start = $_POST['start'];
    $end = $_POST['end'] ==""?"NULL": "'". $_POST['end'] ."'";
    $user_id = $_SESSION["user_id"];
    
    $sql = "INSERT INTO experience_tbl (User_Id, Is_Current, Company_Id, Branch_Id, Designation, Joining_Date, Leaving_Date) 
            VALUES ('$user_id', '$iscrnt', '$com', '$branch', '$desg', '$start', $end)";
    
    $data = mysqli_query($con, $sql);
    
    if ($data) {
        echo "<script> alert('Information Inserted Successfully'); location.replace('profile.php');</script>";
    } else {
        echo "<script> alert('Error Inserting Data'); location.replace('profile.php');</script>";
    } 
}

?>

</html>