<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "recruitify_db");
if ($con) {
    //echo "sucessfull";
} else {
    //echo "errorrr";
}
