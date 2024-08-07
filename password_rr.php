<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate reset token
        $token = bin2hex(random_bytes(32));
        $token_expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Update user with reset token
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $token_expires, $email);
        $stmt->execute();

        // Send reset email
        // ... (use a library like PHPMailer)

        echo "Password reset link sent to your email.";
    } else {
        echo "Email not found.";
    }

    $stmt->close();
}
?>
