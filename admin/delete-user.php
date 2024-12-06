<?php
include "../db/db-connect.php";
    $user_id = $_GET['user_id'];
    $delete_query = "UPDATE users_tbl SET Status = 'Deleted' WHERE User_id = $user_id";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('User deleted successfully!'); location.replace('users.php');</script>";
    } else {
        echo "<script>alert('Failed to delete the user. Try again later!'); location.replace('users.php');</script>";
    }