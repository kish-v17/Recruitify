<?php
include("sidebar.php");

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    
    $job_query = "SELECT * FROM job_list_tbl WHERE Job_Id = '$job_id'";
    $job_result = mysqli_query($con, $job_query);
    
    if ($job_result && mysqli_num_rows($job_result) > 0) {
        $job = mysqli_fetch_assoc($job_result);
    } else {
        echo "<script>alert('Job not found');location.href='job-listings.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $requirements = $_POST['requirements'];
    $benefits = $_POST['benefits'];
    $salary = $_POST['salary'];
    $is_internship = isset($_POST['is_internship']) ? 1 : 0;

    // Update job details
    $update_query = "
        UPDATE job_list_tbl 
        SET 
            Title = '$title',
            Description = '$description',
            Type = '$type',
            Requirements = '$requirements',
            Benefits = '$benefits',
            Salary = '$salary',
            Is_Internship = '$is_internship'
        WHERE 
            Job_Id = '$job_id'
    ";
    
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Job updated successfully');location.href='job-listings.php';</script>";
    } else {
        echo "<script>alert('Error updating job');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Job</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="job-listings.php">Job Listings</a></li>
            <li class="breadcrumb-item active">Edit Job</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Job Information</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $job['Title']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required><?= $job['Description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Job Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="Full-Time" <?= $job['Type'] === 'Full-Time' ? 'selected' : ''; ?>>Full-Time</option>
                            <option value="Part-Time" <?= $job['Type'] === 'Part-Time' ? 'selected' : ''; ?>>Part-Time</option>
                            <option value="Contract" <?= $job['Type'] === 'Contract' ? 'selected' : ''; ?>>Contract</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements" rows="4" required><?= $job['Requirements']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="benefits" class="form-label">Benefits</label>
                        <textarea class="form-control" id="benefits" name="benefits" rows="4" required><?= $job['Benefits']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="<?= $job['Salary']; ?>" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_internship" name="is_internship" <?= $job['Is_Internship'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_internship">Is this an internship?</label>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Job</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
