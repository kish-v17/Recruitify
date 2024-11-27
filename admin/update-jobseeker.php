<?php
include("sidebar.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "SELECT * FROM users_tbl WHERE User_Id = '$user_id' AND User_Type = 'Jobseeker'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Jobseeker not found');location.href='jobseeker-list.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $target_dir = "images/user-img/user-profile/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                if (!empty($user['Image']) && $user['Image']!='default.png') {
                    unlink($target_dir . $user['Image']);
                }
            } else {
                echo "<script>alert('Error uploading image');</script>";
            }
        } else {
            echo "<script>alert('Invalid image format');</script>";
        }
    } else {
        $image = $user['Image']; 
    }

    $update_query = "UPDATE users_tbl SET Name = '$name', Email = '$email', DOB = '$dob', Gender = '$gender', City = '$city', State = '$state', Country = '$country', Mobile = '$mobile', Image = '$image' WHERE User_Id = '$user_id' AND User_Type = 'Jobseeker'";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Jobseeker updated successfully');location.href='view-jobseeker.php?user_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error updating jobseeker');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Jobseeker</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="jobseeker-list.php">Jobseeker List</a></li>
            <li class="breadcrumb-item active">Update Jobseeker</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Edit Jobseeker Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['Name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['Email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?= $user['DOB']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male" <?= $user['Gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?= $user['Gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?= $user['Gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= $user['City']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?= $user['State']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?= $user['Country']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $user['Mobile']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="../<?= $user['Image']; ?>" alt="Profile Picture" class="img-thumbnail mt-2" width="100">
                        <input type="hidden" name="old-image" value="<?= $user['Image'] ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Jobseeker</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
</div>
