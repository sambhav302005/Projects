<?php
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "1bcab";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $id = $_POST['id']; // Assuming you have an 'id' field for identifying the record to be updated
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    $sql_query = "UPDATE registration SET name='$name', reg_no='$reg_no', email_id='$email_id', password='$password' WHERE id=$id";

    if (mysqli_query($conn, $sql_query)) {
        echo "<h1>Student Details updated successfully!</h1>";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
