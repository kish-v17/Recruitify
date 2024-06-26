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
                            <h1 class="text-white">Applied Jobs</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Applied jobs</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <!-- <section class="section-padding pb-0 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <form class="custom-form hero-form" action="#" method="get" role="form">
                                <h3 class="text-white mb-3">Search your dream job</h3>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                            <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-geo-alt custom-icon"></i></span>

                                            <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Location" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-cash custom-icon"></i></span>

                                            <select class="form-select form-control" name="job-salary" id="job-salary" aria-label="Default select example">
                                                <option selected>Salary Range</option>
                                                <option value="1">$300k - $500k</option>
                                                <option value="2">$10000k - $45000k</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>

                                            <select class="form-select form-control" name="job-level" id="job-level" aria-label="Default select example">
                                                <option selected>Level</option>
                                                <option value="1">Internship</option>
                                                <option value="2">Junior</option>
                                                <option value="2">Senior</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>

                                            <select class="form-select form-control" name="job-remote" id="job-remote" aria-label="Default select example">
                                                <option selected>Remote</option>
                                                <option value="1">Full Time</option>
                                                <option value="2">Contract</option>
                                                <option value="2">Part Time</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">
                                            Search job
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0">
                                            <span class="text-white mb-lg-0 mb-md-0 me-2">Popular keywords:</span>

                                             <div>
                                                <a href="job-listings.php" class="badge">Web design</a>

                                                <a href="job-listings.php" class="badge">Marketing</a>

                                                <a href="job-listings.php" class="badge">Customer support</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12">
                            <img src="../images/4557388.png" class="hero-image img-fluid" alt="">
                        </div>

                    </div>
                </div>
            </section> -->


            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h2>You Applied For..</h2>
                        </div>

                            <?php
                                include '../db-connect.php'; 
                                include '../time-ago.php';  
                                                    
                                $sql="select * from Applications_tbl A INNER JOIN Job_List_tbl J on A.A_J_Id=J.J_Id INNER JOIN Company_tbl C on J.J_Company_Id=C.C_Id where A.A_U_Id= '$_SESSION[user__id]'";
                                
                                $data=mysqli_query($con,$sql);
                                if(mysqli_num_rows($data))
                                {
                                    while($result=mysqli_fetch_array($data))
                                    {
                                        $timeago = get_timeago(strtotime($result['A_Time']));
                                        
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
                                                                    <a class="badge" width="30%">'.$result['J_Type'].'</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div>

                                                <div class="job-section-btn-wrap">
                                                    <form method="post">
                                                        <input type="hidden" name="jid" value="'.$result['J_Id'].'">
                                                        <button type="submit" name="remove" class="custom-btn btn">Remove</button>
                                                    </form>
                                                </div> 
                                            </div>
                                         
                                        ';
                                    }
                                }
                            ?>
                    </div>
                </div>
            </section>
        </main>
        <?php include "footer.php";
            include '../db-connect.php';
            error_reporting(0);
            $jid=$_POST['jid'];
            if(isset($_POST['remove'])){
               $sql="delete from Job_List_tbl where J_Id='$jid'";
               $data=mysqli_query($con,$sql);
               echo"<script>location.replace('job-applied.php'); </script>";
            }
        
        ?>
    </body>
</html>