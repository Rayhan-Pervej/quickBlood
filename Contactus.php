<?php
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$mnumber = $_POST['mnumber'];
$messege = $_POST['messege'];

$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO contactus(fName, lName, email, number, messege) VALUES ('$fName', '$lName', '$email', '$mnumber', '$messege')";

if (mysqli_query($link, $sql)) {
  echo "Message sent Successfully.";
} else {
  echo "Error: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);


?>