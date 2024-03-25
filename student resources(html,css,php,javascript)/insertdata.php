<?php
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "student_resources"; // Change to your database name
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST["Name"]);
    $email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $message = mysqli_real_escape_string($conn, $_POST["Message"]);

    $sql_query = "INSERT INTO contact (Name, Email, Message) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql_query);

    if (!$stmt) {
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h1>Data inserted successfully!</h1>";
            // You can add a redirection or a success message here
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement and the database connection
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>
