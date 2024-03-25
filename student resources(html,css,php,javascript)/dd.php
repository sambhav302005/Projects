<?php
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "1bcab";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    $sql_query = "INSERT INTO registration (name,reg_no,email_id,password)
                  VALUES ('$name','$reg_no','$email_id','$password')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<h1>Student Details inserted successfully !</h1>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
