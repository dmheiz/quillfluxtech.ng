<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="240; url=launching.php">
    <title>Signup-page|QuillFlux</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header_main">
        <h3 class="header_title">QuillFlux Technologies</h3>
       </header>
<section class="main_sec">
    <div class="form_container">
        <h4>Signup</h4>
        <form method="post" action="signup_process.php">
            <div class="input_group">
                <input type="text" name="Username" id="Username" placeholder="Username" required>
                <label for="Username" aria-required="true">Username</label><br>
            </div>
            <div class="input_group"> 
                <input type="password" name="Password" id="Password" placeholder="Password" required>
                <label for="Password" aria-required="true">Password</label><br>
            </div>
            <input type="submit" class="btn" value="SignUp" name="signup"><hr>
            <div class="forgot_links">
            <P>Already have an acoount? </P>
            <button class="btn" id="Loginbtn"><a href="login.php">Login</a></button>
            </div>
        </form>
    </div>
</section>
<footer>
    <p>&copy; Copyright 2024, all rights reserved. Powered by QuillFlux Technologies</p>
    <p>QuillFluxtechnologies@gmail.com</p>
</footer>
</body>
</html>
