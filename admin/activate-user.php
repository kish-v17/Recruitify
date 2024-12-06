<?php
include "../db/db-connect.php";

$user_id = $_GET['user_id'];

$update_query = "UPDATE users_tbl SET Status = 'Active' WHERE User_Id = $user_id";

if (mysqli_query($con, $update_query)) {
    echo "<script>alert('User activated successfully!'); location.replace('users.php');</script>";
} else {
    echo "<script>alert('Failed to activate the user. Try again later!'); location.replace('users.php');</script>";
}
?>
