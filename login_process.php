<?php
include('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Successful login, set session variables and redirect
            $_SESSION['username'] = $username;
            // Add other session variables as needed
            header('Location: homepage.php');
            exit;
        } else {
            // Incorrect password
            echo '<script>
                 window.location.href = "Login.php";
                 alert("Incorrect Password Entered, try again!!!") 
                 </script>';
        }
    } else {
        // Invalid username
        echo '<script>
                 window.location.href = "signup.php";
                 alert("Invalid Username and Password, account does not exist!!!") 
                 </script>';
    }

    $stmt->close();
}
?>

