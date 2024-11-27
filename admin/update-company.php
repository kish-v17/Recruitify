<?php
include("sidebar.php");

if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];
    $query = "SELECT * FROM company_tbl WHERE Company_Id = '$company_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $company = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Company not found');location.href='companies.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $business_stream = $_POST['business_stream'];
    $establishment_year = $_POST['establishment_year'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $main_branch_id = $_POST['main_branch_id'];
    $logo = $_FILES['logo']['name'];

    if (!empty($logo)) { 
        $ip = "../images/logos/";
        $ip2 = "images/logos/";
        
        $unique_file_name = uniqid("", true) . basename($_FILES['logo']['name']);
        $logo_path_server = $ip . $unique_file_name;
        $logo_path_db = $ip2 . $unique_file_name;
    
        $imageFileType = strtolower(pathinfo($logo_path_server, PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    
        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path_server)) {
                if (!empty($company['Logo'])) {
                    unlink($ip . $company['Logo']);
                }
                $logo = $logo_path_db; 
            } else {
                echo "<script>alert('Error uploading logo');</script>";
            }
        } else {
            echo "<script>alert('Invalid logo format');</script>";
        }
    } else {
        $logo = $company['Logo']; 
    }
    

    $update_query = "
        UPDATE company_tbl 
        SET 
            Name = '$name',
            Description = '$description',
            Business_Stream = '$business_stream',
            Establishment_Year = '$establishment_year',
            Website = '$website',
            Phone = '$phone',
            Email = '$email',
            Main_Branch_Id = '$main_branch_id',
            Logo = '$logo'
        WHERE 
            Company_Id = '$company_id'";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Company updated successfully');location.href='view-company.php?company_id=$company_id';</script>";
    } else {
        echo "<script>alert('Error updating company');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="companies.php">Companies List</a></li>
            <li class="breadcrumb-item active">Update Company</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Edit Company Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $company['Name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required><?= $company['Description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="business_stream" class="form-label">Business Stream</label>
                        <input type="text" class="form-control" id="business_stream" name="business_stream" value="<?= $company['Business_Stream']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="establishment_year" class="form-label">Establishment Year</label>
                        <input type="number" class="form-control" id="establishment_year" name="establishment_year" value="<?= $company['Establishment_Year']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?= $company['Website']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $company['Phone']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $company['Email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="main_branch_id" class="form-label">Main Branch</label>
                        <select class="form-select" id="main_branch_id" name="main_branch_id">
                            <option value="">Select Main Branch</option>
                            <?php
                            $branch_query = "
                                SELECT Branch_Id, CONCAT(Address, ', ', City, ', ', State, ', ', Country) AS BranchDetails
                                FROM branch_tbl
                                WHERE Company_Id = '$company_id'";
                            $branch_result = mysqli_query($con, $branch_query);

                            if ($branch_result && mysqli_num_rows($branch_result) > 0) {
                                while ($branch = mysqli_fetch_assoc($branch_result)) {
                                    $selected = ($branch['Branch_Id'] == $company['Main_Branch_Id']) ? 'selected' : '';
                                    echo "<option value='{$branch['Branch_Id']}' $selected>{$branch['BranchDetails']}</option>";
                                }
                            } else {
                                echo "<option value=''>No branches found</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Company Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        <img src="../<?= $company['Logo']; ?>" alt="Company Logo" class="img-thumbnail mt-2" width="100">
                        <input type="hidden" name="old-logo" value="<?= $company['Logo'] ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Company</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
