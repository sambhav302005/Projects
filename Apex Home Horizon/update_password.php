<?php
// Database connection parameters
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "home_horizon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['Username'];
$email = $_POST['Email'];
$newPassword = $_POST['NewPassword'];

// SQL query to update password
$sql = "UPDATE users SET password='$newPassword' WHERE username='$username' AND email='$email'";

if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully.";
    // Redirect to signin.html
    header("Location: signin.html");
    exit();
} else {
    echo "Error updating password: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
