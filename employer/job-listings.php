
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
    
    </head>
    
    <body class="job-listings-page" id="top">

    <?php include "navbar.php"?>

        <main>

            <header class="site-header">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Job Listings</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Job listings</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </header>

            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h2>Uploaded Jobs by You</h2>
                        </div>

                        <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                            <a href="add-job.php" class="custom-btn btn ms-auto">Add New Job</a>   
                         </div>
                        
                    <?php
                        include '../time-ago.php';  
                                             
                        $sql="select *,C.Name as 'Company_Name'  from  Company_tbl C  
                        INNER JOIN job_list_tbl J on J.Company_Id=C.Company_Id 
                        INNER JOIN branch_tbl B on B.branch_id = J.Branch_Id
                        where J.Posted_By='$_SESSION[user_id]' and J.status='Active'";
                        
                        $data=mysqli_query($con,$sql);
                        if(mysqli_num_rows($data))
                        {
                            while($result=mysqli_fetch_array($data))
                            {
                                $timeago = get_timeago(strtotime($result['Posted_Time']));
                                
                                echo '<div class="col-lg-4 col-md-6 col-12">
                                    <div class="job-thumb job-thumb-box">
                                        <div class="job-image-box-wrap">
                                            <a href="job-details.php?job_id='.$result['Job_Id'].'">
                                                <img src="../'.$result['Image'].'" class="job-image img-fluid" style="object-fit: contain" alt="job-title-img">
                                            </a>

                                            <div class="job-image-box-wrap-info d-flex align-items-center">
                                               

                                                <p class="mb-0">
                                                    <div class="badge">'.$result['Type'].'</div>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="job-body">
                                            <h4 class="job-title">
                                                <a href="job-details.php?$j_id='.$result['Job_Id'].'" class="job-title-link">'.$result['Title'].'</a>
                                            </h4>

                                            <div class="d-flex align-items-center">
                                                <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                                <img src="../'.$result['Logo'].'" class="job-image me-3 img-fluid" alt="">

                                                    <h6 class="mb-0">'.$result['Company_Name'].'</h6>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <p class="job-location" style="width:50%">
                                                <i class="custom-icon bi-geo-alt me-1" style="display:inline"></i>
                                                    '.$result['City'].','.$result['Country'].'
                                                </p>

                                                <p class="job-date" style="width:50%">
                                                    <i class="custom-icon bi-clock me-1"></i>
                                                    '.$timeago.'
                                                </p>
                                            </div>

                                            <div class="d-flex align-items-center border-top pt-3">
                                                <p class="job-price mb-0">
                                                    <i class="custom-icon bi-cash me-1"></i>&nbsp;
                                                    &#8377;'.$result['Salary'].'
                                                </p>


                                                <a href="edit-job.php?job_id='.$result['Job_Id'].'" class="custom-btn btn ms-auto">Edit</a>
                                                <a href="delete-job.php?job_id='.$result['Job_Id'].'" class="custom-btn btn ms-auto">Delete</a>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            ?>
                            <div class="col-lg-12 col-12">
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
                        </div>
                            <?php
                        }
                        else{
                            echo '<div class="col-12 text-center"><p>No jobs uploaded by you yet.</p></div>';
                        }
                    ?>
</div>
                                   
                        

                    </div>
                </div>
            </section>
        </main>
        <?php include "footer.php";?>
    </body>
</html>