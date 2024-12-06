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

        <!-- Fetching Company Information -->
        <?php
        // Fetch company details
        $company_query = "SELECT * FROM company_tbl WHERE Company_Id = $company_id";
        $company_result = mysqli_query($con, $company_query);
        $company = mysqli_fetch_assoc($company_result);
        ?>

        <!-- Company Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Company Information</h4>
            </div>
            <div class="card-body">
                <img src="../<?= $company["Logo"] ?>" alt="" style="height:100px">
                <p><strong>Company Name:</strong> <?= $company['Name']; ?></p>
                <p><strong>Email:</strong> <?= $company['Email']; ?></p>
                <p><strong>Phone:</strong> <?= $company['Phone']; ?></p>
                <p><strong>Business Stream:</strong> <?= $company['Business_Stream']; ?></p>
                <p><strong>Established Year:</strong> <?= $company['Establishment_Year']; ?></p>
                <p><strong>Website:</strong> <a href="<?= $company['Website']; ?>" target="_blank"><?= $company['Website']; ?></a></p>
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
                $main_branch_query = "SELECT *, CONCAT(Address, ', ', City, ', ', State, ', ', Country) as Address FROM branch_tbl WHERE Company_Id = $company_id " . ($main_branch_id ? "AND Branch_Id = $main_branch_id" : "");  
                $main_branch_result = mysqli_query($con, $main_branch_query);
                $main_branch = mysqli_fetch_assoc($main_branch_result);
                ?>
                <?php if ($main_branch) { ?>
                    <p><strong>Email:</strong> <?= $main_branch['Email']; ?></p>
                    <p><strong>Phone:</strong> <?= $main_branch['Phone']; ?></p>
                    <p><strong>Address:</strong> <?= $main_branch['Address']; ?></p>
                <?php } else { ?>
                    <p class="text-danger">No main branch found for this company.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Other Branches with Pagination and Search -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Other Branches</h4>
                <a href="add-branch.php?company_id=<?= $company_id; ?>" class="btn btn-primary">Add Branch</a>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <form method="GET" action="" class="mb-3">
                    <input type="hidden" name="company_id" value="<?= $company_id; ?>">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search branches..." value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>

                <?php 
                // Pagination and Search Setup
                $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
                $search_condition = $search ? "AND (City LIKE '%$search%' OR State LIKE '%$search%' OR Country LIKE '%$search%' OR Email LIKE '%$search%' OR Phone LIKE '%$search%')" : '';

                $query = "SELECT COUNT(*) AS total FROM branch_tbl WHERE Company_Id = $company_id $search_condition";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];

                $records_per_page = 5;
                $total_pages = ceil($total_records / $records_per_page);

                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                if ($page < 1) $page = 1;
                if ($page > $total_pages) $page = $total_pages;
                $start_from = ($page - 1) * $records_per_page;

                // Fetch Paginated and Searched Branches
                $branches_query = "SELECT * FROM branch_tbl WHERE Company_Id = $company_id $search_condition LIMIT $start_from, $records_per_page";
                $branches_result = mysqli_query($con, $branches_query);

                if (mysqli_num_rows($branches_result) > 0) { ?>
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
                            $counter = $start_from + 1;
                            while ($branch = mysqli_fetch_assoc($branches_result)) { 
                                if ($branch['Branch_Id'] == $company["Main_Branch_Id"]) continue;
                            ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                    <td><?= $branch['Address']; ?></td>
                                    <td><?= $branch['City']; ?></td>
                                    <td><?= $branch['State']; ?></td>
                                    <td><?= $branch['Country']; ?></td>
                                    <td><?= $branch['Email']; ?></td>
                                    <td><?= $branch['Phone']; ?></td>
                                    <td>
                                        <a href="update-branch.php?branch_id=<?= $branch['Branch_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <?php include "common/pagination.php"; ?>
                <?php } else { ?>
                    <p class="text-center">No branches found matching your search.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-4">
            <a href="update-company.php?company_id=<?= $company_id; ?>" class="btn btn-primary">Edit Company Info</a>
        </div>
    </div>
<?php include("footer.php"); ?>