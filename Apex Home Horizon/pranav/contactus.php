<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Science Fair Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-size: cover;
            background-color:  rgba(130, 174, 209, 0.338);
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .contact-box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            width: 300px;
            box-sizing: border-box;
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }
        .contact-box h1, label {
            text-align: center;
            color: white;
        }
        .contact-box input[type="text"], .contact-box input[type="email"], .contact-box textarea {
            width: 100%;
            padding: 10px 0;
            margin: 10px 0;
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            color: #fff;
            text-align: center;
        }
        .contact-box input[type="submit"] {
            width: 100%;
            padding: 10px 0;
            margin: 10px 0;
            border: none;
            outline: none;
            background: transparent;
            color: #fff;
            cursor: pointer;
            border-radius: 20px;
            text-align: center;
        }
        .contact-box input[type="submit"]:hover {
            background: #0000ff; /* Changes the button color to blue when hovered over */
            color: #fff;
        }
        .logo {
            display: block;
            width: 200px;
            margin: 20px auto;
        }
        .fa {
            padding: 20px;
            font-size: 30px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }
        .fa:hover {
            opacity: 0.7;
        }
        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .fa-youtube {
            background: #bb0000;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }
    </style>
</head>
<body>
    <div class="contact-box">
        <a href="homepage.html">
            <img class="logo" src="abcd.png" alt="Logo">
        </a>
        <h1>CONTACT US</h1>

        <form method="post" action="contactus.php">
            <label for="name">Enter Name:</label>
            <input type="text" id="name" name="name" value="">

            <label for="email">Enter Email:</label>
            <input type="email" id="email" name="email" value="">

            <label for="message">Enter Message:</label>
            <textarea id="message" name="message"></textarea>

            <input type="submit" name="submit" value="SUBMIT">
        </form>
    </div>
    <div>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Create connection
        $conn = new mysqli('localhost:3308', 'root', '', 'home_horizon');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL to create table if it doesn't exist
        $sql_create_table = "CREATE TABLE IF NOT EXISTS contactus (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            message TEXT NOT NULL
        )";

        if ($conn->query($sql_create_table) === TRUE) {
            echo "Table created successfully or already exists<br>";
        } else {
            echo "Error creating table: " . $conn->error . "<br>";
        }

        $sql = "INSERT INTO contactus (name, email, message) VALUES (?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("ERROR: Could not prepare SQL statement.");
        }

        // Bind parameters
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute statement
        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "ERROR: Could not execute SQL statement: $sql. " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
