<?php
include("../db/db-connect.php");

if (isset($_GET['branch_id'])) {
    $branch_id = $_GET['branch_id'];

    $check_query = "SELECT Company_Id FROM branch_tbl WHERE Branch_Id = '$branch_id'";
    $check_result = mysqli_query($con, $check_query);
    $company_id = mysqli_fetch_array($check_result)[0];
    $delete_query = "DELETE FROM branch_tbl WHERE Branch_Id = '$branch_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Branch deleted successfully');location.href='view-company.php?company_id=$company_id';</script>";
    } else {
        echo "<script>alert('Error deleting branch');location.href='view-company.php?company_id=$company_id';</script>";
    }
} else {
    echo "<script>alert('No branch selected');location.href='view-company.php?company_id=$company_id';</script>";
}

?>
