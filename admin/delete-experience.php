<?php
    include "../db/db-connect.php";

    if (isset($_GET['experience_id'])) {
        $experience_id = $_GET['experience_id'];

        $query = "SELECT User_Id FROM experience_tbl WHERE Experience_Id = $experience_id";
        $result = mysqli_query($con, $query);

        $user_id = mysqli_fetch_array($result)[0];

        $query = "DELETE FROM experience_tbl WHERE Experience_Id = $experience_id";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Experience deleted successfully!'); location.href='view-jobseeker.php?user_id=$user_id';</script>";
            exit();
        } else {
            echo "<script>alert('Error deleting experience');</script>";
        }
    } else {
        echo "<script>alert('No experience_id provided');</script>";
    }
?>
