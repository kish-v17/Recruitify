<?php 
include("sidebar.php");

if (isset($_GET['education_id'])) {
    $education_id = $_GET['education_id'];
    $query = "SELECT * FROM education_tbl WHERE Education_Id = '$education_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $education = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Education record not found');location.href='view-jobseeker.php';</script>";
    }
}

// Check if form is submitted for update
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $course = $_POST['course'];
    $institute = $_POST['institute'];
    $institute_city = $_POST['institute_city'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'] ?: NULL;

    // Update the education record in the database
    $query = "UPDATE education_tbl 
              SET Course = '$course', Institute = '$institute', Institute_City = '$institute_city', 
                  Start_Date = '$start_date', End_Date = ".($end_date ? "'$end_date'" : "NULL")." 
              WHERE Education_Id = '$education_id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Education updated successfully');location.href='view-jobseeker.php?user_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error updating education');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Education</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Education</li>
        </ol>

        <!-- Education Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Education Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="<?= $education['User_Id'] ?>">
                    <input type="hidden" name="education_id" value="<?= $education['Education_Id'] ?>">

                    <!-- Course -->
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course" name="course" value="<?= $education['Course'] ?>" required>
                    </div>

                    <!-- Institute -->
                    <div class="mb-3">
                        <label for="institute" class="form-label">Institute</label>
                        <input type="text" class="form-control" id="institute" name="institute" value="<?= $education['Institute'] ?>" required>
                    </div>

                    <!-- Institute City -->
                    <div class="mb-3">
                        <label for="institute_city" class="form-label">Institute City</label>
                        <input type="text" class="form-control" id="institute_city" name="institute_city" value="<?= $education['Institute_City'] ?>" required>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $education['Start_Date'] ?>" required>
                    </div>

                    <!-- End Date -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $education['End_Date'] ?>">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn btn-primary">Update Education</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?> 
