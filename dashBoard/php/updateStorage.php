<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

$bankId= $_SESSION['bankId'];
$userId = $data['donateId'];
$bloodType = $data['donatedBloodGroup'];
$bloodQuantity = $data['donatedBloodQuantity'];
$donateDate = $data['donatedDate'];

$sql = "INSERT INTO bloodStore (bankId, userId, bloodType, bloodQuantity, donateDate) 
        VALUES ('$bankId', '$userId', '$bloodType', '$bloodQuantity', '$donateDate')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => 'Request submitted successfully']);
} else {
    echo json_encode(['error' => 'Error submitting request']);
}

$conn->close();
?>