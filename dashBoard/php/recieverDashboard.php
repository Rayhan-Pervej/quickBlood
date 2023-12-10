<?php
session_start();


if (!isset($_SESSION['userId'])) {
   
    header('Location:login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bloodrequest WHERE userId = '" . $_SESSION['userId'] . "'";


$result = $conn->query($sql);

$dataArray = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

// Return the data as JSON
echo json_encode($dataArray);
?>
