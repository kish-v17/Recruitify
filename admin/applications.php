<?php
include("sidebar.php");

$search_query = ""; // To hold the search query
$per_page = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $per_page; // Offset for the query

// Check for search
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['search']);
}

// Build query with search and pagination
$query = "
    SELECT 
        a.Application_Id,
        a.Job_Id,
        a.User_Id,
        a.Status AS Application_Status,
        jl.Title AS Job_Title,
        c.Name AS Company_Name,
        CONCAT(b.City, ', ', b.Country) AS Branch_Address,
        u.Name AS Applicant_Name
    FROM application_tbl a
    INNER JOIN job_list_tbl jl ON a.Job_Id = jl.Job_Id
    INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
    INNER JOIN users_tbl u ON a.User_Id = u.User_Id
    WHERE 
        u.Name LIKE '%$search_query%' OR 
        jl.Title LIKE '%$search_query%' OR 
        c.Name LIKE '%$search_query%' OR 
        b.City LIKE '%$search_query%'
    ORDER BY a.Application_Id DESC
    LIMIT $offset, $per_page";
$result = mysqli_query($con, $query);

// Count total records for pagination
$count_query = "
    SELECT COUNT(*) AS total
    FROM application_tbl a
    INNER JOIN job_list_tbl jl ON a.Job_Id = jl.Job_Id
    INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
    INNER JOIN users_tbl u ON a.User_Id = u.User_Id
    WHERE 
        u.Name LIKE '%$search_query%' OR 
        jl.Title LIKE '%$search_query%' OR 
        c.Name LIKE '%$search_query%' OR 
        b.City LIKE '%$search_query%'";
$count_result = mysqli_query($con, $count_query);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $per_page);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Job Applications</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Applications</li>
        </ol>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search applications" value="<?= htmlspecialchars($search_query); ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div class="card-body">
            <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Applicant Name</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Branch</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($application = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $application['Application_Id']; ?></td>
                                <td><?= $application['Applicant_Name']; ?></td>
                                <td><?= $application['Job_Title']; ?></td>
                                <td><?= $application['Company_Name']; ?></td>
                                <td><?= $application['Branch_Address']; ?></td>
                                <td><?= $application['Application_Status']; ?></td>
                                <td>
                                    <a href="remove-application.php?application_id=<?= $application['Application_Id']; ?>" 
                                       class="btn btn-danger btn-sm">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="?search=<?= urlencode($search_query); ?>&page=<?= $page - 1; ?>">Previous</a>
                            </li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?search=<?= urlencode($search_query); ?>&page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php } ?>
                        <?php if ($page < $total_pages) { ?>
                            <li class="page-item">
                                <a class="page-link" href="?search=<?= urlencode($search_query); ?>&page=<?= $page + 1; ?>">Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } else { ?>
                <p class="text-danger">No applications found at the moment.</p>
            <?php } ?>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
