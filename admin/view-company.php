<?php 
include("sidebar.php"); 

$company_id = $_GET['company_id'];

?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Company Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Company Details</li>
        </ol>

        <!-- Fetching Company and Branch Information -->
        <?php
        // Query to fetch company details
        $company_query = "SELECT * FROM company_tbl WHERE Company_Id = $company_id";
        $company_result = mysqli_query($con, $company_query);
        $company = mysqli_fetch_assoc($company_result);

        // Query to fetch branch details
        $branches_query = "SELECT * FROM branch_tbl WHERE Company_Id = $company_id";
        $branches_result = mysqli_query($con, $branches_query);
        ?>

        <!-- Company Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Company Information</h4>
            </div>
            <div class="card-body">
                <img src="../<?= $company["Logo"] ?>" alt="" style="height:100px">
                <p><strong>Company Name:</strong> <?php echo $company['Name']; ?></p>
                <p><strong>Email:</strong> <?php echo $company['Email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $company['Phone']; ?></p>
                <p><strong>Business Stream:</strong> <?php echo $company['Business_Stream']; ?></p>
                <p><strong>Established Year:</strong> <?php echo $company['Establishment_Year']; ?></p>
                <p><strong>Website:</strong> <a href="<?php echo $company['Website']; ?>" target="_blank"><?php echo $company['Website']; ?></a></p>
            </div>

        </div>

        <!-- Main Branch Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Main Branch Information</h4>
            </div>
            <div class="card-body">
                <?php 
                $main_branch_id = $company['Main_Branch_Id'];
                $main_branch_query = "SELECT *,CONCAT(Address,', ', City,', ', State,', ', Country) as Address FROM branch_tbl where Company_Id = $company_id " . ($main_branch_id!='' ? "and Branch_Id=$main_branch_id":'');  
                $main_branch_result = mysqli_query($con, $main_branch_query);
                $main_branch = mysqli_fetch_assoc($main_branch_result);
                ?>
                <?php if ($main_branch) { ?>
                    <p><strong>Email:</strong> <?php echo $main_branch['Email']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $main_branch['Phone']; ?></p>
                    <p><strong>Address:</strong> <?php echo $main_branch['Address']; ?></p>
                <?php } else { ?>
                    <p class="text-danger">No main branch found for this company.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Other Branches Information Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Other Branches</h4>
                <a href="add-branch.php?company_id=<?php echo $company_id; ?>" class="btn btn-primary">Add Branch</a>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($branches_result) > 0) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $counter = 1;
                            while ($branch = mysqli_fetch_assoc($branches_result)) {
                                if ($branch['Branch_Id'] == $company["Main_Branch_Id"]) continue;
                            ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $branch['Address']; ?></td>
                                    <td><?php echo $branch['City']; ?></td>
                                    <td><?php echo $branch['State']; ?></td>
                                    <td><?php echo $branch['Country']; ?></td>
                                    <td><?php echo $branch['Email']; ?></td>
                                    <td><?php echo $branch['Phone']; ?></td>
                                    <td>
                                        <a href="update-branch.php?branch_id=<?php echo $branch['Branch_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete-branch.php?branch_id=<?php echo $branch['Branch_Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-center">No other branches found for this company.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-4">
            <a href="update-company.php?company_id=<?php echo $company_id; ?>" class="btn btn-primary">Edit Company Info</a>
            <a href="delete-company.php?company_id=<?php echo $company_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</a>
        </div>
    </div>

<?php include("footer.php"); ?>
