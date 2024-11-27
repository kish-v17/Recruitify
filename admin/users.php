<?php include("sidebar.php");

$query = "SELECT User_Id, Image, CONCAT(Name) AS Full_Name, Email, Mobile, User_Type, Company_Id, Branch_Id FROM users_tbl WHERE User_Type IN ('Jobseeker', 'Employer')"; 
$result = mysqli_query($con, $query);

// // Fetch company and branch details
// $companyQuery = "SELECT Company_Id, Company_Name FROM company_tbl";
// $companyResult = mysqli_query($con, $companyQuery);

// $branchQuery = "SELECT Branch_Id, Branch_Name FROM branch_tbl";
// $branchResult = mysqli_query($con, $branchQuery);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4 w-100">
                <div>
                    <h1>User Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>

            <div class="card-body">
                <!-- Tabs for Jobseekers and Employers -->
                <ul class="nav nav-tabs" id="userTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="jobseeker-tab" data-bs-toggle="tab" href="#jobseekers" role="tab" aria-controls="jobseekers" aria-selected="true">Jobseekers</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="employer-tab" data-bs-toggle="tab" href="#employers" role="tab" aria-controls="employers" aria-selected="false">Employers</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4" id="userTabsContent">
                    <!-- Jobseekers Tab -->
                    <div class="tab-pane fade show active" id="jobseekers" role="tabpanel" aria-labelledby="jobseeker-tab">
                        <div class="d-flex justify-content-between align-items-center mb-2 w-100 ">
                            <h3>Jobseekers</h3>
                            <a class="btn btn-primary ms-auto" href="add-jobseeker.php">Add Jobseeker</a>
                        </div>
                        <?php
                        $jobseekerQuery = "SELECT User_Id, Image, CONCAT(Name) AS Full_Name, Email, Mobile, User_Type FROM users_tbl WHERE User_Type = 'Jobseeker'";
                        $jobseekerResult = mysqli_query($con, $jobseekerQuery);
                        if(mysqli_num_rows($jobseekerResult)) {
                        ?>
                        <table class="table border text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>User Image</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                while($user = mysqli_fetch_assoc($jobseekerResult)) {
                            ?>
                                <tr>
                                    <td>
                                        <img src="../<?= $user['Image']; ?>" alt="<?php echo $user['Full_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td><?=  $user['Full_Name']; ?></td>
                                    <td><?=  $user['Email']; ?></td>
                                    <td><?=  $user['Mobile']; ?></td>
                                    <td>
                                        <a href="view-jobseeker.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="update-jobseeker.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="applications.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-secondary btn-sm">View Applications</a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            ?>
                            </tbody>
                        </table>
                        <?php
                            } else {
                                echo "There are no Jobseekers to display!";
                            }
                        ?> 
                    </div>

                    <!-- Employers Tab -->
                    <div class="tab-pane fade" id="employers" role="tabpanel" aria-labelledby="employer-tab">
                        <div class="d-flex justify-content-between align-items-center mb-2 w-100 ">
                            <h3>Employers</h3>
                            <a class="btn btn-primary ms-auto" href="add-employer.php">Add Employer</a>
                        </div>
                        <?php
                        // Query for employers
                        $employerQuery = "SELECT User_Id, Image, CONCAT(Name) AS Full_Name, Email, Mobile, User_Type, Company_Id, Branch_Id FROM users_tbl WHERE User_Type = 'Employer'";
                        $employerResult = mysqli_query($con, $employerQuery);
                        if(mysqli_num_rows($employerResult)) {
                        ?>
                        <table class="table border text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>User Image</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Branch</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                while($user = mysqli_fetch_assoc($employerResult)) {
                                    $companyName = '';
                                    $branchName = '';

                                    if($user['Company_Id']) {
                                        $companyRow = mysqli_fetch_assoc(mysqli_query($con, "SELECT Name FROM company_tbl WHERE Company_Id = ".$user['Company_Id']));
                                        $companyName = $companyRow['Name'];
                                    }

                                    if($user['Branch_Id']) {
                                        $branchRow = mysqli_fetch_assoc(mysqli_query($con, "SELECT CONCAT(City,', ',Country) as Address FROM branch_tbl WHERE Branch_Id = ".$user['Branch_Id']));
                                        $branchAddress = $branchRow['Address'];
                                    }
                            ?>
                                <tr>
                                    <td>
                                        <img src="../<?php echo $user['Image']; ?>" alt="<?php echo $user['Full_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td><?php echo $user['Full_Name']; ?></td>
                                    <td><?php echo $user['Email']; ?></td>
                                    <td><?php echo $companyName; ?></td>
                                    <td><?php echo $branchAddress; ?></td>
                                    <td>
                                        <a href="view-employer.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="delete-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="update-employer.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="posts.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-secondary btn-sm">View Posts</a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            ?>
                            </tbody>
                        </table>
                        <?php
                            } else {
                                echo "There are no Employers to display!";
                            }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include("footer.php"); ?>
