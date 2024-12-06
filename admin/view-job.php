<?php
include("sidebar.php");

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Fetch job details
    $job_query = "
        SELECT 
            jl.*, 
            c.Name AS Company_Name, 
            b.Address AS Branch_Address, 
            u.Name AS Posted_By 
        FROM job_list_tbl jl
        INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
        INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
        INNER JOIN users_tbl u ON jl.Posted_By = u.User_Id
        WHERE jl.Job_Id = '$job_id'";
    $job_result = mysqli_query($con, $job_query);

    if ($job_result && mysqli_num_rows($job_result) > 0) {
        $job = mysqli_fetch_assoc($job_result);
    } else {
        echo "<script>alert('Job not found');location.href='job-listings.php';</script>";
        exit;
    }

    // Pagination and Search Logic
    $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 5; // Records per page
    $offset = ($page - 1) * $limit;

    $search_condition = "";
    if (!empty($search)) {
        $search_condition = "AND (u.Name LIKE '%$search%' OR u.Email LIKE '%$search%' OR u.Mobile LIKE '%$search%')";
    }

    // Count total applicants for pagination
    $count_query = "
        SELECT COUNT(*) AS total 
        FROM application_tbl a
        INNER JOIN users_tbl u ON a.User_Id = u.User_Id
        WHERE a.Job_Id = '$job_id' $search_condition";
    $count_result = mysqli_query($con, $count_query);
    $total_rows = ($count_result && mysqli_num_rows($count_result) > 0) ? mysqli_fetch_assoc($count_result)['total'] : 0;
    $total_pages = ceil($total_rows / $limit);

    // Fetch applicants with pagination and search
    $applicant_query = "
        SELECT 
            a.Application_Id,
            a.Application_Date,
            a.Status,
            u.Name AS Applicant_Name,
            u.Email AS Applicant_Email,
            u.Mobile AS Applicant_Mobile,
            a.User_Id
        FROM application_tbl a
        INNER JOIN users_tbl u ON a.User_Id = u.User_Id
        WHERE a.Job_Id = '$job_id' $search_condition
        LIMIT $limit OFFSET $offset";
    $applicant_result = mysqli_query($con, $applicant_query);
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Job Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="job-listings.php">Job Listings</a></li>
            <li class="breadcrumb-item active">Job Details</li>
        </ol>

        <!-- Job Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h4><?= $job['Title']; ?></h4>
            </div>
            <div class="card-body">
                <p><img src="../<?= $job['Image']; ?>" alt="Job Image" class="img-thumbnail" width="200"></p>
                <p><strong>Company:</strong> <?= $job['Company_Name']; ?></p>
                <p><strong>Branch:</strong> <?= $job['Branch_Address']; ?></p>
                <p><strong>Type:</strong> <?= $job['Type']; ?></p>
                <p><strong>Salary:</strong> <?= $job['Salary']; ?></p>
                <p><strong>Posted By:</strong> <?= $job['Posted_By']; ?></p>
                <p><strong>Posted On:</strong> <?= date("d M Y, h:i A", strtotime($job['Posted_Time'])); ?></p>
                <p><strong>Description:</strong> <?= nl2br($job['Description']); ?></p>
                <p><strong>Requirements:</strong> <?= nl2br($job['Requirements']); ?></p>
                <p><strong>Benefits:</strong> <?= nl2br($job['Benefits']); ?></p>
                <p><strong>Is Internship:</strong> <?= $job['Is_Internship'] ? 'Yes' : 'No'; ?></p>
            </div>
        </div>

        <!-- Applicants -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Applicants</h4>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <form method="GET" class="mb-3">
                    <input type="hidden" name="job_id" value="<?= $job_id; ?>">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search applicants by name, email, or mobile" value="<?= htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <?php if ($applicant_result && mysqli_num_rows($applicant_result) > 0) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Application Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($applicant = mysqli_fetch_assoc($applicant_result)) { ?>
                            <tr>
                                <td><?= $applicant['Applicant_Name']; ?></td>
                                <td><?= $applicant['Applicant_Email']; ?></td>
                                <td><?= $applicant['Applicant_Mobile']; ?></td>
                                <td><?= date("d M Y, h:i A", strtotime($applicant['Application_Date'])); ?></td>
                                <td><?= $applicant['Status'] ?></td>
                                <td>
                                    <a href="view-jobseeker.php?user_id=<?= $applicant['User_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="remove-application.php?application_id=<?= $applicant['Application_Id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <?php include "common/pagination.php"; ?>

                <?php } else { ?>
                    <p class="text-danger">No applicants found.</p>
                <?php } ?>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
