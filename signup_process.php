<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];


    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script>
                 window.location.href = "Login.php";
                 alert("Signup Failed!!! User already exists Kindly Login") 
                 </script>';
        
    }else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>
                 window.location.href = "Login.php";
                 alert("Registration Successful!!! redirecting to the login page...") 
                 </script>';
            exit;
        } else {
            echo "Registration failed.";
        }
    }
    $stmt->close();
}
?>
