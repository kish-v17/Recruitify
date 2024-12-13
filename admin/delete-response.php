<?php 
    include "../db/db-connect.php";
    $response_id = intval($_GET['response_id']);
    // Prepare the SQL delete query
    $query = "DELETE FROM responses_tbl WHERE Response_Id = $response_id";
    if(mysqli_query($con, $query))
    {
        echo "<script>location.href='responses.php'</script>";
    }
    else{
        echo mysqli_error($con);
    }
