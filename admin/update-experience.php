<?php 
include("sidebar.php");

// Fetch existing experience data if the form is being updated
if (isset($_GET['experience_id'])) {
    $experience_id = $_GET['experience_id'];
    $query = "SELECT * FROM experience_tbl WHERE Experience_Id = '$experience_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $experience = mysqli_fetch_assoc($result);
    }
}

// Check if form is submitted for update
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $company_id = $_POST['company_id'];
    $branch_id = $_POST['branch_id'];
    $designation = $_POST['designation'];
    $joining_date = $_POST['joining_date'];
    $leaving_date = $_POST['leaving_date'] ?: NULL;
    $is_current = isset($_POST['is_current']) ? 1 : 0;

    // Update the experience record in the database
    $query = "UPDATE experience_tbl 
              SET Company_Id = '$company_id', Branch_Id = '$branch_id', Designation = '$designation', 
                  Joining_Date = '$joining_date', Leaving_Date = ".($leaving_date ? "'$leaving_date'" : "NULL").", 
                  Is_Current = '$is_current' 
              WHERE Experience_Id = '$experience_id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Experience updated successfully');location.href='view-jobseeker.php?user_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error updating experience');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Experience</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Experience</li>
        </ol>

        <!-- Experience Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Experience Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="<?= $experience['User_Id'] ?>">
                    <input type="hidden" name="experience_id" value="<?= $experience['Experience_Id'] ?>">

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
                                    $selected = ($company['Company_Id'] == $experience['Company_Id']) ? 'selected' : '';
                                    echo "<option value='{$company['Company_Id']}' $selected>{$company['Name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Branch Selection -->
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select id="branch_id" name="branch_id" class="form-select" required>
                            <option value="">Select Branch</option>
                                <?php
                                    $query = "SELECT Branch_Id, CONCAT(Address,' ', City,', ', State) AS Address FROM branch_tbl where Company_Id=" . $experience["Company_Id"];
                                    $data = mysqli_query($con, $query);
                                    echo '<option value="">Select Branch</option>';
                                    if ($data && mysqli_num_rows($data) > 0) {
                                        while ($row = mysqli_fetch_assoc($data)) {
                                            echo '<option value="' . $row['Branch_Id'] . '" ' . ($experience['Branch_Id']==$row['Branch_Id']?'selected ':'') . ' >' . $row['Address'] . '</option>';
                                        }
                                    }
                                ?>
                        </select>
                    </div>

                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="<?= $experience['Designation'] ?>" required>
                    </div>

                    <!-- Joining Date -->
                    <div class="mb-3">
                        <label for="joining_date" class="form-label">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="<?= $experience['Joining_Date'] ?>" required>
                    </div>

                    <!-- Leaving Date (Optional) -->
                    <div class="mb-3">
                        <label for="leaving_date" class="form-label">Leaving Date (Optional)</label>
                        <input type="date" class="form-control" id="leaving_date" name="leaving_date" value="<?= $experience['Leaving_Date'] ?>">
                    </div>

                    <!-- Is Current Experience -->
                    <div class="mb-3">
                        <input type="checkbox" id="is_current" name="is_current" value="1" <?= $experience['Is_Current'] == 1 ? 'checked' : '' ?>>
                        <label for="is_current">Current Experience</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn btn-primary">Update Experience</button>
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