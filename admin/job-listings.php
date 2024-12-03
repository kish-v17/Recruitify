<?php
include("sidebar.php");

// Fetch all job listings
$query = "
    SELECT 
        jl.Job_Id, 
        jl.Title, 
        jl.Posted_Time, 
        jl.Description, 
        jl.Type, 
        jl.Requirements, 
        jl.Benefits, 
        jl.Salary, 
        jl.Image, 
        jl.Is_Internship,
        c.Name AS Company_Name,
        b.Address AS Branch_Address,
        u.Name AS Posted_By
    FROM job_list_tbl jl
    INNER JOIN company_tbl c ON jl.Company_Id = c.Company_Id
    INNER JOIN branch_tbl b ON jl.Branch_Id = b.Branch_Id
    INNER JOIN users_tbl u ON jl.Posted_By = u.User_Id
    ORDER BY jl.Posted_Time DESC";
$result = mysqli_query($con, $query);

?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Job Listings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Job Listings</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Available Jobs</h4>
            </div>
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
                                    <td><?= $job['Title']; ?></td>
                                    <td><?= $job['Company_Name']; ?></td>
                                    <td><?= $job['Branch_Address']; ?></td>
                                    <td><?= $job['Type']; ?></td>
                                    <td><?= $job['Salary']; ?></td>
                                    <td>
                                        <a href="view-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="edit-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete-job.php?job_id=<?= $job['Job_Id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-danger">No job listings available at the moment.</p>
                <?php } ?>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
