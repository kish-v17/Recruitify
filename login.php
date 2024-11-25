<?php
include_once("navbar.php");
?>
<main>
    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Log in</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Log in</li>
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
                    <form class="custom-form contact-form" method="post" role="form">
                        <h2 class="text-center mb-4">Welcome Back</h2>
                        <div class="col-lg-12 col-12">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="col-lg-12 col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="Password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="col-lg-4 col-md-4 col-6 mx-auto">
                            <button type="submit" name="submit" class="form-control">Log in</button>
                        </div>
                        <br />
                        <h5 style="text-align:center;">Don't have an account??&nbsp;<u><a href="register.php"> Sign up</a></u></h5>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
<?php include 'footer.php';
include 'db-connect.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "select * from User_tbl where U_Email='$email' and U_password='$pass' ";
    $data = mysqli_query($con, $sql);
    if (mysqli_num_rows($data)) {
        $result = mysqli_fetch_array($data);
        $_SESSION["user__id"] = $result['U_Id'];

        if ($result['U_Type_Id'] == 1) //admin
        {
            echo "<script>location.replace('admin');</script>";
        } else if ($result['U_Type_Id'] == 2) {
            echo "<script>location.replace('jobseeker');</script>";
        } else {
            echo "<script>location.replace('employer');</script>";
        }
    } else
        echo "<script>alert('incorrect details');</script>";
}
?>