<?php
include('connection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate token
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Display password reset form
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "Invalid request.";
}
?>
