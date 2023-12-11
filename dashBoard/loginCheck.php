
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



$userSql = "SELECT * FROM userinfo WHERE email = '$email' AND password = '$password'";
$bankSql = "SELECT * FROM approvedBloodBank WHERE bankEmail = '$email' AND bankPassword = '$password'";
$userResult = $conn-> query($userSql);
$bankResult = $conn ->query($bankSql);


if ($userResult->num_rows == 1) {
    
    // User found, check password
    $row = $userResult->fetch_assoc();
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
}
else if($bankResult->num_rows ==1) {


    $row = $bankResult -> fetch_assoc();
    if ($password == $row['bankPassword']){
        $_SESSION['bankId'] = $row['bankId'];

        $response = 'bloodBank';
        echo json_encode($response);
    }
    else {
        // Incorrect password
        echo json_encode(['error' => 'Incorrect password']);
    }
   
}


else {
     // User not found
     echo json_encode(['error' => 'User not found']);
}


$conn->close();
?>


