<?php
include "../db/db-connect.php";
    $job_id = $_GET['job_id'];
    $delete_query = "UPDATE job_list_tbl SET Status = 'Deleted' WHERE Job_Id = $job_id";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Job deleted successfully!'); location.replace('job-listings.php');</script>";
    } else {
        echo "<script>alert('Failed to delete the job. Try again later!'); location.replace('job-listings.php');</script>";
    }