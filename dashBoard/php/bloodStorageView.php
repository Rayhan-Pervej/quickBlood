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


$userId = $_SESSION['bankId'];





    $bloodRequestQuery = "SELECT abb.bankId, abb.bankName, abb.bankCityName, abb.bankAddress, abb.bankNumber, bs.bloodType, SUM(bs.bloodQuantity) AS totalQuantity
                        FROM approvedBloodBank AS abb JOIN bloodstore AS bs ON abb.bankId = bs.bankId
                        WHERE abb.bankId = '$userId'
                        GROUP BY
                            abb.bankId,
                            abb.bankName,
                            abb.bankCityName,
                            abb.bankAddress,
                            bs.bloodType";
    $result = $conn->query($bloodRequestQuery);

    $dataArray = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bankId = $row['bankId'];
            $bankName = $row['bankName'];
            $bankCityName = $row['bankCityName'];
            $bankAddress = $row['bankAddress'];
            $bankNumber = $row['bankNumber'];
            $bloodType = $row['bloodType'];
            $totalQuantity = $row['totalQuantity'];
    
            // dataArray based on bankId
            $dataArray[$bankId]['bankId'] = $bankId;
            $dataArray[$bankId]['bankName'] = $bankName;
            $dataArray[$bankId]['bankCityName'] = $bankCityName;
            $dataArray[$bankId]['bankAddress'] = $bankAddress;
            $dataArray[$bankId]['bankNumber'] = $bankNumber;
            $dataArray[$bankId]['bloodData'][] = ['bloodType' => $bloodType, 'totalQuantity' => $totalQuantity];
        }
        echo json_encode($dataArray);
    }
    
 else {
    echo "User city not found";
   
}

$conn->close();
?>
