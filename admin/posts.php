<?php include("sidebar.php"); ?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">User's Job Listings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Job Listings</li>
        </ol>

        <?php
        // Fetch user_id from query parameters
        $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

        // Initialize search and pagination variables
        $search_query = "";
        $per_page = 10; // Number of records per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
        $offset = ($page - 1) * $per_page; // Offset for the query

        if ($user_id > 0) {
            // Handle search query
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search_query = mysqli_real_escape_string($con, $_GET['search']);
            }

            // Query to fetch jobs posted by the user with search and pagination
            $query = "
                SELECT 
                    jl.*,
                    c.Name AS Company_Name,
                    CONCAT(b.City, ', ', b.Country) AS Branch_Address
                FROM job_list_tbl jl
                INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
                INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
                WHERE jl.Posted_By = $user_id 
                    AND (jl.Title LIKE '%$search_query%' OR c.Name LIKE '%$search_query%' OR b.City LIKE '%$search_query%')
                ORDER BY jl.Posted_Time DESC
                LIMIT $offset, $per_page";
            $result = mysqli_query($con, $query);

            // Query to count total records for pagination
            $count_query = "
                SELECT COUNT(*) AS total
                FROM job_list_tbl jl
                INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
                INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
                WHERE jl.Posted_By = $user_id 
                    AND (jl.Title LIKE '%$search_query%' OR c.Name LIKE '%$search_query%' OR b.City LIKE '%$search_query%')";
            $count_result = mysqli_query($con, $count_query);
            $total_rows = mysqli_fetch_assoc($count_result)['total'];
            $total_pages = ceil($total_rows / $per_page);
        } else {
            echo "<p class='text-danger'>Invalid user ID.</p>";
            $result = false;
        }
        ?>

        <!-- Search Form -->
        <form method="GET" class="mb-4">
            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search job listings" value="<?= htmlspecialchars($search_query); ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div class="mb-4">
            <div class="card-body">
                <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Branch</th>
                                <th>Type</th>
                                <th>Salary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($job = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= ($job['Title']); ?></td>
                                    <td><?= ($job['Company_Name']); ?></td>
                                    <td><?= ($job['Branch_Address']); ?></td>
                                    <td><?= ($job['Type']); ?></td>
                                    <td><?= ($job['Salary']); ?></td>
                                    <td>
                                        <a href="view-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="edit-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <?php if ($job['Status'] === 'Deleted'): ?>
                                            <a href="activate-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to make this job active again?');">Activate</a>
                                        <?php else: ?>
                                            <a href="delete-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-end">
                            <?php if ($page > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?user_id=<?= $user_id; ?>&search=<?= urlencode($search_query); ?>&page=<?= $page - 1; ?>">Previous</a>
                                </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?user_id=<?= $user_id; ?>&search=<?= urlencode($search_query); ?>&page=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php } ?>
                            <?php if ($page < $total_pages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?user_id=<?= $user_id; ?>&search=<?= urlencode($search_query); ?>&page=<?= $page + 1; ?>">Next</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                <?php } else { ?>
                    <p class="text-center">No job listings found for this user.</p>
                <?php } ?>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
