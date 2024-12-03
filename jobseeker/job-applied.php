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
                            <h1 class="text-white">Applied Jobs</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Applied Jobs</li>
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
                            <h2>You Applied For..</h2>
                        </div>

                            <?php
                                include '../time-ago.php';  
                                                    
                                $sql = "SELECT a.Application_Id, j.Job_Id, j.Title AS Job_Title, j.Type AS Job_Type, j.Salary, j.Posted_Time, c.Name AS Company_Name, b.City AS Job_City, b.Country AS Job_Country, c.Logo AS Company_Logo FROM application_tbl a left JOIN job_list_tbl j ON a.Job_Id = j.Job_Id left join branch_tbl b on b.Branch_id = j.Branch_Id  left JOIN company_tbl c ON b.Company_Id = c.Company_Id WHERE a.User_Id ='$_SESSION[user_id]'";

                                $data = mysqli_query($con, $sql);
                                if (mysqli_num_rows($data)) {
                                    while ($result = mysqli_fetch_array($data)) {
                                        $timeago = get_timeago(strtotime($result['Posted_Time']));
                                        
                                        echo '
                                        <div class="col-lg-12 col-12"> 
                                            <div class="job-thumb d-flex">
                                                <div class="job-image-wrap bg-white shadow-lg">
                                                    <img src="../'.$result['Company_Logo'].'" class="job-image img-fluid" alt="">
                                                </div>

                                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                                    <div class="mb-3">
                                                        <h4 class="job-title mb-lg-0">
                                                            <a href="job-details.php?job_id='.$result['Job_Id'].'" class="job-title-link">'.$result['Job_Title'].'</a>
                                                        </h4>

                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <p class="job-location mb-0">
                                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                                '.$result['Job_City'].', '.$result['Job_Country'].'
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
                                                                <p class="mb-0">
                                                                    <a class="badge" width="30%">'.$result['Job_Type'].'</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div>

                                                <div class="job-section-btn-wrap">
                                                    <form method="post">
                                                        <input type="hidden" name="job_id" value="'.$result['Job_Id'].'">
                                                        <button type="submit" name="remove" class="custom-btn btn">Remove</button>
                                                    </form>
                                                </div> 
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<p>No applied jobs found.</p>';
                                }
                            ?>
                    </div>
                </div>
            </section>
        </main>

        <?php include "footer.php"; ?>

        <?php
            if (isset($_POST['remove'])) {
                $job_id = $_POST['job_id'];
                $delete_sql = "DELETE FROM application_tbl WHERE Job_Id = '$job_id' AND User_Id = '$_SESSION[user_id]'";
                mysqli_query($con, $delete_sql);
                echo "<script>location.replace('job-applied.php');</script>";
            }
        ?>
    </body>
</html>
