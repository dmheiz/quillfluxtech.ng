<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password/reset/QuillFlux</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <div class="form_container">
        <form method="POST" action="password_reset_request.php">
            <div class="input-group">
                <input type="email" name="email" placeholder="Enter your email">
                <label for="email">Enter Your Email</label>
            </div>
            <div class="forgot_links">
                <button type="submit" class="btn">Reset</button>
                <button class="btn"><a href="login.html">Login</a></button>
            </div>
        </form>   
      </div>
<footer>
    <p>&copy; Copyright 2024, all rights reserved. Powered by QuillFlux Technologies</p>
    <p>QuillFluxtechnologies@gmail.com</p>
</footer>      
</body>
</html>