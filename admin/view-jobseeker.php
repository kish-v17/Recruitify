<?php include("sidebar.php"); 

$user_id = $_GET['user_id'];

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jobseeker Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Jobseeker Details</li>
        </ol>

        <!-- Fetching Personal Information -->
        <?php
            $query = "SELECT * FROM users_tbl WHERE User_Id=$user_id";
            $result = mysqli_query($con, $query);
            $user = mysqli_fetch_assoc($result);
        ?>

        <!-- Personal Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Personal Information</h4>
            </div>
            <div class="card-body">
                <img src="../<?php echo $user['Image']; ?>" alt="<?php echo $user['Name']; ?>" style="height:200px;" class="img-fluid" />
                <p><strong>Name:</strong> <?php echo $user['Name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
                <p><strong>DOB:</strong> <?php echo $user['DOB']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['Gender']; ?></p>
                <p><strong>City:</strong> <?php echo $user['City']; ?></p>
                <p><strong>State:</strong> <?php echo $user['State']; ?></p>
                <p><strong>Country:</strong> <?php echo $user['Country']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $user['Mobile']; ?></p>
                <a href="update-jobseeker.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Edit Personal Info</a>
                <a href="delete-user.php?user_id=<?php echo $user['User_Id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>

        <!-- Education Details Section -->
        <?php
            $education_query = "SELECT * FROM education_tbl WHERE User_Id=$user_id";
            $education_result = mysqli_query($con, $education_query);
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <h4>Education Details</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Institute</th>
                            <th>City</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($education = mysqli_fetch_assoc($education_result)) { ?>
                            <tr>
                                <td><?php echo $education['Course']; ?></td>
                                <td><?php echo $education['Institute']; ?></td>
                                <td><?php echo $education['Institute_City']; ?></td>
                                <td><?php echo $education['Start_Date']; ?></td>
                                <td><?php echo $education['End_Date']; ?></td>
                                <td>
                                    <a href="update-education.php?education_id=<?php echo $education['Education_Id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="delete-education.php?education_id=<?php echo $education['Education_Id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="add-education.php?user_id=<?php echo $user_id; ?>" class="btn btn-success">Add Education</a>
            </div>
        </div>

        <!-- Experience Details Section -->
        <?php
            $experience_query = "SELECT c.*, b.*, e.*, c.Name as 'Company_Name', CONCAT(b.City,', ',b.Country) as 'Branch' FROM company_tbl c 
            inner join experience_tbl e on e.Company_Id = c.Company_Id
            inner join branch_tbl b on b.Branch_Id = e.Branch_Id WHERE e.User_Id=$user_id";
            $experience_result = mysqli_query($con, $experience_query);
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <h4>Experience Details</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Branch</th>
                            <th>Designation</th>
                            <th>Joining Date</th>
                            <th>Leaving Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($experience = mysqli_fetch_assoc($experience_result)) { ?>
                            <tr>
                            <td><?php echo $experience['Company_Name']; ?></td>
                            <td><?php echo $experience['Branch']; ?></td>
                                <td><?php echo $experience['Designation']; ?></td>
                                <td><?php echo $experience['Joining_Date']; ?></td>
                                <td><?php echo $experience['Leaving_Date'] ?: 'Present'; ?></td>
                                <td>
                                    <a href="update-experience.php?experience_id=<?php echo $experience['Experience_Id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="delete-experience.php?experience_id=<?php echo $experience['Experience_Id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="add-experience.php?user_id=<?php echo $user_id; ?>" class="btn btn-success">Add Experience</a>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>
