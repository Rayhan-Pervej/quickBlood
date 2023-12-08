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


$userId = $_SESSION['userId'];


$userCityQuery = "SELECT cityName FROM userInfo WHERE userId = '$userId'";
$userCityResult = $conn->query($userCityQuery);

if ($userCityResult->num_rows > 0) {
    $userCityRow = $userCityResult->fetch_assoc();
    $userCity = $userCityRow['cityName'];


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

  
    $conn->close();


    echo json_encode($dataArray);
} else {
    echo "User city not found";
    $conn->close();
}
?>
