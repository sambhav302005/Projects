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
    $signInUsername = mysqli_real_escape_string($conn, $_POST["Username"]);
    $signInPassword = mysqli_real_escape_string($conn, $_POST["Password"]);
    $signInEmail = mysqli_real_escape_string($conn, $_POST["Email"]);
    $signInAge = mysqli_real_escape_string($conn, $_POST["Age"]);

    $sql_query = "INSERT INTO user (Username, Password, Email, Age) VALUES ('$signInUsername', '$signInPassword', '$signInEmail', '$signInAge')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<h1>Inserted successfully!</h1>";
        // You can redirect to a success page or do further processing here
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
