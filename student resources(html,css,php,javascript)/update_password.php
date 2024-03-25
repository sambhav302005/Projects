<?php
$server_name = "localhost:3308"; // Change this to your MySQL server address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database_name = "student_resources";

// Create a connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["NewPassword"]);

    // Update the password for the specified username
    $update_query = "UPDATE user SET Password = '$newPassword' WHERE Username = '$username'";

    if (mysqli_query($conn, $update_query)) {
        echo "<h1>Password updated successfully!</h1>";
        // You can redirect to a success page or do further processing here
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
