<?php include("sidebar.php"); ?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Companies</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Companies</li>
        </ol>

        <!-- Fetch Companies -->
        <?php
        $query = "SELECT c.*, CONCAT(b.Address, ', ', b.city, ', ', b.state, ', ', b.country) as Address FROM company_tbl c left join branch_tbl b on b.branch_id = c.main_branch_id";
        $result = mysqli_query($con, $query);
        ?>

        <!-- Display Companies -->

            <div class="w-100 mb-4 d-flex justify-content-between">
                <h4>Companies List</h4>
                <a href="add-company.php" class="btn btn-primary float-end">Add New Company</a>
            </div>
            <div class="card-body">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <table class="table border text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Company Logo</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Main branch Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $counter = 1;
                            while ($company = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><img src="../<?= $company["Logo"]?>" alt="" style="height:75px"></td>
                                    <td><?php echo $company['Name']; ?></td>
                                    <td><?php echo $company['Email']; ?></td>
                                    <td><?php echo $company['Phone']; ?></td>
                                    <td><?php echo $company['Address']; ?></td>
                                    <td>
                                        <a href="view-company.php?company_id=<?php echo $company['Company_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="update-company.php?company_id=<?php echo $company['Company_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete-company.php?company_id=<?php echo $company['Company_Id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?');">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="text-center">No companies found. <a href="add-company.php">Add a new company</a>.</p>
                <?php } ?>
            </div>
    </div>

<?php include("footer.php"); ?>
