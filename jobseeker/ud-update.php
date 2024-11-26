<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Details</title>

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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    <style>
        input[type="file"]::file-selector-button {
            border-radius: 500px;
        }

        label {
            font-weight: bold;
            font-size: 17px
        }

        .services-block {
            border-top: 25px solid transparent;
            border-radius: var(--border-radius-medium);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.5s;
            padding: 40px;
        }

        .services-block:hover,
        .services-section .services-block-wrap .services-block {
            background: var(--section-bg-color);
            border-top-color: var(--secondary-color);
        }

        .services-block-icon {
            background: var(--white-color);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
            border-radius: var(--border-radius-large);
            display: block;
            color: var(--secondary-color);
            font-size: var(--h2-font-size);
            line-height: normal;
            width: 120px;
            height: 120px;
            line-height: 135px;
            margin: auto;
            margin-bottom: 24px;
            text-align: center;
            position: relative;
            transition: all 0.5s;
        }

        .services-block-body p {
            margin-bottom: 0;
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
                        <h1 class="text-white">Update Details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Update Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section class="services-section section-padding" id="services-section">
            <div class="container">
                <div class="row">

                    <!-- <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Update User Details</h2>
                    </div> -->

                    <!-- <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap" >
                                <i class="services-block-icon bi-person-circle" style="font-size:70px;"></i>

                                <h4 class="services-block-title">Personal Details</h4>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <?php
        if ($_SESSION['user_id']) {
            $skills = [];
            $sql = "SELECT Skill_Id, Skill_Name FROM skills_tbl";
            $result_skills = mysqli_query($con, $sql);
            if ($result_skills && mysqli_num_rows($result_skills) > 0) {
                while ($row = mysqli_fetch_assoc($result_skills)) {
                    $skills[] = $row;
                }
            }
            $sql = "select * from Users_tbl U where U.User_Id='$_SESSION[user_id]'";
            $data = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($data);

            switch ($result['Gender']) {
                case 'Male':
                    $ck1 = 'checked';
                    $ck2 = '';
                    $ck3 = '';
                    break;
                case 'Female':
                    $ck1 = '';
                    $ck2 = 'checked';
                    $ck3 = '';
                    break;
                case 'Other':
                    $ck1 = '';
                    $ck2 = '';
                    $ck3 = 'checked';
                    break;
            }
        ?>

            <section class="contact-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form class="custom-form contact-form" method="post" role="form" id="personal" style="padding:0 0 50px 0;">
                                <h2 class="text-center mb-4">Update User Details</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="first-name">Full Name</label>

                                        <input type="text" name="full-name" id="full-name" class="form-control" value="<?php echo $result['Name']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="email">Email Address</label>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" value="<?php echo $result['Email']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="dob">Date of Birth</label>

                                        <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $result['DOB']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="gender">Gender</label>
                                        <div class="form-control">
                                            <label><input type="radio" name="gender" id="gender" value="Male" <?php echo $ck1; ?> /> Male &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Female" <?php echo $ck2; ?> /> Female &emsp;</label>
                                            <label><input type="radio" name="gender" id="gender" value="Other" <?php echo $ck3; ?> /> Other</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="mobile" style="display:block">Mobile</label>

                                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo $result['Mobile']; ?>" pattern={0-9}[10]>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">City</label>

                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $result['City']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="city">State</label>

                                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $result['State']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="country">Country</label>

                                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $result['Country']; ?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="skills">Skills</label>
                                        <select name="skills" id="skills-dropdown" class="form-control">
                                            <option value="" selected disabled>-- Select Skill --</option>
                                            <?php foreach ($skills as $skill) { ?>
                                                <option value="<?php echo $skill['Skill_Id']; ?>" 
                                                    <?php echo (isset($result['Skill_Id']) && $result['Skill_Id'] == $skill['Skill_Id']) ? 'selected' : ''; ?>>
                                                    <?php echo $skill['Skill_Name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12 mt-3">
                                        <label>Selected Skills</label>
                                        <div id="skills-container" class="p-3 border rounded" style="min-height: 50px; background: #f9f9f9;">
                                            <!-- Selected skills will appear here -->
                                        </div>
                                    </div>

                                    <input type="hidden" name="selected_skills" id="selected-skills" value="">

                                    <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="pup">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/index.js"></script>
    <script>
    const skillsDropdown = document.getElementById('skills-dropdown');
    const skillsContainer = document.getElementById('skills-container');
    const selectedSkillsInput = document.getElementById('selected-skills');

    // Helper to update hidden input
    const updateSelectedSkillsInput = () => {
        const selectedSkills = Array.from(skillsContainer.querySelectorAll('.skill-item')).map(item => item.dataset.skillId);
        selectedSkillsInput.value = selectedSkills.join(',');
    };

    // Add skill to the container
    skillsDropdown.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const skillId = selectedOption.value;
        const skillName = selectedOption.text;

        if (!skillId) return; // Ignore if no skill is selected

        // Create a new skill item
        const skillItem = document.createElement('span');
        skillItem.className = 'skill-item badge bg-primary text-white me-2 p-2 rounded';
        skillItem.dataset.skillId = skillId;
        skillItem.innerHTML = `${skillName} <span class="remove-skill" style="cursor: pointer;">&times;</span>`;

        // Add skill item to the container
        skillsContainer.appendChild(skillItem);

        // Remove the option from the dropdown
        this.remove(this.selectedIndex);

        // Update hidden input
        updateSelectedSkillsInput();
    });

    // Remove skill from the container
    skillsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-skill')) {
            const skillItem = e.target.parentElement;
            const skillId = skillItem.dataset.skillId;
            const skillName = skillItem.textContent.trim().slice(0, -1); // Remove close icon from the name

            // Add skill back to the dropdown
            const option = document.createElement('option');
            option.value = skillId;
            option.textContent = skillName;
            skillsDropdown.appendChild(option);

            // Remove the skill item from the container
            skillsContainer.removeChild(skillItem);

            // Update hidden input
            updateSelectedSkillsInput();
        }
    });
</script>
</body>
<?php
include 'footer.php';
//error_reporting(0);
// ();

if (isset($_POST['pup'])) {

    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $mob = $_POST['mobile'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $selected_skills = isset($_POST['selected_skills']) ? $_POST['selected_skills'] : '';
    $skills_array = explode(',', $selected_skills);
    $user_id = $_SESSION["user_id"];
    $sql = "delete from user_skills_tbl where User_Id = $user_id";
    $result = mysqli_query($con, $sql);
    if(!$result){
        echo "Error in removing skills of the logged in user";
    }
    foreach ($skills_array as $skill_id) {
        $sql = "INSERT INTO user_skills_tbl (User_Id, Skill_Id) VALUES ('$user_id', '$skill_id')";
        $result = mysqli_query($con, $sql);
    
        if (!$result) {
            echo "Error inserting skill ID $skill_id: " . mysqli_error($con);
        }
    }

    $sql = "update Users_tbl set Name='$name', Email='$email', DOB='$dob', Gender='$gender', City='$city', State='$state', Country='$country', Mobile='$mob' where User_Id='$_SESSION[user_id]'";
    $data = mysqli_query($con, $sql);
    if ($data) {
        echo "<script> alert('Information Updated'); location.replace('profile.php');</script>";
    } else {
        echo "errorrr";
    }
}

?>

</html>