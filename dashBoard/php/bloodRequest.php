
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);

$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

// Get form data from POST request
$userId = $_SESSION['userId'];
$requestHeader = $data['requestHeader'];
$requestBloodType = $data['requestBloodType'];
$requestDescription = $data['requestDescription'];
$requestQuantity = $data['requestQuantity'];
$requestHospital = $data['requestHospital'];
$requestCity = $data['requestCity'];
$requestDate = $data['requestDate'];

// Insert data into the database
$sql = "INSERT INTO bloodrequest (userId, requestSubject, requestBloodType, requestDescription, requestQuantity, requestHospital, requestCity, requestDate)
        VALUES ($userId,'$requestHeader', '$requestBloodType', '$requestDescription', $requestQuantity, '$requestHospital', '$requestCity', '$requestDate')";

if ($conn->query($sql) === TRUE) {
    json_encode(['success' => 'Request submitted successfully']);
} else {
json_encode(['error' => 'Error submitting request']);
}

// Close the database connection
$conn->close();
?>