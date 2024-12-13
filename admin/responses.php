<?php include("sidebar.php");

// Search and Pagination Setup
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE Name LIKE '%$search%' OR Email LIKE '%$search%' OR Message LIKE '%$search%'";
}

// Fetch Total Records for Pagination
$query = "SELECT COUNT(*) AS total FROM responses_tbl $search_query";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$records_per_page = 10;
$total_pages = ceil($total_records / $records_per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;
$start_from = ($page - 1) * $records_per_page;

// Fetch Responses with Pagination
$query = "SELECT * FROM responses_tbl $search_query LIMIT $start_from, $records_per_page";
$result = mysqli_query($con, $query);
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">

        <div class="w-100 mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mt-4">Responses</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Responses</li>
                </ol>
            </div>
        </div>

        <div class="card-body">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter = $start_from + 1;
                        while ($response = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><?= htmlspecialchars($response['Name']); ?></td>
                                <td><?= htmlspecialchars($response['Email']); ?></td>
                                <td><?= htmlspecialchars($response['Message']); ?></td>
                                <td>
                                    <a href="delete-response.php?response_id=<?= $response['Response_Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>&search=<?= urlencode($search); ?>"><?= $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>

            <?php } else { ?>
                <p class="text-center">No responses found.</p>
            <?php } ?>
        </div>
    </div>

<?php include("footer.php"); ?>