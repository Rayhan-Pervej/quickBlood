<?php
$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT COUNT(*) as totalRows FROM contactus";
$result = mysqli_query($link, $sql);


if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['totalRows'];
} else {
    echo "Error: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>
