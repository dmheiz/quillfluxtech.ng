<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, " . $username . "!";
} else {
    echo '<script>
     window.location.href = "login.php";
     alert("You are not logged in, kindly check your details") 
     </script>';
    $_SESSION = array();
    session_destroy();
    
}
?>
