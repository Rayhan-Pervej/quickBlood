
<?php


session_start();


$servername = "localhost";
$username = "root";
$password = ""; 
$database = "quickblood";

$conn = new mysqli($servername, $username, $password, $database);





$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;



$email = $data['email'];
$password = $data['password'];



$sql = "SELECT * FROM userinfo WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    
    // User found, check password
    $row = $result->fetch_assoc();
    if ($password==$row['password']) {
        $_SESSION['userId'] = $row['userId'];
       
        $response = [
            'userType' => $row['userType'],
        ];
        
        echo json_encode($response);
    } else {
        // Incorrect password
        echo json_encode(['error' => 'Incorrect password']);
    }
} else {
    // User not found
    echo json_encode(['error' => 'User not found']);
}


$conn->close();
?>


