<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(to right, #FFFFFF, #59769e);
  color: white;
}

.container {
  width: 600px;
  padding: 16px;
  background-color: #3a3a3a;
  margin: 0 auto;
  margin-top: 100px;
  border-radius: 5px;
  box-sizing: border-box;
}

h2 {
  text-align: center;
  font-size: 2.5em;
  font-weight: bold;
  text-shadow: 2px 2px 4px #000000;
  background-color: #004e92;
  color: #ffffff;
  padding: 20px;
  border-radius: 5px;
}

input[type=number], input[type=text], input[type=datetime-local] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 10px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  box-sizing: border-box;
}

input[type=number]:focus, input[type=text]:focus, input[type=datetime-local]:focus {
  background-color: #ddd;
  outline: none;
}

.btn {
  background-color: #004e92;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
<script>
function validateForm() {
    var vehicleid = document.getElementById("vehicleid").value;
    var logid = document.getElementById("logid").value;
    var vehicleinsurance = document.getElementById("vehicleinsurance").value;
    var vehicleowner = document.getElementById("vehicleowner").value;

    var idRegex = /^\d{5}$/;
    var insuranceRegex = /^\d{10}$/;
    var ownerRegex = /^[a-zA-Z\s]+$/;

    if (!idRegex.test(vehicleid)) {
        alert("Vehicle ID should have exactly 5 digits.");
        return false;
    }

    if (!idRegex.test(logid)) {
        alert("Log ID should have exactly 5 digits.");
        return false;
    }

    if (!insuranceRegex.test(vehicleinsurance)) {
        alert("Vehicle Insurance should have exactly 10 digits.");
        return false;
    }

    if (!ownerRegex.test(vehicleowner)) {
        alert("Vehicle Owner name should not contain special characters or numbers.");
        return false;
    }

    return true;
}
</script>
</head>
<body>

<h2>Apartment Management Form</h2>

<div class="container">
  <form action="visitor_log.php" method="post" onsubmit="return validateForm()">
    <label for="vehicleid">Vehicle ID:</label>
    <input type="number" id="vehicleid" name="vehicleid" required>

    <label for="logid">Log ID:</label>
    <input type="number" id="logid" name="logid" required>

    <label for="visittype">Visit Type:</label>
    <input type="text" id="visittype" name="visittype" required>

    <label for="vehiclemake">Vehicle Make:</label>
    <input type="text" id="vehiclemake" name="vehiclemake" required>

    <label for="vehiclemodel">Vehicle Model:</label>
    <input type="text" id="vehiclemodel" name="vehiclemodel" required>

    <label for="vehiclecolor">Vehicle Color:</label>
    <input type="text" id="vehiclecolor" name="vehiclecolor" required>

    <label for="vehiclelicenseplate">Vehicle License Plate:</label>
    <input type="text" id="vehiclelicenseplate" name="vehiclelicenseplate" required>

    <label for="vehicleowner">Vehicle Owner:</label>
    <input type="text" id="vehicleowner" name="vehicleowner" required>

    <label for="vehicleinsurance">Vehicle Insurance:</label>
    <input type="text" id="vehicleinsurance" name="vehicleinsurance" required>

    <label for="vehicleentrytime">Vehicle Entry Time:</label>
    <input type="datetime-local" id="vehicleentrytime" name="vehicleentrytime" required>

    <button type="submit" class="btn">Submit</button>
  </form>
</div>

</body>
</html>


<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "home_horizon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS apartmentmanagementsystem (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicleid INT(5) NOT NULL,
    logid INT(5) NOT NULL,
    visittype VARCHAR(50) NOT NULL,
    vehiclemake VARCHAR(50) NOT NULL,
    vehiclemodel VARCHAR(50) NOT NULL,
    vehiclecolor VARCHAR(50) NOT NULL,
    vehiclelicenseplate VARCHAR(50) NOT NULL,
    vehicleowner VARCHAR(50) NOT NULL,
    vehicleinsurance VARCHAR(10) NOT NULL,
    vehicleentrytime DATETIME NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully or already exists<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

if(isset($_POST["vehicleid"], $_POST["logid"], $_POST["visittype"], $_POST["vehiclemake"], $_POST["vehiclemodel"], $_POST["vehiclecolor"], $_POST["vehiclelicenseplate"], $_POST["vehicleowner"], $_POST["vehicleinsurance"], $_POST["vehicleentrytime"])) {

    $vehicleid = $_POST["vehicleid"];
    $logid = $_POST["logid"];
    $visittype = $_POST["visittype"];
    $vehiclemake = $_POST["vehiclemake"];
    $vehiclemodel = $_POST["vehiclemodel"];
    $vehiclecolor = $_POST["vehiclecolor"];
    $vehiclelicenseplate = $_POST["vehiclelicenseplate"];
    $vehicleowner = $_POST["vehicleowner"];
    $vehicleinsurance = $_POST["vehicleinsurance"];
    $vehicleentrytime = $_POST["vehicleentrytime"];

    $stmt = $conn->prepare("INSERT INTO apartmentmanagementsystem (vehicleid, logid, visittype, vehiclemake, vehiclemodel, vehiclecolor, vehiclelicenseplate, vehicleowner, vehicleinsurance, vehicleentrytime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $vehicleid, $logid, $visittype, $vehiclemake, $vehiclemodel, $vehiclecolor, $vehiclelicenseplate, $vehicleowner, $vehicleinsurance, $vehicleentrytime);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Data uploaded successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
} else {
    echo "Form data not received<br>";
}

$conn->close();
?>

