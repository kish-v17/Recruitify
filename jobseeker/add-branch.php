<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Branch</title>

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
                        <h1 class="text-white">Add Branch</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Branch</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section class="contact-section section-padding">
            <div class="container">
                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" enctype="multipart/form-data" id="branch-form" method="post" role="form">
                        <h2 class="text-center mb-4">Branch Details</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="company">Company</label>
                                <select name="company_id" id="company" class="form-control" required>
                                    <option value="">Select Company</option>
                                    <?php
                                        $query = "SELECT Company_Id, Name FROM company_tbl";
                                        $companies = mysqli_query($con, $query);
                                        if ($companies && mysqli_num_rows($companies) > 0) {
                                            while ($company = mysqli_fetch_assoc($companies)) {
                                                echo '<option value="' . $company['Company_Id'] . '">' . $company['Name'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" class="form-control" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" class="form-control" value="India" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" pattern="[0-9]{10,}" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" required></textarea>
                            </div>
                            <div class="col-12 ">
                                <label>
                                    <input type="checkbox" name="is_main" id="is_main" value="1"> Set as Main Branch
                                </label>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" name="add_branch">Add Branch</button>
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

if (isset($_POST['add_branch'])) {
    $company_id = $_POST['company_id'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $is_main = isset($_POST['is_main']) ? 1 : 0;

    $sql = "INSERT INTO branch_tbl (Company_Id, Address, City, State, Country, Phone, Email) 
            VALUES ('$company_id','$address', '$city', '$state', '$country', '$phone', '$email')";
    
    if (mysqli_query($con, $sql)) {
        $branch_id = mysqli_insert_id($con);

        if ($is_main) {
            $update_sql = "UPDATE company_tbl SET Main_Branch_Id = '$branch_id' WHERE Company_Id = '$company_id'";
            mysqli_query($con, $update_sql);
        }

        echo "<script>alert('Branch added successfully'); location.replace('add-experience.php');</script>";
    } else {
        echo "<script>alert('Error adding branch');</script>";
    }
}
?>

</html>
