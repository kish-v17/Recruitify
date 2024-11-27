<?php 
include("sidebar.php");

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $company_id = $_POST['company_id'];
    $branch_id = $_POST['branch_id'];
    $designation = $_POST['designation'];
    $joining_date = $_POST['joining_date'];
    $leaving_date = $_POST['leaving_date'] ?: NULL;
    $is_current = isset($_POST['is_current']) ? 1 : 0;

    // Insert data into the database
    $query = "INSERT INTO experience_tbl (User_Id, Company_Id, Branch_Id, Designation, Joining_Date, Leaving_Date, Is_Current) 
              VALUES ('$user_id', '$company_id', '$branch_id', '$designation', '$joining_date', ".($leaving_date ? "'$leaving_date'" : "NULL").", '$is_current')";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Experience added successfully');location.href='view-jobseeker.php?user_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error adding experience');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Experience</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Experience</li>
        </ol>

        <!-- Experience Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Experience Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="<?= $_GET["user_id"] ?>">

                    <!-- Company Selection -->
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <select id="company_id" name="company_id" class="form-select" required>
                            <option value="">Select Company</option>
                            <?php
                                // Fetch companies from the database
                                $company_query = "SELECT Company_Id, Name FROM company_tbl";
                                $company_result = mysqli_query($con, $company_query);
                                while ($company = mysqli_fetch_assoc($company_result)) {
                                    echo "<option value='{$company['Company_Id']}'>{$company['Name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Branch Selection -->
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select id="branch_id" name="branch_id" class="form-select" required>
                            <option value="">Select Branch</option>
                        </select>
                    </div>

                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>

                    <!-- Joining Date -->
                    <div class="mb-3">
                        <label for="joining_date" class="form-label">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" required>
                    </div>

                    <!-- Leaving Date (Optional) -->
                    <div class="mb-3">
                        <label for="leaving_date" class="form-label">Leaving Date (Optional)</label>
                        <input type="date" class="form-control" id="leaving_date" name="leaving_date">
                    </div>

                    <!-- Is Current Experience -->
                    <div class="mb-3">
                        <input type="checkbox" id="is_current" name="is_current" value="1">
                        <label for="is_current">Current Experience</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn btn-primary">Add Experience</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
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
