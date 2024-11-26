<?php
include '../db/db-connect.php';

$education_id = $_GET['education_id'];

$sql = "DELETE FROM education_tbl WHERE Education_Id = $education_id";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Education record deleted successfully'); location.replace('profile.php');</script>";
} else {
    echo "<script>alert('Error deleting record'); location.replace('profile.php');</script>";
}

