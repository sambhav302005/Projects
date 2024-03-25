<?php
// Set up your database connection
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "student_resources";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Add proper SQL injection prevention measures here

    // Perform a database query to check the username and password
    $sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User is authenticated, redirect to domain.html
        header('Location: domain.html');
        echo "Login successful"; // Add a success message
        exit;
    } else {
        // Authentication failed, show an error message and redirect back to the login page
        header('Location: login.html?error=1');
        exit;
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
