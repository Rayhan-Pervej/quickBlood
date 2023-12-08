<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);


$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

// Sample user data
$firstName = $data['firstName'];
$lastName = $data['lastName'];
$userType =$data['userType'];
$bloodType = $data['bloodType'];
$nidNumber = $data['nidNumber'];
$cityName = $data['cityName'];
$presentAddress = $data['presentAddress'];
$userEmail = $data['userEmail'];
$contactNumber = $data['contactNumber'];
$password =$data['password'];

// SQL query to insert data into the table
$sql = "INSERT INTO userinfo (firstName, lastName, userType, bloodType, nidNumber, cityName, presentAddress, email, contactNumber, password)
        VALUES ('$firstName', '$lastName', '$userType', '$bloodType', '$nidNumber', '$cityName', '$presentAddress', '$userEmail', '$contactNumber', '$password')";


// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!-- sign in -->
