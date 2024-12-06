<?php include("sidebar.php");

// Search and Pagination Setup
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE c.Name LIKE '%$search%' OR c.Email LIKE '%$search%' OR c.Phone LIKE '%$search%'";
}

// Fetch Total Records for Pagination
$query = "SELECT COUNT(*) AS total FROM company_tbl c LEFT JOIN branch_tbl b ON b.branch_id = c.main_branch_id $search_query";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$records_per_page = 10;
$total_pages = ceil($total_records / $records_per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;
$start_from = ($page - 1) * $records_per_page;

// Fetch Companies with Pagination
$query = "
    SELECT c.*, CONCAT(b.Address, ', ', b.city, ', ', b.state, ', ', b.country) as Address 
    FROM company_tbl c 
    LEFT JOIN branch_tbl b ON b.branch_id = c.main_branch_id
    $search_query 
    LIMIT $start_from, $records_per_page
";
$result = mysqli_query($con, $query);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">

        <div class="w-100 mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mt-4">Companies</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                </ol>
            </div>
            <a href="add-company.php" class="btn btn-primary">Add New Company</a>
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
                            <th>Main Branch Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter = $start_from + 1;
                        while ($company = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><img src="../<?= $company['Logo']; ?>" alt="" style="height:75px"></td>
                                <td><?= $company['Name']; ?></td>
                                <td><?= $company['Email']; ?></td>
                                <td><?= $company['Phone']; ?></td>
                                <td><?= $company['Address']; ?></td>
                                <td>
                                    <a href="view-company.php?company_id=<?= $company['Company_Id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="update-company.php?company_id=<?= $company['Company_Id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <?php include "common/pagination.php"; ?>


            <?php } else { ?>
                <p class="text-center">No companies found. <a href="add-company.php">Add a new company</a>.</p>
            <?php } ?>
        </div>
    </div>

<?php include("footer.php"); ?>
