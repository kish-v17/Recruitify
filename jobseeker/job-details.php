<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Recruitify Job Details</title>

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
    
    <body id="top">

    <?php include "navbar.php"?>

        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Job Details</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Job Details</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>
            <?php
                include '../time-ago.php';
                $j_id=$_GET['$j_id'];
                $sql="select * from Job_List_tbl where J_Id=$j_id";
                $data=mysqli_query($con,$sql);
                
                while($result=mysqli_fetch_assoc($data))
                {
                    $timeago = get_timeago(strtotime($result['J_Post_Time']));
                    echo '
                    <section class="job-section section-padding pb-0">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-8 col-12">
                                    <h2 class="job-title mb-0">'.$result['J_Title'].'</h2>

                                    <div class="job-thumb job-thumb-detail">
                                        <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
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
                                                    <div class="badge badge-level">Internship</div>
                                                </p>

                                                <p class="mb-0">
                                                    <div class="badge">'.$result['J_Type'].'</div>
                                                </p>
                                            </div>
                                        </div>

                                        <h4 class="mt-4 mb-2">Job Description</h4>

                                        <p>'.$result['J_Desc'].'</p>

                                        <h5 class="mt-4 mb-3">Benefits</h5>

                                        <p class="mb-1">'.$result['J_Benefits'].'</p>

                                        <h5 class="mt-4 mb-3">Requirements</h5>

                                        <ul>
                                            <li>Strong knowledge in computing skill</li>

                                            <li>Minimum 5 years of working experiences consectetur omeg</li>

                                            <li>Excellent interpersonal skills</li>
                                        </ul>

                                        <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                            <form method="post">
                                                <button type="submit" name="apply" class="custom-btn btn mt-2">Apply now</button>
                                            </form>
                                            <a href="#" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Save this job</a>

                                            <div class="job-detail-share d-flex align-items-center">
                                                <p class="mb-0 me-lg-4 me-3">Share:</p>

                                                <a href="#" class="bi-facebook"></a>

                                                <a href="#" class="bi-twitter mx-3"></a>

                                                <a href="#" class="bi-share"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                
                    $sql2="select * from Company_tbl where C_Id=$result[J_Company_Id]";
                    $data2=mysqli_query($con,$sql2);
                    while($result2=mysqli_fetch_assoc($data2))
                    {
                        echo'
                            <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                                            <img src="../'.$result2['C_Logo'].'" class="job-image me-3 img-fluid" alt="">

                                            <h4 class="mb-0">'.$result2['C_Name'].'</h4>
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2"></a>

                                        <a href="#" class="bi-heart"></a>
                                    </div>

                                    <h6 class="mt-3 mb-2">About the Company</h6>

                                    <p>'.$result2['C_Desc'].'</p>

                                    <h6 class="mt-4 mb-3">Contact Information</h6>

                                    <p class="mb-2">
                                        <i class="custom-icon bi-globe me-1"></i>

                                        <a href="#" target="_blank" class="site-footer-link">
                                            '.$result2['C_Website'].'
                                        </a>
                                    </p>

                                    <p class="mb-2">
                                        <i class="custom-icon bi-telephone me-1"></i>

                                        <a href="tel:'.$result2['C_Phone'].'" class="site-footer-link">
                                        '.$result2['C_Phone'].'
                                        </a>
                                    </p>

                                    <p>
                                        <i class="custom-icon bi-envelope me-1"></i>

                                        <a href="mailto:'.$result2['C_Email'].'" class="site-footer-link">
                                            '.$result2['C_Email'].'
                                        </a>
                                    </p>
                                </div>
                                </div>
                            </div>
                        </div>
                </section>';
                }}
            ?>


            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Similar Jobs</h3>

                            <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">
                            <a href="job-listings.php" class="custom-btn custom-border-btn btn ms-lg-auto">Browse Job Listings</a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.php">
                                        <img src="../images/jobs/it-professional-works-startup-project.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge badge-level">Internship</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge">Freelance</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.php" class="job-title-link">Technical Lead</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                            <img src="../images/logos/salesforce.png" class="job-image me-3 img-fluid" alt="">

                                            <p class="mb-0">Salesforce</p>
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="job-location">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            Kuala, Malaysia
                                        </p>

                                        <p class="job-date">
                                            <i class="custom-icon bi-clock me-1"></i>
                                            10 hours ago
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="job-price mb-0">
                                            <i class="custom-icon bi-cash me-1"></i>
                                            $50k
                                        </p>

                                        <a href="job-details.php" class="custom-btn btn ms-auto">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.php">
                                        <img src="../images/jobs/marketing-assistant.jpg" class="job-image img-fluid" alt="marketing assistant">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge badge-level">Senior</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge">Part Time</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.php" class="job-title-link">Marketing Assistant</a>
                                    </h4>

                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                            <img src="../images/logos/spotify.png" class="job-image me-3 img-fluid" alt="">

                                            <p class="mb-0">Spotify</p>
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="job-location">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            California, USA
                                        </p>

                                        <p class="job-date">
                                            <i class="custom-icon bi-clock me-1"></i>
                                            8 days ago
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="job-price mb-0">
                                            <i class="custom-icon bi-cash me-1"></i>
                                            $20k
                                        </p>

                                        <a href="job-details.php" class="custom-btn btn ms-auto">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="job-thumb job-thumb-box">
                                <div class="job-image-box-wrap">
                                    <a href="job-details.php">
                                        <img src="../images/jobs/coding-man.jpg" class="job-image img-fluid" alt="">
                                    </a>

                                    <div class="job-image-box-wrap-info d-flex align-items-center">
                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge badge-level">Junior</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="job-listings.php" class="badge">Contract</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="job-body">
                                    <h4 class="job-title">
                                        <a href="job-details.php" class="job-title-link">Programmer</a>
                                    </h4>
                                        
                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                            <img src="../images/logos/twitter.png" class="job-image me-3 img-fluid" alt="">

                                            <p class="mb-0">Twiter</p>
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2">
                                        </a>

                                        <a href="#" class="bi-heart">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <p class="job-location">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            California, USA
                                        </p>

                                        <p class="job-date">
                                            <i class="custom-icon bi-clock me-1"></i>
                                            23 hours ago
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center border-top pt-3">
                                        <p class="job-price mb-0">
                                            <i class="custom-icon bi-cash me-1"></i>
                                            $68k
                                        </p>

                                        <a href="job-details.php" class="custom-btn btn ms-auto">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="cta-section">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-10">
                            <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                            <p class="text-white">Recruitify Job is a free HTML CSS template for job hunting related websites. This layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting Tooplate website.</p>
                        </div>

                        <div class="col-lg-4 col-12 ms-auto">
                            <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                                <a href="#" class="custom-btn custom-border-btn btn me-4">Create an account</a>

                                <a href="#" class="custom-link">Post a job</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <?php include "footer.php"?>
        <?php  
            include '../db-connect.php';
            if(isset($_POST['apply'])){
                $sql3="insert into applications_tbl values(A_Id,'$j_id','$_SESSION[user_id]',NOW())";
                $dt=mysqli_query($con,$sql3);
                if($dt)
                {
                    echo "<script> alert('applied Successfully');</script>";
                }
                else{
                    echo "errorrr";
                }    
            }
        ?>

        <!-- JAVASCRIPT FILES -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/counter.js"></script>
        <script src="../js/custom.js"></script>
    </body>
</html>