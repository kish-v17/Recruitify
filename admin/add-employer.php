<?php
include("sidebar.php");

if (isset($_POST['submit'])) {
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
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];

    $ip = "../images/user-img/user-profile/";
    $ip2 = "images/user-img/user-profile/";  

    $unique_file_name = uniqid("", true) . basename($_FILES['image']['name']);
    $image_path_server = $ip . $unique_file_name;
    $image_path_db = $ip2 . $unique_file_name; 

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path_server)) {
        $query = "INSERT INTO users_tbl 
                (User_Type, Company_Id, Branch_Id, Name, Email, DOB, Gender, City, State, Country, Mobile, Image, Password, Register_Date) 
                VALUES 
                ('Employer', '$company_id', '$branch_id', '$name', '$email', '$dob', '$gender', '$city', '$state', '$country', '$mobile', '$image_path_db', '$password', NOW())";
        
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Employer added successfully'); location.href='users.php';</script>";
        } else {
            echo "<script>alert('Error adding employer');</script>";
        }
    } else {
        echo "<script>alert('Image upload failed');</script>";
    }

}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Employer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Employer</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Employer Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <select id="company_id" name="company_id" class="form-select" required>
                            <option value="">Select Company</option>
                            <?php
                            $company_query = "SELECT Company_Id, Name FROM company_tbl";
                            $company_result = mysqli_query($con, $company_query);
                            while ($company = mysqli_fetch_assoc($company_result)) {
                                echo "<option value='{$company['Company_Id']}'>{$company['Name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select id="branch_id" name="branch_id" class="form-select" required>
                            <option value="">Select Branch</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <!-- State -->
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>

                    <!-- Country -->
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>

                    <!-- Mobile -->
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Add Employer</button>
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
                        return response.text(); // Parse response as text
                    })
                    .then((data) => {
                        // Populate the branch dropdown with received options
                        console.log(data); // Debug the response here
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
