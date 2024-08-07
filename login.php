<?php
session_start();
include("connection.php");

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="240; url=launching.php">
    <title>login-page|QuillFlux|</title>
    <link rel="stylesheet" href="style.css"> 
    
</head>
<body>
   <header class="header_main">
    <h3 class="header_title">QuillFlux Technologies</h3>
   </header>
<section class="main_sec">
    <div class="form_container">
        <h4>Staff Login</h4>
        <form method="POST" action="login_process.php">
            <div class="input_group">
                <input type="text" name="Username" id="Username" placeholder="Username" required>
                <label for="Username" aria-required="true">Username</label><br>
            </div>
            <div class="input_group"> 
                <input type="password" name="Password" id="Password" placeholder="Password" required>
                <label for="Password" aria-required="true">Password</label><br>
            </div>
            <input type="submit" class="btn" value="Login" name="Login"><hr>  
        </form>
        <div class="forgot">
            <p><a href="forgot.php">Forgot Password ?</a></p>      
        </div>
        <div class="forgot_links">
            <P>Don't have an acoount yet? </P>
            <button class="btn" id="Signupbtn"><a href="signup.php">SignUp</a></button>
            </div>
    </div>
</section>


<footer>
    <p>&copy; Copyright <span><?php echo date('Y'); ?></span>, all rights reserved. Powered by QuillFlux Technologies <span id="deploy"><?php echo $currentDateTime; ?></span></p>
    <p>QuillFluxtechnologies@gmail.com</p>
</footer>
<script src="main.js"></script>
</body>
</html>