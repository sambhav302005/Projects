<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $age = $_POST['Age'];

    // Create connection to MySQL database
    $conn = new mysqli('localhost:3308', 'root', '', 'home_horizon');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to create table if it doesn't exist
    $sql_create_table = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        age INT(3) NOT NULL
    )";

    // Execute table creation query
    if ($conn->query($sql_create_table) === TRUE) {
        echo "<br>";
    } else {
        echo "" . $conn->error . "<br>";
    }

    // SQL query to insert data into the table
    $sql = "INSERT INTO users (username, password, email, age) VALUES (?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("ERROR: Could not prepare SQL statement.");
    }

    // Bind parameters to the statement
    $stmt->bind_param("sssi", $username, $password, $email, $age);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "ERROR: Could not execute SQL statement: $sql. " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
