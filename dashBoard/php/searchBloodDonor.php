
<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;


$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

// Check if required fields are present
if (isset($data['city']) && isset($data['bloodType'])) {
    $city = $data['city'];
    $bloodType = $data['bloodType'];

    // SQL query to fetch data based on city and bloodType
    $sql = "SELECT * FROM userInfo WHERE cityName = '$city' AND bloodType = '$bloodType' AND userType='Donor'";
    $result = $conn->query($sql);

    $dataArray = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataArray[] = $row;
        }
    }

    // Return the data as JSON
    echo json_encode($dataArray);
} else {
    // If required fields are not present, return an error message
    echo json_encode(['error' => 'Missing required fields.']);
}

// Close the database connection
$conn->close();

