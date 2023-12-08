<?php
$link = mysqli_connect("localhost", "root", "", "quickblood");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contactus WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: Could not able to execute $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fName" value="<?php echo $row['fName']; ?>">

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lName" value="<?php echo $row['lName']; ?>">
        
        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
        
        <label for="number">Number:</label>
        <input type="text" id="number" name="mnumber" value="<?php echo $row['number']; ?>">
        

        <input type="submit" value="Update">
    </form>
</body>
</html>
