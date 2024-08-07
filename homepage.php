<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="120; url='launching.php' ">
    <title>Dashboard|QuillFlux</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
   <header class="header_main">
   <div><a href="logout.php" class="logout">LOGOUT</a></div>
    <h3 class="header_title">QuillFlux Technologies <br> <span><?php include 'checklogin.php' ?></span></h3>
   </header>
   <div class="greeting">
     <h3  id="greeting" class="welcome"></h3>
     <p></p>
   </div>

<section class="main_sec">
    <div class="form_container">
        <h4>Menu Selector</h4>
            <table>
                <tr>
                  <td>Option 1</td>
                  <td style="width: 60px;"><input type="number" name="option1"></td>
                </tr>
                <tr>
                  <td>Option 2</td>
                  <td><input type="number" name="option2"></td>
                </tr>
            </table>
    </div>
</section>
  

<script src="js/main.js"></script>
<footer>
    <p>&copy; Copyright 2024, all rights reserved. Powered by QuillFlux Technologies</p>
    <p>QuillFluxtechnologies@gmail.com</p>
</footer>
</body>
</html>