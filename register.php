<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sign in to Recruitify</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/tooplate-Recruitify-job.css" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
        
        <style>
            font{color:red;font-weight:bold;}
            input[type="file"]::file-selector-button {border-radius: 500px; }
        </style>
    </head>

    <body id="top">

       <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="images/logo.png" class="img-fluid logo-image">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">Recruitify</strong>
                        <small class="logo-slogan">Online Job Portal</small>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Homepage</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Recruitify</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="job-listings.php">Job Listings</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="job-listings.php">Job Listings</a></li>

                                <li><a class="dropdown-item" href="job-details.php">Job Details</a></li>
                            </ul>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <!-- <li class="nav-item ms-lg-auto">
                            <a class="nav-link" href="register.php">Register</a>
                        </li> -->

                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link custom-btn btn" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <header class="site-header">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h1 class="text-white">Register</h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            <section class="contact-section" style="padding:50px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" enctype="multipart/form-data" method="post" role="form">
                                <h2 class="text-center mb-4">Welcome to Recruitify</h2>

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <center>
                                            <b style="font-size:25px"><label for="type">Register as<font>*</font></label>
                                                <div class="form-control">
                                                    <label><input type="radio" name="utype" id="utype" value="2" required> Job seeker &emsp;</label>
                                                    &emsp;<label><input type="radio" name="utype" id="utype" value="3" required> Employer</label>
                                                </div>
                                            </b>
                                        </center>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="first-name">Full Name<font>*</font></label>

                                        <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="email">Email Address<font>*</font></label>

                                         <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                                    </div>

                                    

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="dob">Date of Birth<font>*</font></label>

                                        <input type="date" name="dob" id="dob" class="form-control" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="gender">Gender<font>*</font></label>
                                        <div class="form-control">
                                            <label><input type="radio" name="gender" id="gender" value="Male" required> Male &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Female" required> Female &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Other" required> Other</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="mobile" style="display:block">Mobile<font>*</font></label>
                
                                        <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Mobile" pattern={0-9}[10] required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">City<font>*</font></label>

                                        <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="State">State<font>*</font></label>

                                        <input type="text" name="state" id="state" class="form-control" placeholder="State" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="country">Country<font>*</font></label>

                                        <input type="text" name="country" id="country" class="form-control" placeholder="Country" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="Profile">Profile Photo<font>*</font></label>

                                        <input type="file" accept="image/jpeg,image/png,image/jpg" name="img" id="img" class="form-control" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="password">Password<font>*</font></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required minlength="8">
                                    </div>

                                    
                                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="submit">Register</button>
                                    </div>
                                    <br/><br/><br/>
                                    <h5 style="text-align:center">Already have an account??&nbsp;<u><a href="login.php">Log in</a></u></h5>
                                </div>
                            </form>
                        </div>
                    </div>       
                </div>            
            </section>
        </main>

        

    </body>
    <?php
	include 'db-connect.php';
    // error_reporting(0);
    $ip="images/user-img/user-profile/";
	if(isset($_POST['submit']))
    {
        $utype=$_POST['utype'];
		$name=$_POST['full-name'];
		$email=$_POST['email'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$city=$_POST['city'];
        $mob=$_POST['mobile'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $img=$ip.basename($_FILES['img']['name']);
		$pass=$_POST['password'];
        if(move_uploaded_file($_FILES['img']['tmp_name'],$img))
        {
	        $sql="insert into User_tbl values(U_Id,'$utype','$name','$email','$dob','$gender','$city','$state','$country','$mob','$img','$pass',NOW())";
            $data=mysqli_query($con,$sql);
		    if($data)
            {
                echo "<script> location.replace('login.php');</script>";
            }
            else{
			    echo "errorrr";
		    }
        }
        else echo"error in uploading file"; 
    }  
    include 'footer.php';
?>

</html>