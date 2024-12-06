<?php
include("sidebar.php");

// Pagination and search setup
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1; // Ensure page is at least 1
$limit = 10; // Number of records per page
$offset = ($page - 1) * $limit;

// Base query with search filter
$whereClause = !empty($search) ? "WHERE jl.Title LIKE '%$search%' OR c.Name LIKE '%$search%' OR b.City LIKE '%$search%'" : '';
$query = "
    SELECT 
        jl.*, 
        c.Name AS Company_Name, 
        CONCAT(b.City, ', ', b.Country) AS Branch_Address, 
        u.Name AS Posted_By
    FROM job_list_tbl jl
    INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
    INNER JOIN users_tbl u ON jl.Posted_By = u.User_Id
    $whereClause
    ORDER BY jl.Posted_Time DESC
    LIMIT $limit OFFSET $offset
";

$result = mysqli_query($con, $query);
if (!$result) {
    die("Error executing query: " . mysqli_error($con)); // Handle query failure
}

// Total records for pagination
$totalQuery = "
    SELECT COUNT(*) AS Total 
    FROM job_list_tbl jl
    INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
    $whereClause
";
$totalResult = mysqli_query($con, $totalQuery);
if (!$totalResult) {
    die("Error executing total query: " . mysqli_error($con));
}
$totalRecords = mysqli_fetch_assoc($totalResult)['Total'];
$total_pages = ceil($totalRecords / $limit);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Job Listings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Job Listings</li>
        </ol>

        <!-- Job Listings Table -->
            <div class="card-body">
                <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Branch</th>
                                <th>Type</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($job = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($job['Title']); ?></td>
                                    <td><?= htmlspecialchars($job['Company_Name']); ?></td>
                                    <td><?= htmlspecialchars($job['Branch_Address']); ?></td>
                                    <td><?= htmlspecialchars($job['Type']); ?></td>
                                    <td><?= htmlspecialchars($job['Salary']); ?></td>
                                    <td>
                                        <a href="view-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="edit-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <?php if ($job['Status'] === 'Deleted') { ?>
                                            <a href="activate-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to make this job active again?');">Activate</a>
                                        <?php } else { ?>
                                            <a href="delete-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <?php include "common/pagination.php"; ?>
                <?php } else { ?>
                    <p class="text-danger">No job listings available at the moment.</p>
                <?php } ?>
            </div>
    </div>

<?php include("footer.php"); ?>
</div>
