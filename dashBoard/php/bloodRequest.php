<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's ID from the session
$userId = $_SESSION['userId'];

// SQL query to find the donor's city based on userId
$userCityQuery = "SELECT cityName FROM userInfo WHERE userId = '$userId'";
$userCityResult = $conn->query($userCityQuery);

if ($userCityResult->num_rows > 0) {
    $userCityRow = $userCityResult->fetch_assoc();
    $userCity = $userCityRow['cityName'];

    // SQL query to fetch blood requests based on donor's city
    $bloodRequestQuery = "SELECT * FROM bloodrequest WHERE requestCity = '$userCity'";
    $bloodRequestResult = $conn->query($bloodRequestQuery);

    $dataArray = [];

    if ($bloodRequestResult->num_rows > 0) {
        while ($row = $bloodRequestResult->fetch_assoc()) {
            $dataArray[] = $row;
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();

    // Return the data as JSON
    echo json_encode($dataArray);
} else {
    echo "User city not found";
    $conn->close();
}
?>
