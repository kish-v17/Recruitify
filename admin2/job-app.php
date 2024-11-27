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
                            <h1 class="text-white">Applications</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Applications</li>
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
                            <h1 style="text-align:center">Aplications</h1>
                        </div>
                        <?php
                                include '../db-connect.php'; 
                                include '../time-ago.php';  
                                                    
                                $sql="select * from Applications_tbl A INNER JOIN Job_List_tbl J on A.A_J_Id=J.J_Id INNER JOIN User_tbl U on A.A_U_Id=U.U_Id INNER JOIN Company_tbl C on J.J_Company_Id=C.C_Id";
                                
                                $data=mysqli_query($con,$sql);
                                if(mysqli_num_rows($data))
                                {
                                    while($result=mysqli_fetch_array($data))
                                    {
                                        $timeago = get_timeago(strtotime($result['A_Time']));
                                        
                                        echo '
                                        <div class="col-lg-12 col-12" > 
                                            <div class="job-thumb d-flex">
                                                <div class="job-image-wrap bg-white shadow-lg" style="align-items:center;justify-content:center;display:grid">
                                                    <img src="../'.$result['C_Logo'].'"  class="avatar-image img-fluid" alt="">
                                                </div>

                                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                                    <div class="mb-3">
                                                        <h4 class="job-title mb-lg-0">
                                                            <a href="#"  class="job-title-link">'.$result['J_Title'].'</a>
                                                        </h4>
                                                        <div class="d-flex">
                                                                <p class="mb-0" >
                                                                    <a class="badge" style="width:175px"> Applied by '.$result['U_Name'].'</a>
                                                                </p>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                                <p class="mb-0" style=>
                                                                    <a  class="badge badge-level" style="width:100px">'.$timeago.'</a>
                                                                </p>
                                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                                <p class="job-location mb-0" style="width:175px">
                                                                <i class="custom-icon bi-building"></i>
                                                                '.$result['C_Name'].'
                                                            </p>
                                                            </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="job-section-btn-wrap">
                                                <form method="post">
                                                <input type="hidden" name="aid" value="'.$result['A_Id'].'">
                                                <button type="submit" name="delete" class="custom-btn btn">Delete</button>
                                            </form>
                                                </div>
                                            </div>
                                        </div> 
                                         ';
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
               $sql="delete from Application_tbl where A_Id='$aid'";
               $data=mysqli_query($con,$sql);
               echo"<script>location.replace('company-listings.php'); </script>";
            }
        
        ?>
    </body>
</html>