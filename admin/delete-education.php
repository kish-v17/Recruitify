<?php
    include "../db/db-connect.php";

    $education_id = $_GET['education_id'];
    $query = "select User_Id from education_tbl where Education_Id = $education_id";
    $result = mysqli_query($con,$query);
    $user_id = mysqli_fetch_array($result)[0];
    $query = "DELETE FROM education_tbl WHERE Education_Id = $education_id";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Record deleted successfully!');location.href='view-jobseeker.php?user_id=$user_id';</script>";
        exit();
    } else {
        echo "<script>alert('Error deleting education');</script>";
    }
?>