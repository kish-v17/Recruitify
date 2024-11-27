<?php
include("sidebar.php");

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $company_id = $_POST['company_id'];
    $branch_id = $_POST['branch_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $ip = "../images/user-img/user-profile/";
    $ip2 = "images/user-img/user-profile/";

    if (!empty($image)) {
        $unique_file_name = uniqid("", true) . basename($image);
        $image_path_server = $ip . $unique_file_name;
        $image_path_db = $ip2 . $unique_file_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path_server)) {
            $update_query = "UPDATE users_tbl SET 
                Company_Id = '$company_id', Branch_Id = '$branch_id', Name = '$name', 
                Email = '$email', DOB = '$dob', Gender = '$gender', City = '$city', 
                State = '$state', Country = '$country', Mobile = '$mobile', 
                Image = '$image_path_db', Password = '$password'
                WHERE User_Id = '$user_id'";
        } else {
            echo "<script>alert('Image upload failed');</script>";
            exit;
        }
    } else {
        $update_query = "UPDATE users_tbl SET 
            Company_Id = '$company_id', Branch_Id = '$branch_id', Name = '$name', 
            Email = '$email', DOB = '$dob', Gender = '$gender', City = '$city', 
            State = '$state', Country = '$country', Mobile = '$mobile', 
            Password = '$password'
            WHERE User_Id = '$user_id'";
    }

    $result = mysqli_query($con, $update_query);

    if ($result) {
        echo "<script>alert('Employer updated successfully'); location.href='users.php';</script>";
    } else {
        echo "<script>alert('Error updating employer');</script>";
    }
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $fetch_query = "SELECT * FROM users_tbl WHERE User_Id = '$user_id' AND User_Type = 'Employer'";
    $result = mysqli_query($con, $fetch_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $employer = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Employer not found'); location.href='users.php';</script>";
        exit;
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Employer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Employer</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Edit Employer Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo $employer['User_Id']; ?>">

                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <select id="company_id" name="company_id" class="form-select" required>
                            <option value="">Select Company</option>
                            <?php
                            $company_query = "SELECT Company_Id, Name FROM company_tbl";
                            $company_result = mysqli_query($con, $company_query);
                            while ($company = mysqli_fetch_assoc($company_result)) {
                                $selected = ($company['Company_Id'] == $employer['Company_Id']) ? "selected" : "";
                                echo "<option value='{$company['Company_Id']}' $selected>{$company['Name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select id="branch_id" name="branch_id" class="form-select" required>
                            <option value="">Select Branch</option>
                            <?php
                            $branch_query = "SELECT Branch_Id, CONCAT(City, ', ', State, ', ', Country) as Address FROM branch_tbl WHERE Company_Id = '{$employer['Company_Id']}'";
                            $branch_result = mysqli_query($con, $branch_query);
                            while ($branch = mysqli_fetch_assoc($branch_result)) {
                                $selected = ($branch['Branch_Id'] == $employer['Branch_Id']) ? "selected" : "";
                                echo "<option value='{$branch['Branch_Id']}' $selected>{$branch['Address']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3"><label>Name</label><input type="text" name="name" value="<?php echo $employer['Name']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>Email</label><input type="email" name="email" value="<?php echo $employer['Email']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>DOB</label><input type="date" name="dob" value="<?php echo $employer['DOB']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="Male" <?php echo ($employer['Gender'] == "Male") ? "selected" : ""; ?>>Male</option>
                            <option value="Female" <?php echo ($employer['Gender'] == "Female") ? "selected" : ""; ?>>Female</option>
                            <option value="Other" <?php echo ($employer['Gender'] == "Other") ? "selected" : ""; ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>City</label><input type="text" name="city" value="<?php echo $employer['City']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>State</label><input type="text" name="state" value="<?php echo $employer['State']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>Country</label><input type="text" name="country" value="<?php echo $employer['Country']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>Mobile</label><input type="text" name="mobile" value="<?php echo $employer['Mobile']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label>Password</label><input type="password" name="password" value="<?php echo $employer['Password']; ?>" class="form-control" required></div>
                    <div class="mb-3">
                        <label>Profile Picture</label>
                        <input type="file" name="image" class="form-control">
                        <?php if (!empty($employer['Image'])) { ?>
                            <img src="../<?php echo $employer['Image']; ?>" alt="Current Image" height="100">
                        <?php } ?>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update Employer</button>
                </form>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
        const companyDropdown = document.getElementById('company_id');
        const branchDropdown = document.getElementById('branch_id');

    companyDropdown.addEventListener('change', () => {
            const companyId = companyDropdown.value; // Get selected company ID

            if (companyId) {
                fetch('../php/fetch-branches.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `company_id=${companyId}`,
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then((data) => {
                        console.log(data);
                        branchDropdown.innerHTML = data;
                    })
                    .catch((error) => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            } else {
                branchDropdown.innerHTML = '<option value="">Select Branch</option>';
            }
        });
    });
</script>

<?php include("footer.php"); ?>
