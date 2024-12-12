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

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="tooplate-Recruitify-job.css" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
        
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
                include 'time-ago.php';
                $j_id=$_GET['job_id'];
                $sql="select * from job_list_tbl j 
                inner join branch_tbl b on j.Branch_Id = b.Branch_Id 
                inner join company_tbl c on c.Company_Id = b.Company_Id
                where Job_Id=$j_id";
                $data=mysqli_query($con,$sql);
                
                while($result=mysqli_fetch_assoc($data))
                {
                    $requirements = explode(',', $result['Requirements']);
                    $timeago = get_timeago(strtotime($result['Posted_Time']));
                    echo '
                    <section class="job-section section-padding pb-0">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-8 col-12">
                                    <h2 class="job-title mb-0">'.$result['Title'].'</h2>

                                    <div class="job-thumb job-thumb-detail">
                                        <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                '.$result['City'].','.$result['Country'].'
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                '.$timeago.'
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                &#8377;'.$result['Salary'].'
                                            </p>
                                            <div class="d-flex">
                                            '.(
                                                $result['Is_Internship']==1?'
                                                <p class="mb-0">
                                                    <div class="badge badge-level">Internship</div>
                                                </p>': ''
                                            ).'
                                            <p class="mb-0">
                                                    <div class="badge">'.$result['Type'].'</div>
                                                </p>
                                            </div>
                                        </div>

                                        <h4 class="mt-4 mb-2">Job Description</h4>

                                        <p>'.$result['Description'].'</p>

                                        <h5 class="mt-4 mb-3">Benefits</h5>

                                        <p class="mb-1">'.$result['Benefits'].'</p>

                                        <h5 class="mt-4 mb-3">Requirements</h5>

                                        <ul> ';
                                            foreach ($requirements as $requirement) {
                                                echo '<li>' .trim($requirement) . '</li>';
                                            }
                                            echo '
                                        </ul>
                                         <div class="d-flex justify-content-end flex-wrap mt-5 border-top pt-4">
                                            <form method="post" action="login.php">
                                                <button type="submit" name="apply" class="custom-btn btn mt-2">Apply now</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>';
                
                    $sql2="select *, b.Phone as 'Phone', c.Email as Email, CONCAT(b.Address, ', ', b.City, ', ', b.State, ', ', b.Country) as Address from Company_tbl c inner join Branch_tbl b on c.Company_Id = b.Company_Id where c.Company_Id=$result[Company_Id] and b.Branch_Id=$result[Branch_Id]";
                    $data2=mysqli_query($con,$sql2);
                    while($result2=mysqli_fetch_assoc($data2))
                    {
                        echo'
                            <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                                            <img src="'.$result2['Logo'].'" class="job-image me-3 img-fluid" alt="">

                                            <h4 class="mb-0">'.$result2['Name'].'</h4>
                                        </div>

                                    </div>

                                    <h6 class="mt-3 mb-2">About the Company</h6>

                                    <p>'.$result2['Description'].'</p>

                                    <h6 class="mt-3 mb-2">Address</h6>

                                    <p>'.$result2['Address'].'</p>

                                    <h6 class="mt-4 mb-3">Contact Information</h6>

                                    <p class="mb-2">
                                        <i class="custom-icon bi-globe me-1"></i>

                                        <a href="#" target="_blank" class="site-footer-link">
                                            '.$result2['Website'].'
                                        </a>
                                    </p>

                                    <p class="mb-2">
                                        <i class="custom-icon bi-telephone me-1"></i>

                                        <a href="tel:'.$result2['Phone'].'" class="site-footer-link">
                                        '.$result2['Phone'].'
                                        </a>
                                    </p>

                                    <p>
                                        <i class="custom-icon bi-envelope me-1"></i>

                                        <a href="mailto:'.$result2['Email'].'" class="site-footer-link">
                                            '.$result2['Email'].'
                                        </a>
                                    </p>
                                </div>
                                </div>
                            </div>
                        </div>
                </section>';
                }}
                if (isset($_POST['apply'])) {
                    $user_id = $_SESSION['user_id'];  // Assuming the user is logged in
                
                    // Check if the user has already applied for the job
                    $check_query = "SELECT * FROM application_tbl WHERE Job_Id = $j_id AND User_Id = '$user_id'";
                    $check_result = mysqli_query($con, $check_query);
                
                    if (mysqli_num_rows($check_result) > 0) {
                        // If the record already exists
                        echo "<script>alert('You have already applied for this job.');location.replace('job-applied.php');</script>";
                    } else {
                        // If no record exists, proceed with the application
                        $sql_apply = "INSERT INTO application_tbl (Job_Id, User_Id) VALUES ($j_id, '$user_id')";
                        $apply_result = mysqli_query($con, $sql_apply);
                
                        if ($apply_result) {
                            echo "<script>alert('Applied successfully');location.replace('job-applied.php');</script>";
                        } else {
                            echo "<script>alert('Error in application. Please try again.');</script>";
                        }
                    }
                }
                                
?>

            <?php
                $job_id = $_GET['job_id'];
              $sql = "
                  SELECT 
                      J.Job_Id, 
                      J.Title, 
                      J.Description, 
                      J.Type, 
                      J.Salary, 
                      B.City, 
                      B.Country, 
                      C.Name AS Company_Name ,
                      J.Image AS Job_Image,
                      C.Logo as Company_Logo
                  FROM 
                      job_list_tbl J
                  INNER JOIN 
                      branch_tbl B ON J.Branch_Id = B.Branch_Id
                  INNER JOIN 
                      company_tbl C ON J.Company_Id = C.Company_Id
                  WHERE 
                      J.Job_Id != '$job_id'
                      AND J.Title LIKE CONCAT('%', (SELECT Title FROM job_list_tbl WHERE Job_Id = '$job_id'), '%')
                      OR J.Branch_Id = (SELECT Branch_Id FROM job_list_tbl WHERE Job_Id = '$job_id')
                      OR J.Company_Id = (SELECT Company_Id FROM job_list_tbl WHERE Job_Id = '$job_id')
                  LIMIT 3;
              ";
              
              $result = mysqli_query($con, $sql);
            
              
              ?>
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Similar Jobs</h3>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">
                            <a href="job-listings.php" class="custom-btn custom-border-btn btn ms-lg-auto">Browse Job Listings</a>
                        </div>

                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $jobTitle = $row['Title'];
                                    $jobType = $row['Type'];
                                    $jobSalary = $row['Salary'];
                                    $jobImage = $row['Job_Image'];
                                    $city = $row['City'];
                                    $country = $row['Country'];
                                    $companyName = $row['Company_Name'];
                                    $companyLogo = $row['Company_Logo'];
                                    $jobDetailsUrl = "job-details.php?job_id=" . $row['Job_Id'];
                            
                                    echo '
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="job-thumb job-thumb-box">
                                            <div class="job-image-box-wrap">
                                                <a href="' . $jobDetailsUrl . '">
                                                    <img src="' . $jobImage . '" class="job-image img-fluid" alt="' . $jobTitle . '">
                                                </a>
                            
                                                <div class="job-image-box-wrap-info d-flex align-items-center">
                                                    <p class="mb-0">
                                                        <a href="job-listings.php" class="badge badge-level">' . $jobType . '</a>
                                                    </p>
                                                </div>
                                            </div>
                            
                                            <div class="job-body">
                                                <h4 class="job-title">
                                                    <a href="' . $jobDetailsUrl . '" class="job-title-link">' . $jobTitle . '</a>
                                                </h4>
                            
                                                <div class="d-flex align-items-center">
                                                    <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                                        <img src="' . $companyLogo . '" class="job-image me-3 img-fluid" alt="' . $companyName . '">
                                                        <p class="mb-0">' . $companyName . '</p>
                                                    </div>
                            
                                                </div>
                            
                                                <div class="d-flex align-items-center">
                                                    <p class="job-location">
                                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                                        ' . $city . ', ' . $country . '
                                                    </p>
                                                </div>
                            
                                                <div class="d-flex align-items-center border-top pt-3">
                                                    <p class="job-price mb-0">
                                                        <i class="custom-icon bi-cash me-1"></i>
                                                        ₹' . $jobSalary . '
                                                    </p>
                            
                                                    <a href="login.php" class="custom-btn btn ms-auto">Apply now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            } else {
                                echo "<p>No similar jobs found.</p>";
                            }
                        ?>

                    </div>
                </div>
            </section>


            
        </main>
<hr>
        <?php include "footer.php"?>
        <?php  
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>