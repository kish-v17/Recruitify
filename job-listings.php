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
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-Recruitify-job.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    </head>

    <body class="job-listings-page" id="top">

    <?php include "navbar.php"; ?>

        <ma>
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

            <section class="section-padding pb-0 d-flex justify-content-center align-items-center mb-5">
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
                                            <!-- <span class="input-group-text" id="basic-addon1"><i class="bi-check-square custom-icon"></i></span> -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="job-internship" id="job-internship" value="1" <?php echo isset($_POST['job-internship']) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="job-internship">Internship</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">Search job</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="job-section">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-6 col-12 mb-lg-4">
                            <h2>Ready for Hiring You</h2>
                        </div>
                        <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                        </div>
                        <!-- <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                            <p class="mb-0 ms-lg-auto">Sort by:</p>

                            <div class="dropdown dropdown-sorting ms-3 me-4">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Newest Jobs
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownSortingButton">
                                    <li><a class="dropdown-item" href="#">Lastest Jobs</a></li>

                                    <li><a class="dropdown-item" href="#">Highed Salary Jobs</a></li>

                                    <li><a class="dropdown-item" href="#">Internship Jobs</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <?php
                        include "time-ago.php";
// Define the number of results per page
$results_per_page = 6;

// Determine the current page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;

// Calculate the starting limit for the SQL query
$start_limit = ($current_page - 1) * $results_per_page;

// Build the WHERE clause for filtering
$where = [];
if (!empty($_POST['job-title'])) {
    $where[] = "Job_List_tbl.Title LIKE '%" . mysqli_real_escape_string($con, $_POST['job-title']) . "%'";
}
if (!empty($_POST['job-location'])) {
    $location = mysqli_real_escape_string($con, $_POST['job-location']);
    $where[] = "(branch_tbl.City LIKE '%$location%' OR branch_tbl.Country LIKE '%$location%')";
}
if (!empty($_POST['job-salary'])) {
    if ($_POST['job-salary'] == '1') {
        $where[] = "Job_List_tbl.Salary < 30000";
    } elseif ($_POST['job-salary'] == '2') {
        $where[] = "Job_List_tbl.Salary BETWEEN 30000 AND 100000";
    } elseif ($_POST['job-salary'] == '3') {
        $where[] = "Job_List_tbl.Salary > 100000";
    }
}
if (!empty($_POST['job-type'])) {
    $where[] = "Job_List_tbl.Type = '" . mysqli_real_escape_string($con, $_POST['job-type']) . "'";
}
if (!empty($_POST['job-internship'])) {
    $where[] = "Job_List_tbl.Is_Internship = 1";
}

$whereSQL = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

// Get the total number of results
$count_sql = "SELECT COUNT(*) AS total FROM Job_List_tbl 
              INNER JOIN Company_tbl ON Job_List_tbl.Company_Id = Company_tbl.Company_Id 
              INNER JOIN branch_tbl ON Job_List_tbl.Branch_Id = branch_tbl.Branch_Id 
              $whereSQL";
$count_result = mysqli_query($con, $count_sql);
$total_results = mysqli_fetch_assoc($count_result)['total'];

// Calculate the total number of pages
$total_pages = ceil($total_results / $results_per_page);

// Fetch the results for the current page
$sql = "SELECT Job_List_tbl.*, Company_tbl.Name AS Company_Name, Company_tbl.Logo AS Company_Logo, 
               branch_tbl.City AS Branch_City, branch_tbl.Country AS Branch_Country
        FROM Job_List_tbl
        INNER JOIN Company_tbl ON Job_List_tbl.Company_Id = Company_tbl.Company_Id
        INNER JOIN branch_tbl ON Job_List_tbl.Branch_Id = branch_tbl.Branch_Id
        $whereSQL
        LIMIT $start_limit, $results_per_page";

$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data)) {
    while ($result = mysqli_fetch_array($data)) {
        $timeago = get_timeago(strtotime($result['Posted_Time']));
        echo '<div class="col-lg-4 col-md-6 col-12">
                <div class="job-thumb job-thumb-box">
                    <div class="job-image-box-wrap">
                        <a href="job-details.php?job_id=' . $result['Job_Id'] . '">
                            <img src="' . $result['Image'] . '" class="job-image img-fluid" style="object-fit: contain" alt="job-title-img">
                        </a>
                    </div>

                    <div class="job-body">
                        <h4 class="job-title">
                            <a href="job-details.php?job_id=' . $result['Job_Id'] . '" class="job-title-link">' . $result['Title'] . '</a>
                        </h4>
                        <div class="d-flex align-items-center">
                            <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                <img src="' . $result['Company_Logo'] . '" class="job-image me-3 img-fluid" alt="">
                                <h6 class="mb-0">' . $result['Company_Name'] . '</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="job-location" style="width:50%">
                                <i class="custom-icon bi-geo-alt me-1"></i>
                                ' . $result['Branch_City'] . ', ' . $result['Branch_Country'] . '
                            </p>
                            <p class="job-date" style="width:50%">
                                <i class="custom-icon bi-clock me-1"></i>
                                ' . $timeago . '
                            </p>
                        </div>
                        <div class="d-flex align-items-center border-top pt-3">
                            <p class="job-price mb-0">
                                <i class="custom-icon bi-cash me-1"></i>&nbsp;
                                &#8377;' . $result['Salary'] . '
                            </p>
                            <a href="login.php" class="custom-btn btn ms-auto">Apply now</a>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<p class="text-center">No jobs found matching your criteria.</p>';
}

// Display pagination
if ($total_pages > 1) {
    echo '<nav class="d-flex justify-content-center mt-4">
            <ul class="pagination">';

    // Previous button
    if ($current_page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    }

    // Page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $current_page) ? 'active' : '';
        echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    // Next button
    if ($current_page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
    }

    echo '</ul>
        </nav>';
}
?>

                    </div>
                </div>
            </section>
        </main>
        <?php include "footer.php";?>
    </body>
</html>