<?php

include "../db/db-connect.php";

if (isset($_POST['company_id'])) {
    $companyId = intval($_POST['company_id']);

    // Query to fetch branches based on company_id
    $query = "SELECT Branch_Id, CONCAT(Address, ' ', City, ', ', State) AS Address FROM branch_tbl WHERE Company_Id = $companyId";
    $result = mysqli_query($con, $query);

    // Generate branch options
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<option value="">Select Branch</option>'; // Default
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . htmlspecialchars($row['Branch_Id']) . '">' . htmlspecialchars($row['Address']) . '</option>';
        }
    } else {
        echo '<option value="">No branches available</option>';
    }
}

