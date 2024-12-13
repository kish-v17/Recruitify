<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Profile</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">

    <link href="../css/owl.carousel.min.css" rel="stylesheet">

    <link href="../css/owl.theme.default.min.css" rel="stylesheet">

    <link href="tooplate-Recruitify-job.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />

    <style>
        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }
    </style>
</head>

<body>
    <main>
        <header class="text-center py-4">
            <h1>Update Profile</h1>
        </header>

        <?php
        // Database connection
        include 'db_connection.php';
        session_start();

        if ($_SESSION['user_id']) {
            $sql = "SELECT * FROM users_tbl WHERE User_Id=" . $_SESSION['user_id'];
            $data = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($data);
        ?>

        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <form class="custom-form" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $result['Name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $result['Email'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $result['Mobile'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?= $result['DOB'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Male" <?= $result['Gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $result['Gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $result['Gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile" name="profile">
                        </div>

                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-select" id="company" name="company" required>
                                <option value="">Select Company</option>
                                <?php
                                $company_query = "SELECT * FROM company_tbl";
                                $company_data = mysqli_query($con, $company_query);
                                while ($company = mysqli_fetch_array($company_data)) {
                                    echo "<option value='{$company['Company_Id']}'";
                                    if ($result['Company_Id'] == $company['Company_Id']) {
                                        echo " selected";
                                    }
                                    echo ">{$company['Name']}</option>";
                                }
                                ?>
                            </select>
                            <a href="add_company.php" class="btn btn-link">Add Company</a>
                        </div>

                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <select class="form-select" id="branch" name="branch" required>
                                <option value="">Select Branch</option>
                                <?php
                                $branch_query = "SELECT * FROM branch_tbl";
                                $branch_data = mysqli_query($con, $branch_query);
                                while ($branch = mysqli_fetch_array($branch_data)) {
                                    echo "<option value='{$branch['Branch_Id']}'";
                                    if ($result['Branch_Id'] == $branch['Branch_Id']) {
                                        echo " selected";
                                    }
                                    echo ">{$branch['City']}, {$branch['State']}</option>";
                                }
                                ?>
                            </select>
                            <a href="add_branch.php" class="btn btn-link">Add Branch</a>
                        </div>

                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
                </div>
            </div>
        </section>

        <?php } ?>

    </main>
</body>

</html>
