<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Job Posting</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        font {
            color: red;
            font-weight: bold;
        }

        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }

        label {
            font-weight: bold;
            font-size: 18px
        }
    </style>
</head>

<body id="top">

    <?php include 'navbar.php'; ?>

    <main>

        <header class="site-header">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Edit Job Details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Edit Job Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <script>
            function showForm(a) {
                var x = document.getElementById('change');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                }
            }
        </script>
        <?php
        include '../db-connect.php';
        $j_id = $_GET['$j_id'];
        //$sql="select * from Job_List_tbl where J_Id=$j_id";
        $sql = "select * from Job_List_tbl where J_Id=$j_id";
        $data = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($data);
        ?>
        <section class="contact-section" style="padding:50px">
            <div class="container">
                <div class="row justify-content-center">
                    <h2 class="text-center mb-4"> Edit Job Details</h2>

                    <div class="col-lg-8 col-12 mx-auto" style="width:60%">
                        <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form">


                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label for="job-title">Job Title</label>

                                    <input type="text" name="job-title" id="job-title" class="form-control" value="<?php echo $result['J_Title']; ?>">
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-desc">Description<font>*</font></label>
                                    <textarea name="desc" id="desc" class="form-control"><?php echo $result['J_Desc']; ?></textarea>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-reqs">Requirements<font>*</font></label>
                                    <textarea name="reqs" id="reqs" class="form-control"><?php echo $result['J_Reqs']; ?></textarea>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <label for="job-desc">Benefits<font>*</font></label>
                                    <textarea name="benefit" id="benefit" class="form-control"><?php echo $result['J_Benefits']; ?></textarea>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="company">Company</label> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a href="insert-company.php" color="black">Add New Company</a></u>
                                    <!--<input type="text" name="company" id="company" class="form-control" placeholder="Company">-->
                                    <select class="form-select form-control" name="company" id="company" aria-label="Default select example">
                                        <option disabled selected value>Company</option>
                                        <?php $q = "select C_Id,C_Name from Company_tbl";
                                        $d = mysqli_query($con, $q);
                                        while ($r = mysqli_fetch_array($d)) {
                                        ?>
                                            <option <?php if ($r['C_Id'] == $result['J_Company_Id']) { ?> selected="selected" <?php } ?> value="<?php echo $r['C_Id']; ?>"><?php echo $r['C_Name']; ?>"</option>

                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="type">Type</label>

                                    <select class="form-select form-control" name="type" id="type" aria-label="Default select example">

                                        <option value="Full Time" <?php if ($result['J_Type'] == 'Full Time') echo "selected"; ?>> Full Time</option>
                                        <option value="Part Time" <?php if ($result['J_Type'] == 'Part Time') echo "selected"; ?>>Part Time</option>
                                        <option value="Contract" <?php if ($result['J_Type'] == 'Contract') echo "selected"; ?>> Contract</option>
                                        <option value="Internship" <?php if ($result['J_Type'] == 'Internship') echo "selected"; ?>> Internship</option>
                                        <option value="Remote" <?php if ($result['J_Type'] == 'Remote') echo "selected"; ?>> Remote</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="salary">Salary</label>

                                    <input type="number" name="salary" id="salary" class="form-control" value="<?php echo $result['J_Salary']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="city">City</label>

                                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['J_City']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control" value="<?php echo $result['J_State']; ?>">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <label for="">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" value="<?php echo $result['J_Country']; ?>">
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="submit">Save Changes</button>
                                </div>
                                <br /><br /><br />
                            </div>
                        </form>
                    </div>
                    <?php echo '
                        <div class="col-lg-4 col-md-4 col-6 mx-auto" style="padding:20px 20px 0 20px;width:40%;align-items:center;justify-content:center;">
                            <label for="job-title-img">&emsp;Job Title Image</label>
                            <img class="job-image img-fluid" style="object-fit: cover; border-radius:40px;"  src="../' . $result['J_Image'] . '" alt="Image">
                                <button onclick="showForm(1)" class="custom-btn btn ms-lg-auto" style="width:100%;font-size:20px"> <i class="fa fa-file-image-o"></i>&ensp;<b>Edit Title Image</b></button><br/><br/>
                                    <br/>
                                    
    
                                <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form" id="change" style="padding-top:5px;display:none !important">
                                    
                                    <label for="Profile">Job Title Image</label>

                                    <input type="file" accept="image/jpeg,image/png,image/jpg" name="j-img" id="img" class="form-control">
                                
                                
                                    <center><button type="submit" class="custom-btn btn ms-lg-auto" name="change">Change Picture</button></center>
                                        
                                </form>
                            </div>
                    </div>       
                </div>            
            </section>
            '; ?>
    </main>
</body>
<?php
include '../db-connect.php';
include 'footer.php';
//error_reporting(0);
// ();
$ip = "../images/user-img/job-profile/";
$ip2 = "images/user-img/job-profile/";

if (isset($_POST['change'])) {
    $j_img = $ip . basename($_FILES['j-img']['name']);
    $j_pro = $ip2 . basename($_FILES['j-img']['name']);

    if (move_uploaded_file($_FILES['j-img']['tmp_name'], $j_img)) {
        $sql = "update Job_List_tbl set J_Image='$j_pro' where J_Id='$j_id'";
        $data = mysqli_query($con, $sql);
        if ($data) {
            echo "<script> location.replace('job-listings.php');</script>";
        } else {
            echo "errorrr";
        }
    } else echo "error in uploading file";
}

if (isset($_POST['submit'])) {
    $title = $_POST['job-title'];
    $desc = $_POST['desc'];
    $reqs = $_POST['reqs'];
    $benefit = $_POST['benefit'];
    $com = $_POST['company'];
    $type = $_POST['type'];
    $salary = $_POST['salary'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $sql = "update Job_List_tbl set J_Title='$title',J_Desc='$desc', J_Company_Id='$com',J_Type='$type',J_Reqs='$reqs',J_Benefits='$benefits',J_Salary='$salary',J_City='$city',J_State='$state',J_Country='$country' where J_Id='$j_id'";
    $data = mysqli_query($con, $sql);
    if ($data) {
        echo "<script> location.replace('job-listings.php');</script>";
    } else {
        echo "errorrr";
    }
}

?>

</html>