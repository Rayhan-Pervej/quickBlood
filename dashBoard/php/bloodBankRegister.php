<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);


$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

$bankName = $data['bankName'];
$regId = $data['regId'];
$licenceNumber = $data['licenceNumber'];
$bankCityName = $data['bankCityName'];
$bankAddress = $data['bankAddress'];
$bankEmail = $data['bankEmail'];
$bankNumber = $data['bankNumber'];


$sql = "INSERT INTO pendingBloodBank (bankName, regId, licenceNumber, bankCityName, bankAddress, bankEmail, bankNumber) VALUES ('$bankName', '$regId', '$licenceNumber', '$bankCityName', '$bankAddress', '$bankEmail','$bankNumber');";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
