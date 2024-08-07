<?php
include('connection.php');

if (isset($_SESSION['username'])) {
    // User is logged in, fetch dashboard data
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT dashboard_data FROM user_dashboards WHERE user_id = (SELECT id FROM users WHERE username = ?)");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $dashboardData = $row['dashboard_data'];
        // Use dashboardData to reconstruct the dashboard
    } else {
        // Handle case where dashboard data doesn't exist
        // Create a default dashboard or show an empty dashboard
    }
} else {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit;
}
