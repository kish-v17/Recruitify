<?php
include_once("navbar.php");
?>
<main>
    <header class="site-header">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">OTP Verification</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Verify OTP</li>
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
                    <form class="custom-form contact-form" method="post" role="form" action="verify-otp.php">
                        <h2 class="text-center mb-4">Verify OTP</h2>

                        <div class="col-lg-12 col-12">
                            <label for="password">Enter the OTP<font>*</font></label>
                            <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter the OTP we sent you in email">
                        </div>

                        <div class="col-lg-4 col-md-4 col-6 mx-auto">
                            <input type="submit" name="verify" class="form-control" style="background-color:#5d52ba;color:white" value="Verify" />
                        </div>
                    </form>
                    <form id="resend">
                        <div class="mt-4 text-center">
                            <button type="submit" name="resend_otp" id="resend_otp" style="display:none;background:none;border:none;">Resend OTP</button>
                            <div id="timer" class="text-danger"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
<script>
    let timeLeft = <?php
                    $time = $_SESSION['otp_expiration'] - time();
                    echo $time <= 0 ? 0 : $time;
                    ?>;

    const timerDisplay = document.getElementById('timer');
    const resendButton = document.getElementById('resend_otp');

    function startCountdown() {
        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerDisplay.innerHTML = "You can now resend the OTP.";
                resendButton.style.display = "inline";
            } else {
                timerDisplay.innerHTML = `Resend OTP in ${timeLeft} seconds`;
                timeLeft -= 1;
            }
        }, 1000);
    }

    startCountdown();

    resendButton.onclick = function(event) {
        event.preventDefault();
        window.location.href = 'resend-otp.php';
    };
</script>

</html>