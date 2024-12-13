<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Company</title>

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
    <link rel="stylesheet" href="css/style.css">

    <style>
        label {
            font-weight: bold;
            font-size: 17px;
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
                        <h1 class="text-white">Add Company</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Company</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section class="contact-section section-padding">
            <div class="container">
                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" enctype="multipart/form-data" id="company-form" method="post" role="form">
                        <h2 class="text-center mb-4">Company Details</h2>
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Company Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="business_stream">Business Stream</label>
                                <input type="text" name="business_stream" id="business_stream" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="establishment_year">Establishment Year</label>
                                <input type="number" name="establishment_year" id="establishment_year" class="form-control" min="1900" max="<?php echo date('Y'); ?>" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" pattern="[0-9]{10,}" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="add_company">Add Company</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

</body>

<?php
include 'footer.php';

if (isset($_POST['add_company'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $business_stream = $_POST['business_stream'];
    $establishment_year = $_POST['establishment_year'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $posted_by = $_SESSION['user_id'];
    $ip = "../images/logos/";
    $ip2 = "images/logos/";


    $logo = $ip . basename($_FILES['logo']['name']);
    $logo2 = $ip2 . basename($_FILES['logo']['name']);
    move_uploaded_file($_FILES['logo']['tmp_name'], $logo);

    // Insert company details into company_tbl
    $sql = "INSERT INTO company_tbl (Posted_by, Name, Description, Business_Stream, Establishment_Year, Website, Phone, Email, Logo, Main_Branch_Id) 
            VALUES ('$posted_by', '$name', '$description', '$business_stream', '$establishment_year', '$website', '$phone', '$email', '$logo2', NULL)";
    
    if (mysqli_query($con, $sql)) {
        // Get the ID of the newly inserted company
        $company_id = mysqli_insert_id($con);

        // Update the Company_Id in users_tbl for the current user
        $update_sql = "UPDATE users_tbl 
                       SET Company_Id='$company_id' 
                       WHERE User_Id='$posted_by'";
        
        if (mysqli_query($con, $update_sql)) {
            echo "<script>alert('Company added and linked successfully'); location.replace('profile.php');</script>";
        } else {
            echo "<script>alert('Error linking company to user');</script>";
        }
    } else {
        echo "<script>alert('Error adding company');</script>";
    }
}
?>


</html>
