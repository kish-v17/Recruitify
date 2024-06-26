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
                            <h1 class="text-white">Jobs</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            


            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                       
                            <h2 style="text-align:center">JOBS</h2>
                        

                            <?php
                                include '../db-connect.php'; 
                                include '../time-ago.php';  
                                                    
                                $sql="select * from Job_List_tbl J INNER JOIN Company_tbl C on J.J_Company_Id=C.C_Id INNER JOIN User_tbl U on J.J_Posted_by_Id=U.U_Id";
                                
                                $data=mysqli_query($con,$sql);
                                if(mysqli_num_rows($data))
                                {
                                    while($result=mysqli_fetch_array($data))
                                    {
                                        $timeago = get_timeago(strtotime($result['J_Post_Time']));
                                        
                                        echo '
                                        <div class="col-lg-12 col-12"> 
                                            <div class="job-thumb d-flex">
                                                <div class="job-image-wrap bg-white shadow-lg">
                                                    <img src="../'.$result['C_Logo'].'" class="job-image img-fluid" alt="">
                                                </div>

                                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                                    <div class="mb-3">
                                                        <h4 class="job-title mb-lg-0">
                                                            <a href="job-details.php?$j_id='.$result['J_Id'].'"  class="job-title-link">'.$result['J_Title'].'</a>
                                                        </h4>

                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <p class="job-location mb-0">
                                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                                '.$result['J_City'].','.$result['J_Country'].'
                                                            </p>

                                                            <p class="job-date mb-0">
                                                                <i class="custom-icon bi-clock me-1"></i>
                                                                '.$timeago.'
                                                            </p>

                                                            <p class="job-price mb-0">
                                                                <i class="custom-icon bi-cash me-1"></i>
                                                                &#8377;'.$result['J_Salary'].'
                                                            </p>

                                                            <div class="d-flex">
                                                                <p class="mb-0">
                                                                    <a href="job-listings.php" class="badge" width="30%">'.$result['J_Type'].'</a>
                                                                </p>
                                                                <p class="mb-0">
                                                                    <a href="job-listings.php" class="badge badge-level" width="70%">Posted by '.$result['U_Name'].'</a>
                                                            </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="job-section-btn-wrap">
                                                <form method="post">
                                                <input type="hidden" name="jid" value="'.$result['J_Id'].'">
                                                <button type="submit" name="delete" class="custom-btn btn">Delete</button>
                                            </form>
                                                </div>
                                            </div>
                                        </div> 

                            
                                        ';
                                    }
                                }
                            ?>


                        <!-- <div class="col-lg-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
            </section>
        </main>
        <?php include "footer.php";
            include '../db-connect.php';
            error_reporting(0);
            $jid=$_POST['jid'];
            if(isset($_POST['delete'])){
               $sql="delete from Job_List_tbl where J_Id='$jid'";
               $data=mysqli_query($con,$sql);
               echo"<script>location.replace('company-listings.php'); </script>";
            }
        
        ?>
    </body>
</html>