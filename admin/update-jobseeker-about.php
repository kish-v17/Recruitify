<?php
// Include the database connection
require_once '../db/db-connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobseeker_about = isset($_POST['jobseeker_about']) ? trim($_POST['jobseeker_about']) : '';

    // Update the 'about' content for jobseeker
    $updateJobseekerSql = "UPDATE about_page_details_tbl SET about_content = '" . mysqli_real_escape_string($con, $jobseeker_about) . "' WHERE about_for = 'jobseeker'";
    if (mysqli_query($con, $updateJobseekerSql)) {
        header("Location: about.php");
        exit();
    } else {
        echo mysqli_error($con);
    }
} else {
    header("Location: about.php");
    exit();
}
