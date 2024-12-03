<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Job</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/tooplate-Recruitify-job.css" rel="stylesheet">
</head>
<body>
    <?php include "navbar.php"; ?>
    <?php

    $user_id = $_SESSION['user_id'];
    $job_id = $_GET['job_id']; // Get the Job_Id from the URL

    // Fetch company and branch ID for the logged-in employer
    $query = "SELECT Company_Id, Branch_Id FROM users_tbl WHERE User_Id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $company_id = $user_data['Company_Id'];
        $branch_id = $user_data['Branch_Id'];
    } else {
        die("Error fetching company details.");
    }

    // Fetch the existing job data based on Job_Id
    $job_query = "SELECT * FROM job_list_tbl WHERE Job_Id = '$job_id' AND Company_Id = '$company_id'";
    $job_result = mysqli_query($con, $job_query);

    if ($job_result && mysqli_num_rows($job_result) > 0) {
        $job_data = mysqli_fetch_assoc($job_result);
    } else {
        die("Error fetching job details.");
    }

    $ip = "../images/jobs/"; // Path for storing images
    $ip2 = "images/jobs/";  // Path for displaying images

    if (isset($_POST['update-job'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $requirements = $_POST['requirements'];
        $benefits = $_POST['benefits'];
        $salary = $_POST['salary'];
        $is_internship = isset($_POST['is_internship']) ? 1 : 0;

        // If a new image is uploaded
        if ($_FILES['job_image']['name']) {
            $img = $ip . basename($_FILES['job_image']['name']);
            $img2 = $ip2 . basename($_FILES['job_image']['name']);
            if (move_uploaded_file($_FILES['job_image']['tmp_name'], $img)) {
                $update_query = "UPDATE job_list_tbl SET 
                    Title = '$title', 
                    Description = '$description', 
                    Type = '$type', 
                    Requirements = '$requirements', 
                    Benefits = '$benefits', 
                    Salary = '$salary', 
                    Image = '$img2', 
                    Is_Internship = '$is_internship' 
                    WHERE Job_Id = '$job_id'";
            } else {
                echo "<script>alert('Error uploading job image.');</script>";
            }
        } else {
            // If no new image, keep the existing one
            $update_query = "UPDATE job_list_tbl SET 
                Title = '$title', 
                Description = '$description', 
                Type = '$type', 
                Requirements = '$requirements', 
                Benefits = '$benefits', 
                Salary = '$salary', 
                Is_Internship = '$is_internship' 
                WHERE Job_Id = '$job_id'";
        }

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Job updated successfully!'); window.location.href='job-listings.php';</script>";
        } else {
            echo "<script>alert('Error updating job in the database.');</script>";
        }
    }
    ?>
    <main>
        <header class="site-header">
            <div class="section-overlay"></div>
            <div class="container text-center">
                <h1 class="text-white">Update Job</h1>
            </div>
        </header>

        <section class="section-padding">
            <div class="container">
                <form class="custom-form contact-form row" method="post" enctype="multipart/form-data">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="title">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $job_data['Title']; ?>" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="type">Job Type</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="Full-Time" <?php if ($job_data['Type'] == 'Full-Time') echo 'selected'; ?>>Full-Time</option>
                            <option value="Part-Time" <?php if ($job_data['Type'] == 'Part-Time') echo 'selected'; ?>>Part-Time</option>
                            <option value="Contract" <?php if ($job_data['Type'] == 'Contract') echo 'selected'; ?>>Contract</option>
                        </select>
                    </div>

                    <div class="col-lg-12 col-12">
                        <label for="description">Job Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Job Description" required><?php echo $job_data['Description']; ?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="requirements">Requirements</label>
                        <textarea name="requirements" id="requirements" rows="4" class="form-control" placeholder="Enter Job Requirements" required><?php echo $job_data['Requirements']; ?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="benefits">Benefits</label>
                        <textarea name="benefits" id="benefits" rows="4" class="form-control" placeholder="Enter Job Benefits" required><?php echo $job_data['Benefits']; ?></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" id="salary" class="form-control" value="<?php echo $job_data['Salary']; ?>" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="job_image">Upload New Job Image (Optional)</label>
                        <input type="file" name="job_image" id="job_image" class="form-control" accept="image/*">
                        <p>Current Image: <img src="../<?php echo $job_data['Image']; ?>" alt="Job Image" width="100"></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="is_internship">Is Internship?</label>
                        <input type="checkbox" name="is_internship" id="is_internship" class="form-check-input" <?php if ($job_data['Is_Internship']) echo 'checked'; ?>>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                        <button type="submit" class="form-control btn btn-primary" name="update-job">Update Job</button>
                    </div>

                </form>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>

    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
