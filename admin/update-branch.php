<?php
include("sidebar.php");

if (isset($_GET['branch_id'])) {
    $branch_id = $_GET['branch_id'];
    $query = "SELECT * FROM branch_tbl WHERE Branch_Id = '$branch_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $branch = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Branch not found');history.back();</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company_id = $_POST['company_id'];

    $update_query = "
        UPDATE branch_tbl 
        SET Address = '$address', City = '$city', State = '$state', Country = '$country', Phone = '$phone', Email = '$email' 
        WHERE Branch_Id = '$branch_id'
    ";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Branch updated successfully');location.href='view-company.php?company_id=$company_id';</script>";
    } else {
        echo "<script>alert('Error updating branch');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Branch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="branch-list.php">Branch List</a></li>
            <li class="breadcrumb-item active">Update Branch</li>
        </ol>

        <!-- Branch Update Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Branch Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="company_id" value="<?= $branch['Company_Id'] ?>">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $branch['Address']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= $branch['City']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?= $branch['State']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?= $branch['Country']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $branch['Phone']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $branch['Email']; ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Branch</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
