<?php
    include "../db/db-connect.php";
    $application_id = $_GET["application_id"];
    $sql = "delete from application_tbl where Application_Id=".$application_id;
    if(mysqli_query($con, $sql))
        echo "<script>alert('Appliation has been removed successfully!'); history.back();</script>";
    else
        echo "<script>alert('Some error occurred!');</script>";

