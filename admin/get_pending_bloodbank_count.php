<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'quickBlood';
$tableName = 'pendingbloodbank';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

$dataArray = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        $dataArray[] = $row;
    }
}

$conn->close();

if (!empty($dataArray)) {
    echo '<h5 class="card-title">' . count($dataArray) . '</h5>';
} else {
    echo '<p>No data available</p>';
}
?>
