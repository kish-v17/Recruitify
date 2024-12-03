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
    <?php
if (isset($_POST['update_status'])) {
    $application_id = $_POST['aid'];
    $status = $_POST['status'];

    $update_query = "UPDATE application_tbl SET Status = '$status' WHERE Application_Id = $application_id";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Status updated to $status successfully!')</script>";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}
?>


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
                                            <img src="../'.$result2['Logo'].'" class="job-image me-3 img-fluid" alt="">

                                            <h4 class="mb-0">'.$result2['Name'].'</h4>
                                        </div>

                                        <a href="#" class="bi-bookmark ms-auto me-2"></a>

                                        <a href="#" class="bi-heart"></a>
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
            ?>
            <hr>
            <section class="applicants-section section-padding">
    <div class="container">
        <h3 class="mb-4">Applicants</h3>
        <?php
        $job_id = $_GET['job_id'];
        
        $sql = "SELECT a.Application_Id, a.Status, u.Name, u.Email, u.Image, u.Gender, a.User_Id, a.Job_Id
                FROM application_tbl a
                INNER JOIN users_tbl u ON a.User_Id = u.User_Id
                WHERE a.Job_Id = $job_id
                ";
        $applicants = mysqli_query($con, $sql);

        if (mysqli_num_rows($applicants) > 0) {
            while ($applicant = mysqli_fetch_assoc($applicants)) {
                $query = "SELECT Course, Institute, Institute_City, Start_Date, End_Date FROM education_tbl e1 WHERE Start_Date = (SELECT MAX(Start_Date) FROM education_tbl e2 WHERE e1.User_Id = e2.User_Id)";
                $education = mysqli_fetch_assoc(mysqli_query($con,$query));

                $skills = "";
                $sql = "SELECT s.Skill_Name FROM skills_tbl s INNER JOIN user_skills_tbl us ON s.Skill_Id = us.Skill_Id WHERE us.User_Id = $applicant[User_Id]";
                $data = mysqli_query($con, $sql);
                
                while ($skill = mysqli_fetch_assoc($data)) {
                    $skills .= $skill['Skill_Name'] . ", ";
                }
                $skills = rtrim($skills, ", ");
                echo '<div class="col-lg-12 col-12"> 
                <div class="job-thumb d-flex">
                    <div class="job-image-wrap bg-white shadow-lg">
                        <img src="../'.$applicant['Image'].'" class="img-fluid rounded-circle small" alt="">
                    </div>

                    <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                        <div class="mb-3">
                            <h4 class="job-title mb-lg-0">
                                <h5 class="w-100">' . $applicant['Name'] . '</h5>
                            </h4>

                            <div class="d-flex flex-wrap align-items-center">

                                <p class="job-location mb-0">
                                    <i class="custom-icon bi-envelope me-1"></i>
                                    '.$applicant['Email'].'
                                </p>
                                <p class="job-date mb-0">
                                    <i class="custom-icon '.($applicant['Gender'] == 'Male' ? 'bi-gender-male' : ($applicant['Gender'] == 'Female' ? 'bi-gender-female' : 'bi-gender-ambiguous')).' me-1"></i>
                                    '.$applicant['Gender'].'
                                </p>
                                <p class="job-price mb-0 mt-2">
                                    <i class="custom-icon bi-mortarboard me-1 ms-0"></i>
                                    '.($education ?($education['End_Date']==""? "Pursuing " : "Completed "). $education['Course'].' From ' .$education['Institute']: 'No education details').'
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="mb-0"><strong>Skills:</strong> '.$skills.'</p>
                            </div>
                        </div>
                    </div>

                    <div class="job-section-btn-wrap">
                        <form method="post">
                            <input type="hidden" name="aid" value="'.$applicant['Application_Id'].'">
                            <select name="status" class="form-select" aria-label="Update application status">
                                <option value="Pending" '.($applicant['Status'] == 'Pending' ? 'selected' : '').'>Pending</option>
                                <option value="Accepted" '.($applicant['Status'] == 'Accepted' ? 'selected' : '').'>Accepted</option>
                                <option value="Rejected" '.($applicant['Status'] == 'Rejected' ? 'selected' : '').'>Rejected</option>
                            </select>
                            <button type="submit" name="update_status" class="custom-btn btn btn-primary mt-2">Update</button>
                            <a href="view-applicant.php?user_id='.$applicant['User_Id'].'" class="custom-btn btn mt-2">View</a>
                        </form>
                    </div>
        </div>

                </div>
                <hr>';
            }
        } else {
            echo '<p>No applications have been submitted for this job yet.</p>';
        }
        ?>
    </div>
</section>

        </main>

        <?php include "footer.php"?>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/counter.js"></script>
        <script src="../js/custom.js"></script>

    </body>
</html>
