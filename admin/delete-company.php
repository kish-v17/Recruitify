<?php
include "../db/db-connect.php";

if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];

    $query = "DELETE FROM company_tbl WHERE Company_Id = '$company_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Company deleted successfully');
                location.href = 'companies.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting company');
                location.href = 'companies.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request');
            location.href = 'companies.php';
          </script>";
}
?>
