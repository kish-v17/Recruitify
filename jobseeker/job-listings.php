<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recruitify Job Listing</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link href="../css/owl.carousel.min.css" rel="stylesheet">

    <link href="../css/owl.theme.default.min.css" rel="stylesheet">

    <link href="../css/tooplate-Recruitify-job.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />
</head>

<body class="job-listings-page" id="top">

    <?php include "navbar.php" ?>
    <?php
include "../time-ago.php";
// Handle Pagination Variables
$limit = 6; // Number of jobs per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Handle Filter Variables
$filters = [];
if (!empty($_POST['job-title'])) {
    $filters[] = "Job_List_tbl.Title LIKE '%" . mysqli_real_escape_string($con, $_POST['job-title']) . "%'";
}
if (!empty($_POST['job-location'])) {
    $filters[] = "(branch_tbl.City LIKE '%" . mysqli_real_escape_string($con, $_POST['job-location']) . "%' OR branch_tbl.Country LIKE '%" . mysqli_real_escape_string($con, $_POST['job-location']) . "%')";
}
if (!empty($_POST['job-salary'])) {
    switch ($_POST['job-salary']) {
        case '1':
            $filters[] = "Job_List_tbl.Salary < 30000";
            break;
        case '2':
            $filters[] = "Job_List_tbl.Salary BETWEEN 30000 AND 100000";
            break;
        case '3':
            $filters[] = "Job_List_tbl.Salary > 100000";
            break;
    }
}
if (!empty($_POST['job-type'])) {
    $filters[] = "Job_List_tbl.Type = '" . mysqli_real_escape_string($con, $_POST['job-type']) . "'";
}
if (!empty($_POST['job-internship'])) {
    $filters[] = "Job_List_tbl.Is_Internship = 1";
}

// Build WHERE Clause
$whereClause = !empty($filters) ? "WHERE " . implode(" AND ", $filters) : "";

// Get Total Job Count
$totalSql = "SELECT COUNT(*) AS total FROM Job_List_tbl 
             INNER JOIN branch_tbl ON Job_List_tbl.Branch_Id = branch_tbl.Branch_Id 
             $whereClause";
$totalResult = mysqli_query($con, $totalSql);
$totalJobs = mysqli_fetch_assoc($totalResult)['total'];
$totalPages = ceil($totalJobs / $limit);

// Fetch Jobs with Filters and Pagination
$sql = "SELECT Job_List_tbl.*, Company_tbl.Name AS Company_Name, Company_tbl.Logo AS Company_Logo, 
               branch_tbl.City AS Branch_City, branch_tbl.Country AS Branch_Country
        FROM Job_List_tbl
        INNER JOIN Company_tbl ON Job_List_tbl.Company_Id = Company_tbl.Company_Id
        INNER JOIN branch_tbl ON Job_List_tbl.Branch_Id = branch_tbl.Branch_Id
        $whereClause
        LIMIT $limit OFFSET $offset";
$data = mysqli_query($con, $sql);

?>
    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Job Listings</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Job listings</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <section class="section-padding pb-0 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <form class="custom-form hero-form" action="" method="post" role="form">
                            <h3 class="text-white mb-3">Search your dream job</h3>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                        <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" value="<?php echo $_POST['job-title'] ?? ''; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-geo-alt custom-icon"></i></span>

                                        <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Location" value="<?php echo $_POST['job-location'] ?? ''; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-cash custom-icon"></i></span>

                                        <select class="form-select form-control" name="job-salary" id="job-salary">
                                            <option value="">Salary Range</option>
                                            <option value="1" <?php echo ($_POST['job-salary'] ?? '') == '1' ? 'selected' : ''; ?>>less than ₹30,000</option>
                                            <option value="2" <?php echo ($_POST['job-salary'] ?? '') == '2' ? 'selected' : ''; ?>>30,000 - 1,00,000</option>
                                            <option value="3" <?php echo ($_POST['job-salary'] ?? '') == '3' ? 'selected' : ''; ?>>more than ₹1,00,000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>

                                        <select class="form-select form-control" name="job-type" id="job-type">
                                            <option value="">Type</option>
                                            <option value="Full-Time" <?php echo ($_POST['job-type'] ?? '') == 'Full-Time' ? 'selected' : ''; ?>>Full-Time</option>
                                            <option value="Part-Time" <?php echo ($_POST['job-type'] ?? '') == 'Part-Time' ? 'selected' : ''; ?>>Part-Time</option>
                                            <option value="Contract" <?php echo ($_POST['job-type'] ?? '') == 'Contract' ? 'selected' : ''; ?>>Contract</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="job-internship" id="job-internship" value="1" <?php echo isset($_POST['job-internship']) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="job-internship">Internship</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <button type="submit" class="form-control">
                                        Search job
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="job-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <?php
                    if (mysqli_num_rows($data)) {
                        while ($result = mysqli_fetch_array($data)) {
                            $timeago = get_timeago(strtotime($result['Posted_Time']));
                            echo '<div class="col-lg-4 col-md-6 col-12">
                                    <div class="job-thumb job-thumb-box">
                                        <div class="job-image-box-wrap">
                                            <a href="job-details.php?job_id=' . $result['Job_Id'] . '">
                                                <img src="../' . $result['Image'] . '" class="job-image img-fluid" alt="job-image">
                                            </a>
                                        </div>
                                        <div class="job-body">
                                            <h4 class="job-title">
                                                <a href="job-details.php?job_id=' . $result['Job_Id'] . '" class="job-title-link">' . $result['Title'] . '</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="job-image-wrap bg-white shadow-lg mt-2 mb-4">
                                                    <img src="../' . $result['Company_Logo'] . '" class="job-image img-fluid" alt="company-logo">
                                                    <h6>' . $result['Company_Name'] . '</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <p class="job-location">
                                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                                    ' . $result['Branch_City'] . ', ' . $result['Branch_Country'] . '
                                                </p>
                                                <p class="job-date">
                                                    <i class="custom-icon bi-clock me-1"></i>
                                                    ' . $timeago . '
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center border-top pt-3">
                                                <p class="job-price mb-0">
                                                    <i class="custom-icon bi-cash me-1"></i>
                                                    ₹' . $result['Salary'] . '
                                                </p>
                                                <form method="post">
                                                    <input type="hidden" name="job_id" value=' . $result['Job_Id'] . '>
                                                    <button type="submit" name="apply" class="custom-btn btn mt-2">Apply now</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo '<p class="text-center">No jobs found matching your criteria.</p>';
                    }
                    ?>
                </div>

                <div class="row justify-content-center">
                    <nav>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>
<?php  
            if(isset($_POST['apply'])){
                $job_id = $_POST['job_id'];
                $sql3="INSERT INTO application_tbl (User_Id, Job_Id, Application_Date)  values('$_SESSION[user_id]', '$job_id', NOW())";
                $dt=mysqli_query($con,$sql3);
                if($dt)
                {
                    echo "<script> alert('applied Successfully');</script>";
                }
                else{
                    echo "errorrr";
                }    
            }
        ?>