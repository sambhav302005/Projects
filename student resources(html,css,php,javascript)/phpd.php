<?php
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "signup";
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $signInUsername = mysqli_real_escape_string($conn, $_POST["signInUsername"]);
    $signInPassword = mysqli_real_escape_string($conn, $_POST["signInPassword"]);
    $signInEmail = mysqli_real_escape_string($conn, $_POST["signInEmail"]);
    $signInAge = mysqli_real_escape_string($conn, $_POST["signInAge"]);

    $sql_query = "INSERT INTO signup (Username, Password, Email, Age) VALUES('$signInUsername', '$signInPassword', '$signInEmail', '$signInAge')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<h1>Inserted successfully!</h1>";
        header('Location: /domain/home/domain.html'); // Redirect to domain.html
        exit;
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>



