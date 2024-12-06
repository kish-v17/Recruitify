<?php
// Include the database connection and session handling files
include("../db/db-connect.php");
include("sidebar.php");

// Get counts for dashboard statistics
$company_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS Total FROM company_tbl"))['Total'];
$job_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS Total FROM job_list_tbl"))['Total'];
$applicant_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS Total FROM users_tbl WHERE User_Type='Jobseeker'"))['Total'];
$employers_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS Total FROM users_tbl WHERE User_Type='Employer'"))['Total'];

// Search and Pagination setup
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Number of applications per page
$offset = ($page - 1) * $limit;

// Build the query with search and pagination
$where_clause = $search ? "WHERE j.Title LIKE '%$search%' OR u.Name LIKE '%$search%'" : '';
$query = "
    SELECT a.Application_Id, j.Title AS Job_Title, u.Name AS Applicant_Name, a.Status, a.Application_Date
    FROM application_tbl a
    JOIN job_list_tbl j ON a.Job_Id = j.Job_Id
    JOIN users_tbl u ON a.User_Id = u.User_Id
    $where_clause
    ORDER BY a.Application_Date DESC
    LIMIT $limit OFFSET $offset
";
$recent_applications = mysqli_query($con, $query);

// Count total applications for pagination
$total_query = "
    SELECT COUNT(*) AS Total
    FROM application_tbl a
    JOIN job_list_tbl j ON a.Job_Id = j.Job_Id
    JOIN users_tbl u ON a.User_Id = u.User_Id
    $where_clause
";
$total_result = mysqli_fetch_assoc(mysqli_query($con, $total_query));
$total_applications = $total_result['Total'];
$total_pages = ceil($total_applications / $limit);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
             <!-- Total Companies -->
             <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5>Total Companies</h5>
                        <h3><?= $company_count; ?></h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="companies.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Total Jobs -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5>Total Jobs</h5>
                        <h3><?= $job_count; ?></h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="job-listings.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Total Applicants -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5>Total Applicants</h5>
                        <h3><?= $applicant_count; ?></h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Total Employers -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Total Employers</h5>
                        <h3><?= $employers_count; ?></h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Recent Activities Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i> Recent Job Applications
                </div>
                
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Job Title</th>
                            <th>Applicant Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($recent_applications) > 0) {
                            while ($application = mysqli_fetch_assoc($recent_applications)) {
                                echo "
                                    <tr>
                                        <td>{$application['Application_Id']}</td>
                                        <td>{$application['Job_Title']}</td>
                                        <td>{$application['Applicant_Name']}</td>
                                        <td>{$application['Status']}</td>
                                        <td>" . date("d M Y, h:i A", strtotime($application['Application_Date'])) . "</td>
                                        <td>
                                            <a href='remove-application.php?application_id={$application['Application_Id']}' 
                                               class='btn btn-danger btn-sm' 
                                               onclick=\"return confirm('Are you sure you want to remove this application?');\">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No applications found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <?php include "common/pagination.php" ?>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</div>
