<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "home_horizon";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) === FALSE) {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($database);

// Create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS apartments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    price_month VARCHAR(50) NOT NULL,
    area VARCHAR(50) NOT NULL,
    features TEXT,
    images TEXT,
    facing VARCHAR(50),
    type VARCHAR(50),
    bathroom VARCHAR(50),
    available VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    person_name VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(50),
    email VARCHAR(255),
    person_photo VARCHAR(255)
)";
if ($conn->query($sql_create_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have retrieved other form fields like property details
    $property_name = $_POST["property_name"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $price_month = $_POST["price_month"];
    $area = $_POST["area"];
    $features = $_POST["features"];
    $facing = $_POST["facing"];
    $type = $_POST["type"];
    $bathroom = $_POST["bathroom"];
    $available = $_POST["available"];
    $person_name = $_POST["person_name"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];

    // Handling uploaded person photo
    if(isset($_FILES["person_photo"]["name"]) && !empty($_FILES["person_photo"]["name"])) {
        $target_dir = "images/" . $person_name . "/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
        }
        $person_photo_name = $_FILES["person_photo"]["name"];
        $target_file = $target_dir . basename($person_photo_name);
        if(move_uploaded_file($_FILES["person_photo"]["tmp_name"], $target_file)) {
            // If the photo is uploaded successfully, insert its path into the database
            $person_photo_path = $target_file;
        } else {
            echo "Failed to upload person photo!";
            $person_photo_path = ""; // Set empty string if upload fails
        }
    } else {
        echo "No person photo uploaded!";
        $person_photo_path = ""; // Set empty string if no photo uploaded
    }

    // Handling uploaded property images
    $image_paths = [];
    if(isset($_FILES["images"]["name"]) && !empty($_FILES["images"]["name"])) {
        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            $image_name = $_FILES["images"]["name"][$key];
            $target_file = $target_dir . basename($image_name);
            if(move_uploaded_file($tmp_name, $target_file)) {
                $image_paths[] = $target_file; // Store image paths in an array
            } else {
                echo "Failed to upload image " . $image_name . "<br>";
            }
        }
    } else {
        echo "No images uploaded!<br>";
    }

    // Convert array of image paths to comma-separated string
    $image_paths_str = implode(',', $image_paths);

    // Insert data into MySQL database
    $sql = "INSERT INTO apartments (name, location, price, price_month, area, features, images, facing, type, bathroom, available, person_name, address, phone_number, email, person_photo)
            VALUES ('$property_name', '$location', '$price', '$price_month', '$area', '$features', '$image_paths_str', '$facing', '$type', '$bathroom', '$available', '$person_name', '$address', '$phone_number', '$email', '$person_photo_path')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Property details uploaded successfully');</script>";
        // Redirect to apartment.php upon successful upload
        echo "<script>window.location = 'apartment.php';</script>";
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close connection
$conn->close();
?>
