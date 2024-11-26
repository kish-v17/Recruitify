<?php
include '../db/db-connect.php';

$experience_id = $_GET['experience_id'];

$sql = "DELETE FROM experience_tbl WHERE Experience_Id = $experience_id";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Experience record deleted successfully'); location.replace('profile.php');</script>";
} else {
    echo "<script>alert('Error deleting record'); location.replace('profile.php');</script>";
}