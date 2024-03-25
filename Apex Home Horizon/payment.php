<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $transactionId = $_POST['transaction'];
    $residentId = $_POST['resident'];
    $email = $_POST['gmail'];
    $flatNo = $_POST['flat'];
    $buildingName = $_POST['building'];
    $societyName = $_POST['society'];
    $contactNo = $_POST['contactNo'];
    $paymentDate = $_POST['date'];
    $paymentMode = $_POST['paymentMode'];
    $amount = $_POST['amount'];
    $feedback = $_POST['feedback'];

    // Create connection to MySQL database
    $conn = new mysqli('localhost:3308', 'root', '', 'home_horizon');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to create table if it doesn't exist
    $create_table_sql = "CREATE TABLE IF NOT EXISTS payments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        transaction_id INT(5) NOT NULL,
        resident_id INT(5) NOT NULL,
        email VARCHAR(50) NOT NULL,
        flat_no INT(5) NOT NULL,
        building_name VARCHAR(50) NOT NULL,
        society_name VARCHAR(50) NOT NULL,
        contact_no VARCHAR(15) NOT NULL,
        payment_date DATE NOT NULL,
        payment_mode VARCHAR(20) NOT NULL,
        amount DECIMAL(10, 2) NOT NULL,
        feedback TEXT,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // Execute table creation query
    if ($conn->query($create_table_sql) === TRUE) {
        // SQL query to insert data into the table
        $insert_sql = "INSERT INTO payments (name, transaction_id, resident_id, email, flat_no, building_name, society_name, contact_no, payment_date, payment_mode, amount, feedback)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($insert_sql);
        if ($stmt === false) {
            die("ERROR: Could not prepare SQL statement.");
        }

        // Bind parameters to the statement
        $stmt->bind_param("isiisississs", $name, $transactionId, $residentId, $email, $flatNo, $buildingName, $societyName, $contactNo, $paymentDate, $paymentMode, $amount, $feedback);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Payment received successfully.";
        } else {
            echo "ERROR: Could not execute SQL statement: $insert_sql. " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "ERROR: Could not create table: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
