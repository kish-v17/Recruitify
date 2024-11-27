<?php
include "../db/db-connect.php";

$user_id = $_GET['user_id'];

$fetch_query = "SELECT Image FROM users_tbl WHERE User_Id = '$user_id'";
$fetch_result = mysqli_query($con, $fetch_query);

if ($fetch_result && mysqli_num_rows($fetch_result) > 0) {
    $user = mysqli_fetch_assoc($fetch_result);
    $image_path = "../" . $user['Image'];

    $delete_query = "DELETE FROM users_tbl WHERE User_Id = '$user_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        if (file_exists($image_path) && !empty($user['Image'])) {
            unlink($image_path);
        }
        echo "<script>alert('User deleted successfully'); location.href='users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user'); location.href='users.php';</script>";
    }
} else {
    echo "<script>alert('User not found'); location.href='users.php';</script>";
}
?>
