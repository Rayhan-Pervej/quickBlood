<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'quickBlood';
$tableName = 'pendingbloodbank';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

$dataArray = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $dataArray[] = $row;
    }
}

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Fetch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
        }

        h2 {
            color: bla;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data from Database</h2>
    <?php
        if (!empty($dataArray)) {
            echo '<table>';
            echo '<tr>';
            foreach ($dataArray[0] as $key => $value) {
                echo '<th>' . $key . '</th>';
            }
            echo '<th>Approve</th>';
            echo '<th>Delete</th>';
            echo '</tr>';
            foreach ($dataArray as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '<td><button>Approve</button></td>';
                echo '<td><button>Delete</button></td>';

                
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No data available</p>';
        }
    ?>
</body>
</html>
