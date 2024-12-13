<?php
include("sidebar.php");
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Site Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Site Settings</li>
        </ol>

        <?php
        // Fetch About Page Content for Employer
        $employerAboutContent = '';
        $jobseekerAboutContent = '';
        $aboutSql = "SELECT about_for, about_content FROM about_page_details_tbl";
        $aboutResult = mysqli_query($con, $aboutSql);
        if ($aboutResult && mysqli_num_rows($aboutResult) > 0) {
            while ($row = mysqli_fetch_assoc($aboutResult)) {
                if ($row['about_for'] === 'employer') {
                    $employerAboutContent = $row['about_content'];
                } elseif ($row['about_for'] === 'jobseeker') {
                    $jobseekerAboutContent = $row['about_content'];
                }
            }
        }
        ?>

        <!-- Employer About Page Content Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Employer About Page Content</h4>
            </div>
            <div class="card-body">
                <form id="employerAboutPageForm" action="update-employer-about.php" method="POST" onsubmit="return validateAboutPageForm('employer');">
                    <div class="mb-3">
                        <label for="employerAboutContent" class="form-label">Employer About Page Content</label>
                        <textarea id="employerAboutContent" name="employer_about" class="form-control" rows="10"><?php echo htmlspecialchars($employerAboutContent); ?></textarea>
                        <div id="employerAboutContentError" class="error-message" style="color: red;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Employer About Page</button>
                </form>
            </div>
        </div>

        <!-- Jobseeker About Page Content Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Jobseeker About Page Content</h4>
            </div>
            <div class="card-body">
                <form id="jobseekerAboutPageForm" action="update-jobseeker-about.php" method="POST" onsubmit="return validateAboutPageForm('jobseeker');">
                    <div class="mb-3">
                        <label for="jobseekerAboutContent" class="form-label">Jobseeker About Page Content</label>
                        <textarea id="jobseekerAboutContent" name="jobseeker_about" class="form-control" rows="10"><?php echo htmlspecialchars($jobseekerAboutContent); ?></textarea>
                        <div id="jobseekerAboutContentError" class="error-message" style="color: red;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Jobseeker About Page</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor for both textareas
    ClassicEditor
        .create(document.querySelector('#employerAboutContent'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#jobseekerAboutContent'))
        .catch(error => {
            console.error(error);
        });

    function validateAboutPageForm(aboutFor) {
        const content = document.querySelector(`#${aboutFor}AboutContent`).value.trim();
        const errorDiv = document.querySelector(`#${aboutFor}AboutContentError`);

        if (content === '') {
            errorDiv.textContent = 'Content cannot be empty.';
            return false;
        }
        errorDiv.textContent = '';
        return true;
    }
</script>
