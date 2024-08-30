<?php
    session_start();
    $_SESSION['login_token'] = bin2hex(random_bytes(32));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Test Guru/CSS/Login.css ">
</head>
<body>
    <div class="main-container">
        <div class="carousel-class">
            <!-- wallpaper carousel -->
             <div id="for-change-image">
                <div id="images-new">
                    <img src="" alt="" srcset="">
                </div>
                <div class="dots-for-images">
                    <div></div>
                </div>
             </div>
        </div>
        <div class="otp-form-maindiv">
            <!-- for sending otp -->

            <div class="otp-signin-form" id="signin-form">
                <div class="otp-signin-box">
                    <p class="login-or-signup">Login or Signup</p>
                    <p class="verify-para">To continue please verify email id</p>
                    <label for="emailId" class="emailId">Please enter your email id</label>
                    <input type="email" name="email" id="emailId" class="input-email" oninput="enableSubmit()" required>
                    
                    <button class="send-otp-btn" id="send-otp-btn" disabled>Send OTP</button>
                </div>
            </div>
            <!-- for sending otp -->

            <!-- for verifying otp -->
                <div id="encrypted_token" style="display: none;"><?php echo htmlspecialchars($_SESSION['login_token'], ENT_QUOTES, 'UTF-8'); ?></div>
                <div class="otp-signin-form" id="verify-otp">
                    <div class="otp-signin-box">
                        <p class="login-or-signup">Login or Signup</p>
                        <p class="verify-para">To continue please verify OTP</p>
                        <label for="emailId" class="emailId">Please enter your OTP</label>
                        <input type="number" name="email" id="otpId" class="input-email" oninput="enableVerify()" required>
                        <button class="submit-otp-btn" id="submit-otp-btn" disabled>Verify OTP</button>
                        <p id="user-id">hello</p>
                    </div>
                </div>
            
            <!-- for verifying otp -->
        </div>
        <!-- end of div -->
    </div>
    <!-- script -->
     <script>
        let encrypted_token = document.querySelector("#encrypted_token").innerHTML;
     </script>
     <script src="/Test Guru/JS/Login.js"></script>
</body>
</html>

    