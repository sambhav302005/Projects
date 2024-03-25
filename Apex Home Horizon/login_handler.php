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

// Get username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the provided username and password exist in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// If the query returns a row, it means the credentials are correct
if ($result->num_rows > 0) {
    // Redirect to index.html
    header("Location: index.html");
    exit();
} else {
    // If the credentials are incorrect, prompt a message
    echo "Incorrect username or password.";
}

// Close the database connection
$conn->close();
?>
