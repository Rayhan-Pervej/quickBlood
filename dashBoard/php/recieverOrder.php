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

$userId = $_SESSION['userId'];
$recieverFirstName = $data['recieverFirstName'];
$recieverLastName = $data['recieverLastName'];
$recieverContactNumber = $data['recieverContactNumber'];
$recieverBloodType = $data['recieverBloodType'];
$recieverQuantity = $data['recieverQuantity'];
$recieverReason = $data['recieverReason'];
$BankId = $data['bankId'];

$sql = "INSERT INTO bloodOrder (userId, recieverFirstName, recieverLastName, recieverContactNumber, recieverBloodType, recieverQuantity, recieverReason, bankId, recieverOrderStatus)
VALUES ('$userId', '$recieverFirstName', '$recieverLastName', '$recieverContactNumber', '$recieverBloodType', '$recieverQuantity', '$recieverReason', '$BankId','pending')
";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => 'Request submitted successfully']);
} else {
    echo json_encode(['error' => 'Error submitting request']);
}

$conn->close();
?>
