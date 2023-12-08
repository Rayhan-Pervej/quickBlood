<?php
$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM contactus";
$result = mysqli_query($link, $sql);

echo '<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>';

if ($result) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Number</th><th>Message</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['fName'] . "</td>";
        echo "<td>" . $row['lName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['number'] . "</td>";
        echo "<td>" . $row['messege'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
} else {
    echo "Error: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
