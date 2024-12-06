<?php
include "../db/db-connect.php";

$job_id = $_GET['job_id'];

$update_query = "UPDATE job_list_tbl SET Status = 'Active' WHERE Job_Id = $job_id";

if (mysqli_query($con, $update_query)) {
    echo "<script>alert('Job activated successfully!'); location.replace('job-listings.php');</script>";
} else {
    echo "<script>alert('Failed to activate the job. Try again later!'); location.replace('job-listings.php');</script>";
}
?>
