<?php 
include("sidebar.php"); 

$user_id = $_GET['user_id'];

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employer Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Employer Details</li>
        </ol>

        <!-- Fetching Employer Information -->
        <?php
            $query = "
                SELECT 
                    u.*,
                    c.Name AS CompanyName,
                    CONCAT(b.Address, ', ', b.City, ', ', b.State, ', ',b.Country) AS Address
                FROM 
                    users_tbl u
                LEFT JOIN company_tbl c ON u.Company_Id = c.Company_Id
                LEFT JOIN branch_tbl b ON u.Branch_Id = b.Branch_Id
                WHERE 
                    u.User_Id = $user_id AND u.User_Type = 'Employer'";
            $result = mysqli_query($con, $query);
            $employer = mysqli_fetch_assoc($result);
        ?>

        <!-- Employer Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Personal Information</h4>
            </div>
            <div class="card-body">
                <img src="../<?php echo $employer['Image']; ?>" alt="<?php echo $employer['Name']; ?>" style="height:200px;" class="img-fluid" />
                <p><strong>Name:</strong> <?php echo $employer['Name']; ?></p>
                <p><strong>Email:</strong> <?php echo $employer['Email']; ?></p>
                <p><strong>DOB:</strong> <?php echo $employer['DOB']; ?></p>
                <p><strong>Gender:</strong> <?php echo $employer['Gender']; ?></p>
                <p><strong>City:</strong> <?php echo $employer['City']; ?></p>
                <p><strong>State:</strong> <?php echo $employer['State']; ?></p>
                <p><strong>Country:</strong> <?php echo $employer['Country']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $employer['Mobile']; ?></p>
            </div>
        </div>

        <!-- Company and Branch Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Company & Branch Information</h4>
            </div>
            <div class="card-body">
                <p><strong>Company Name:</strong> <?php echo $employer['CompanyName']; ?></p>
                <p><strong>Branch Name:</strong> <?php echo $employer['Address']; ?></p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-4">
            <a href="update-employer.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary">Edit Employer Info</a>
            <a href="delete-user.php?user_id=<?php echo $employer['User_Id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employer?');">Delete</a>
        </div>
    </div>

<?php include("footer.php"); ?>
