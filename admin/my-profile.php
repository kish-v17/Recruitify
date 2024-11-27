<?php
include("sidebar.php");

$query = "SELECT Email FROM users_tbl WHERE User_Id = " . $_SESSION['user_id'] . " AND User_Type = 'Admin'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: login.php");
    exit;
}

$user = mysqli_fetch_assoc($result);

    if (isset($_POST['update_email'])) {
        $newEmail = mysqli_real_escape_string($con, $_POST['admin_email']);
        $updateEmailQuery = "UPDATE users_tbl SET Email = '$newEmail' WHERE User_Id = " . $_SESSION['user_id'];
        if (mysqli_query($con, $updateEmailQuery)) 
        {
            $emailUpdateSuccess = "Email updated successfully!";
        } 
        else 
        {
            $emailUpdateError = "Failed to update email. Please try again.";
        }
    } elseif (isset($_POST['update_password'])) {
        $newPassword = mysqli_real_escape_string($con, $_POST['admin_password']);
        $confirmPassword = mysqli_real_escape_string($con, $_POST['confirm_password']);

        if ($newPassword === $confirmPassword) 
        {
            $updatePasswordQuery = "UPDATE users_tbl SET Password = '$newPassword' WHERE User_Id = " . $_SESSION['user_id'];
            if (mysqli_query($con, $updatePasswordQuery)) {
                $passwordUpdateSuccess = "Password updated successfully!";
            } else {
                $passwordUpdateError = "Failed to update password. Please try again.";
            }
        } else {
            $passwordUpdateError = "Passwords do not match.";
        }
    }
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin Settings</li>
        </ol>

        <!-- Admin Email Update Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Email</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($emailUpdateSuccess)) echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>$emailUpdateSuccess</div>"; ?>
                <?php if (!empty($emailUpdateError)) echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>$emailUpdateError</div>"; ?>
                <form action="" method="POST" onsubmit="return validateEmailForm();">
                    <div class="mb-3">
                        <label for="adminEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="adminEmail" name="admin_email" value="<?php echo $user['Email']; ?>" required>
                        <div id="adminEmailError" class="error-message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_email">Update Email</button>
                </form>
            </div>
        </div>

        <!-- Admin Password Update Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Update Password</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($passwordUpdateSuccess)) echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>$passwordUpdateSuccess</div>"; ?>
                <?php if (!empty($passwordUpdateError)) echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>$passwordUpdateError</div>"; ?>
                <form action="" method="POST" onsubmit="return validatePasswordForm();">
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="adminPassword" name="admin_password" required>
                        <div id="adminPasswordError" class="error-message"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                        <div id="confirmPasswordError" class="error-message"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_password">Update Password</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                const alerts = document.querySelectorAll(".alert");
                alerts.forEach(alert => {
                    alert.classList.remove("show");
                    alert.classList.add("fade");
                    setTimeout(() => alert.remove(), 500); // Removes the alert completely after fade-out
                });
            }, 3000);
        });
    </script>
<?php include("footer.php"); ?>
