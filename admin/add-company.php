<?php
include("sidebar.php");

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $business_stream = $_POST['business_stream'];
    $establishment_year = $_POST['establishment_year'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $logo = $_FILES['logo']['name'];

    $logo_path_db = ""; // Default value for logo path in case no file is uploaded

    // Handle logo upload
    if (!empty($logo)) {
        $ip = "../images/logos/";
        $ip2 = "images/logos/";

        $unique_file_name = uniqid("", true) . basename($_FILES['logo']['name']);
        $logo_path_server = $ip . $unique_file_name;
        $logo_path_db = $ip2 . $unique_file_name;

        $imageFileType = strtolower(pathinfo($logo_path_server, PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $valid_extensions)) {
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path_server)) {
                echo "<script>alert('Error uploading logo');</script>";
                $logo_path_db = "";
            }
        } else {
            echo "<script>alert('Invalid logo format');</script>";
        }
    }

    // Insert company data
    $insert_query = "
        INSERT INTO company_tbl 
        (Name, Description, Business_Stream, Establishment_Year, Website, Phone, Email, Logo) 
        VALUES 
        ('$name', '$description', '$business_stream', '$establishment_year', '$website', '$phone', '$email', 
        '$logo_path_db')";

    $insert_result = mysqli_query($con, $insert_query);

    if ($insert_result) {
        echo "<script>alert('Company added successfully');location.href='companies.php';</script>";
    } else {
        echo "<script>alert('Error adding company');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="companies.php">Companies List</a></li>
            <li class="breadcrumb-item active">Add Company</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Add New Company</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="business_stream" class="form-label">Business Stream</label>
                        <input type="text" class="form-control" id="business_stream" name="business_stream" required>
                    </div>
                    <div class="mb-3">
                        <label for="establishment_year" class="form-label">Establishment Year</label>
                        <input type="number" class="form-control" id="establishment_year" name="establishment_year" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Company Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Add Company</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
