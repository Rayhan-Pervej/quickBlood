<?php
$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $mnumber = $_POST['mnumber'];


    $sql = "UPDATE contactus SET fName='$fName', lName='$lName',email='$email', number='$mnumber' WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        header("Location:showmessege.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}

mysqli_close($link);
?>
