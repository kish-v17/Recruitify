<?php
// Include the database connection
require_once '../db/db-connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employer_about = isset($_POST['employer_about']) ? trim($_POST['employer_about']) : '';

    $updateEmployerSql = "UPDATE about_page_details_tbl SET about_content = '" . mysqli_real_escape_string($con, $employer_about) . "' WHERE about_for = 'employer'";
    if (mysqli_query($con, $updateEmployerSql)) {
        header("Location: about.php");
        exit();
    } else {
        echo mysqli_error($con);
    }
} else {
    header("Location: about.php");
    exit();
}
