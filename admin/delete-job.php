<?php
include("../db/db-connect.php");

    $job_id = $_GET['job_id'];
    $delete_query = "DELETE FROM job_list_tbl WHERE Job_Id = '$job_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Job deleted successfully');location.href='job-listings.php';</script>";
    } else {
        echo "<script>alert('Error deleting job');location.href='job-listings.php';</script>";
    }

?>
