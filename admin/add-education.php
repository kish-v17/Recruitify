<?php 
include("sidebar.php");

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $course = $_POST['course'];
    $institute = $_POST['institute'];
    $institute_city = $_POST['institute_city'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Insert data into the database
    $query = "INSERT INTO education_tbl (User_Id, Course, Institute, Institute_City, Start_Date, End_Date) 
              VALUES ('$user_id', '$course', '$institute', '$institute_city', '$start_date', ".($end_date =="" ? "NULL": "'$_POST[end_date]'").")";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Education added successfully');location.href='view-jobseeker.php?user_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error adding education');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Education</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Education</li>
        </ol>

        <!-- Education Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Education Information</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="<?= $_GET["user_id"] ?>">
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course" name="course" required>
                    </div>
                    <div class="mb-3">
                        <label for="institute" class="form-label">Institute</label>
                        <input type="text" class="form-control" id="institute" name="institute" required>
                    </div>
                    <div class="mb-3">
                        <label for="institute_city" class="form-label">Institute City</label>
                        <input type="text" class="form-control" id="institute_city" name="institute_city" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Education</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
