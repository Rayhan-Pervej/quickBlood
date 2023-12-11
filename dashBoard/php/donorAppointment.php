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
$appointerFirstName = $data['appointerFirstName'];
$appointerLastName = $data['appointerLastName'];
$appointerContactNumber = $data['appointerContactNumber'];
$appointerBloodType = $data['appointerBloodType'];
$appointerDate = $data['appointerDate'];
$appointerBankId = $data['bankId'];

$sql = "INSERT INTO bloodbankappointment (userId, appointerFirstName, appointerLastName, appointerContactNumber, appointerBloodType, appointerDonationDate, bankId) 
        VALUES ('$userId', '$appointerFirstName', '$appointerLastName', '$appointerContactNumber', '$appointerBloodType', '$appointerDate', '$appointerBankId')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => 'Request submitted successfully']);
} else {
    echo json_encode(['error' => 'Error submitting request']);
}

$conn->close();
?>
