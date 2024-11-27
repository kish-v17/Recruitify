<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Recruitify Job Listing</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/owl.carousel.min.css" rel="stylesheet">

        <link href="../css/owl.theme.default.min.css" rel="stylesheet">

        <link href="tooplate-Recruitify-job.css" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />
        
<!--

Tooplate 2134 Recruitify Job

https://www.tooplate.com/view/2134-Recruitify-job

Bootstrap 5 HTML CSS Template

-->
    
    </head>
    
    <body class="job-listings-page" id="top">

    <?php include "navbar.php"?>

        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Users</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-12">
                            <h1 style="text-align:center">Users</h1>
                        </div>
                        <?php
                                include '../db-connect.php'; 
                                include '../time-ago.php';  
                                                    
                                $sql="select * from User_tbl";
                                
                                $data=mysqli_query($con,$sql);
                                if(mysqli_num_rows($data))
                                {
                                    while($result=mysqli_fetch_array($data))
                                    {
                                        if($result['U_Id']!=1){
                                        $timeago = get_timeago(strtotime($result['U_Reg_Date']));
                                        
                                        echo '
                                        <div class="col-lg-12 col-12"> 
                                            <div class="job-thumb d-flex">
                                                <div class="job-image-wrap bg-white shadow-lg" style="align-items:center;justify-content:center;display:grid">
                                                    <img src="../'.$result['U_Image'].'"  class="avatar-image img-fluid" alt="">
                                                </div>

                                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                                    <div class="mb-3">
                                                        <h4 class="job-title mb-lg-0">
                                                            <a href="#"  class="job-title-link">'.$result['U_Name'].'</a>
                                                        </h4>

                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <p class="job-location mb-0" style="width:20%">
                                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                                '.$result['U_City'].','.$result['U_Country'].'
                                                            </p>

                                                            <p class="job-date mb-0" style="width:180px">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cake2-fill" viewBox="0 0 16 16">
                                                                <path d="m2.899.804.595-.792.598.79A.747.747 0 0 1 4 1.806v4.886c-.354-.06-.689-.127-1-.201V1.813a.747.747 0 0 1-.1-1.01ZM13 1.806v4.685a15.19 15.19 0 0 1-1 .201v-4.88a.747.747 0 0 1-.1-1.007l.595-.792.598.79A.746.746 0 0 1 13 1.806Zm-3 0a.746.746 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 9 1.813v5.17c.341-.013.675-.031 1-.055V1.806Zm-3 0v5.176c-.341-.012-.675-.03-1-.054V1.813a.747.747 0 0 1-.1-1.01l.595-.79.598.789A.747.747 0 0 1 7 1.806Z"/>
                                                                <path d="M4.5 6.988V4.226a22.6 22.6 0 0 1 1-.114V7.16c0 .131.101.24.232.25l.231.017c.332.024.672.043 1.02.055l.258.01a.25.25 0 0 0 .26-.25V4.003a29.015 29.015 0 0 1 1 0V7.24a.25.25 0 0 0 .258.25l.259-.009c.347-.012.687-.03 1.019-.055l.231-.017a.25.25 0 0 0 .232-.25V4.112c.345.031.679.07 1 .114v2.762a.25.25 0 0 0 .292.246l.291-.049c.364-.061.71-.13 1.033-.208l.192-.046a.25.25 0 0 0 .192-.243V4.621c.672.184 1.251.409 1.677.678.415.261.823.655.823 1.2V13.5c0 .546-.408.94-.823 1.201-.44.278-1.043.51-1.745.696-1.41.376-3.33.603-5.432.603-2.102 0-4.022-.227-5.432-.603-.702-.187-1.305-.418-1.745-.696C.408 14.44 0 14.046 0 13.5v-7c0-.546.408-.94.823-1.201.426-.269 1.005-.494 1.677-.678v2.067c0 .116.08.216.192.243l.192.046c.323.077.669.147 1.033.208l.292.05a.25.25 0 0 0 .291-.247ZM1 8.82v1.659a1.935 1.935 0 0 0 2.298.43.935.935 0 0 1 1.08.175l.348.349a2 2 0 0 0 2.615.185l.059-.044a1 1 0 0 1 1.2 0l.06.044a2 2 0 0 0 2.613-.185l.348-.348a.938.938 0 0 1 1.082-.175c.781.39 1.718.208 2.297-.426V8.833l-.68.907a.938.938 0 0 1-1.17.276 1.938 1.938 0 0 0-2.236.363l-.348.348a1 1 0 0 1-1.307.092l-.06-.044a2 2 0 0 0-2.399 0l-.06.044a1 1 0 0 1-1.306-.092l-.35-.35a1.935 1.935 0 0 0-2.233-.362.935.935 0 0 1-1.168-.277L1 8.82Z"/>
                                                            </svg>
                                                            '.$result['U_DOB'].'
                                                            </p>

                                                            <p class="job-price mb-0" style="margin-left:0;" >
                                                                <i class="custom-icon bi-telephone me-1"></i>
                                                                '.$result['U_Mobile'].'
                                                            </p>
                                                
                                                            <div class="d-flex">
                                                                <p class="mb-0">
                                                                    <a href="job-listings.php" class="badge" style="width:60px">'.$result['U_Gender'].'</a>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <a href="job-listings.php" class="badge badge-level" style="width:130px">'.$timeago.'</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="job-section-btn-wrap">
                                                <form method="post">
                                                <input type="hidden" name="uid" value="'.$result['U_Id'].'">
                                                <button type="submit" name="delete" class="custom-btn btn">Delete</button>
                                            </form>
                                                </div>
                                            </div>
                                        </div> 
                                         ';
                                    }
                                }
                            }
                            ?>
                    </div>
            </section>
        </main>
        <?php include "footer.php";
            include '../db-connect.php';
            error_reporting(0);
            $uid=$_POST['uid'];
            if(isset($_POST['delete'])){
               $sql="delete from User_tbl where U_Id='$uid'";
               $data=mysqli_query($con,$sql);
               echo"<script>location.replace('company-listings.php'); </script>";
            }
        
        ?>
    </body>
</html>