<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Job</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/tooplate-Recruitify-job.css" rel="stylesheet">
</head>
<body>
    <?php include "navbar.php"; ?>
    <?php
$user_id = $_SESSION['user_id'];

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

$ip = "../images/jobs/";
$ip2 = "images/jobs/";  

if (isset($_POST['add-job'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $requirements = $_POST['requirements'];
    $benefits = $_POST['benefits'];
    $salary = $_POST['salary'];
    $is_internship = isset($_POST['is_internship']) ? 1 : 0;

    $img = $ip . basename($_FILES['job_image']['name']);
    $img2 = $ip2 . basename($_FILES['job_image']['name']);

    if (move_uploaded_file($_FILES['job_image']['tmp_name'], $img)) {
        $query = "INSERT INTO job_list_tbl 
            (Posted_By, Title, Posted_Time, Description, Company_Id, Branch_Id, Type, Requirements, Benefits, Salary, Image, Is_Internship) 
            VALUES ('$user_id', '$title', NOW(), '$description', '$company_id', '$branch_id', '$type', '$requirements', '$benefits', '$salary', '$img2', '$is_internship')";

        if (mysqli_query($con, $query)) {
            echo "<script>alert('Job added successfully!'); window.location.href='job-listings.php';</script>";
        } else {
            echo "<script>alert('Error adding job to the database.');</script>";
        }
    } else {
        echo "<script>alert('Error uploading job image.');</script>";
    }
}

?>
    <main>
        <header class="site-header">
            <div class="section-overlay"></div>
            <div class="container text-center">
                <h1 class="text-white">Add New Job</h1>
            </div>
        </header>

        <section class="section-padding">
            <div class="container">
                <form class="custom-form contact-form row" action="add-job.php" method="post" enctype="multipart/form-data">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="title">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Job Title" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="type">Job Type</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>

                    <div class="col-lg-12 col-12">
                        <label for="description">Job Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Job Description" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="requirements">Requirements</label>
                        <textarea name="requirements" id="requirements" rows="4" class="form-control" placeholder="Enter Job Requirements" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="benefits">Benefits</label>
                        <textarea name="benefits" id="benefits" rows="4" class="form-control" placeholder="Enter Job Benefits" required></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter Salary" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="job_image">Upload Job Image</label>
                        <input type="file" name="job_image" id="job_image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <label for="is_internship">Is Internship?</label>
                        <input type="checkbox" name="is_internship" id="is_internship" class="form-check-input">
                    </div>
                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                        <button type="submit" class="form-control btn btn-primary" name="add-job">Add Job</button>
                    </div>

                </form>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>

    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
