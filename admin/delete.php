<?php
$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contactus WHERE id = $id";
    if (mysqli_query($link, $sql)) {
        // Redirect back to the original page
        echo "<script>window.location.href = 'showmessege.php';</script>";
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
} else {
    echo "Invalid request. No ID specified.";
}

mysqli_close($link);
?>
