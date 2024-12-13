<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>About Recruitify Job Portal</title>

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



    <!--

Tooplate 2134 Recruitify Job

https://www.tooplate.com/view/2134-Recruitify-job

Bootstrap 5 HTML CSS Template

-->

</head>

<body class="about-page" id="top">

    <?php include "navbar.php" ?>

    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">About Recruitify</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


        <section class="about-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <!-- <div class="col-lg-5 col-12">
                        <div class="about-info-text">
                            <h2 class="mb-0">Introducing Recruitify</h2>

                            <h4 class="mb-2">Get hired. Get your new job</h4>

                            <p align="justify">Welcome to Recruitify, your trusted partner in the world of employment and talent acquisition. At Recruitify, we believe in connecting job seekers with their dream careers and helping businesses find the perfect candidates to build their success stories.</p>

                            <div class="d-flex align-items-center mt-4">
                                <a href="#services-section" class="custom-btn custom-border-btn btn me-4">Explore Services</a>

                                <a href="contact.php" class="custom-link smoothscroll">Contact</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                        <div class="about-image-wrap">
                            <img src="images/horizontal-shot-happy-mixed-race-females.jpg" class="about-image about-image-border-radius img-fluid" alt="">

                            <div class="about-info d-flex">
                                <h4 class="text-white mb-0 me-2">100+</h4>

                                <p class="text-white mb-0">Companies</p>
                            </div>
                        </div>
                    </div> -->
                    <?php
// SQL query to fetch content for 'employer'
$sql = "SELECT about_content FROM about_page_details_tbl WHERE about_for = 'employer'";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the row and decode any HTML entities to render HTML properly
    $row = mysqli_fetch_assoc($result);
    echo html_entity_decode($row['about_content']);  // This will render the HTML tags properly
} else {
    echo "No content found for Employer.";
}
?>
                    <?php
// SQL query to fetch content for 'jobseeker'
$sql = "SELECT about_content FROM about_page_details_tbl WHERE about_for = 'jobseeker'";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the row and decode any HTML entities to render HTML properly
    $row = mysqli_fetch_assoc($result);
    echo html_entity_decode($row['about_content']);  // This will render the HTML tags properly
} else {
    echo "No content found for Jobseeker.";
}
?>
                </div>
            </div>
        </section>


        <!-- <section class="services-section section-padding" id="services-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">We deliver best services</h2>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-person-fill"></i>

                                <h4 class="services-block-title">Job Seekers</h4>
                            </div>

                            <div class="services-block-body">
                                <p align="left">We provide a user-friendly platform where you can explore a vast array of job opportunities across industries and locations. Recruitify has something for everyone. We offer advanced search filters, easy application processes, and helpful resources to guide you on your journey to the perfect job.</p>
                            </div>
                        </div>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12 my-4 my-lg-0 my-md-0">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-lightbulb"></i>
                                <h4 class="services-block-title">Our Mission</h4>
                            </div>

                            <div class="services-block-body">
                                <p align="left" style="margin:0">Our mission is yet profound:<br /> to transform the way people find jobs and companies discover top talents.We aim to make the job search process more efficient, enjoyable & transparent for both job seekers and employers.</p>
                            </div>
                        </div>
                    </div>

                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-building"></i>

                                <h4 class="services-block-title">employers</h4>
                            </div>

                            <div class="services-block-body">
                                <p align="left">Finding the right talent for your organization is critical, and Recruitify is here to simplify the hiring process for you. Use our robust tools to streamline your recruitment efforts. We believe that every business can benefit from hiring the best, and we make that possible.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="reviews-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="text-center mb-5">Happy customers</h2>

                        <div class="owl-carousel owl-theme reviews-carousel">
                            <div class="reviews-thumb">

                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/portrait-charming-middle-aged-attractive-woman-with-blonde-hair.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Susan L</strong>
                                            <small>Product Manager</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/medium-shot-smiley-senior-man.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Jack</strong>
                                            <small>Technical Lead</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">

                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images\avatar\portrait-beautiful-young-woman.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Haley</strong>
                                            <small>Sales & Marketing</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images/avatar/blond-man-happy-expression.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Jackson</strong>
                                            <small>Dev Ops</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>

                            <div class="reviews-thumb">
                                <div class="reviews-info d-flex align-items-center">
                                    <img src="images\avatar\university-study-abroad-lifestyle-concept.jpg" class="avatar-image img-fluid" alt="">

                                    <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                        <p class="mb-0">
                                            <strong>Kevin</strong>
                                            <small>Internship</small>
                                        </p>

                                        <div class="reviews-icons">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-body">
                                    <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                    <h4 class="reviews-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->


        <section class="cta-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10">
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                    </div>

                    <div class="col-lg-4 col-12 ms-auto">
                        <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                            <a href="register.php" class="custom-btn custom-border-btn btn me-4">Create an account</a>
                            <a href="#" class="custom-link">Post a job</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php" ?>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>