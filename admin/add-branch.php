<?php
include("sidebar.php");

if (isset($_POST['submit'])) {
    $company_id = $_POST['company_id'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "
        INSERT INTO branch_tbl (Company_Id, Address, City, State, Country, Phone, Email) 
        VALUES ('$company_id', '$address', '$city', '$state', '$country', '$phone', '$email')
    ";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Branch added successfully');location.href='view-company.php?company_id=$company_id';</script>";
    } else {
        echo "<script>alert('Error adding branch');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Branch</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Branch</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Branch Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="company_id" value="<?= $_GET['company_id']; ?>">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea type="text" class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="India" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Branch</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
