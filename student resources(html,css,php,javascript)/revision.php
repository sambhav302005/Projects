<?php
$server_name = "localhost:3308";
$username = "root";
$password = "";
$database_name = "1bcab";
$con = mysqli_connect($server_name,$username,$password,$database_name);
if(!$con){
"connection failed".mysqli_connect_error();
}
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    $sql_query = "INSERT INTO registration (name,reg_no,email_id,password)
                  VALUES ('$name','$reg_no','$email_id','$password')";
    if(mysqli_query($con,$sql_query)){
    }
}
