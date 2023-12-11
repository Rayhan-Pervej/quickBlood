<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['bankId'])) {
    // Redirect to the login page
    header('Location:login.php');
    exit();
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- google fonts (nunito, dosis) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&family=Nunito:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- external CSS -->
    <link rel="stylesheet" href="styleBloodBank.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <!-- Page name -->
    <title> Blood Bank Dashboard</title>
</head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <img src="img/logo_name.png" class="figure-img img-fluid rounded-circle mt-2" height="45" width="45s">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="bloodbankDashboard.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profileBloodBank.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Update blood storage-->
        <div class="container mt-5">
            <h2>Update Blood Storage</h2>
            <form id="updateBloodForm">
                <div class="form-group">
                    <label for="storageType">Blood Storage Type:</label>
                    <select class="form-control" id="storageType" required>
                        <option value="donate">Recieved Blood</option>
                        <option value="receive">Donated Blood</option>
                    </select>
                </div>
        
                <!-- Form fields for Donate Blood -->
                <div id="donateFields" class="form-fields">
                    <div class="form-group">
                        <label for="donateId">Donation ID:</label>
                        <input type="text" class="form-control" id="donateId" required>
                    </div>
                    <div class="form-group">
                        <label for="donateBloodGroup">Blood Group:</label>
                        <select class="form-control" id="donatedBloodGroup" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="donateBloodQuantity">Blood Quantity:</label>
                        <input type="number" class="form-control" id="donatedBloodQuantity" required>
                    </div>
                    <div class="form-group">
                        <label for="donateDate">Donate Date:</label>
                        <input type="date" class="form-control" id="donatedDate" required>
                    </div>
                </div>
        
                <!-- Form fields for Receive Blood -->
                <div id="receiveFields" class="form-fields">
                    <div class="form-group">
                        <label for="receiverName">Receiver's Name:</label>
                        <input type="text" class="form-control" id="receiverName" required>
                    </div>
                    <div class="form-group">
                        <label for="receiverId">Receiver ID:</label>
                        <input type="text" class="form-control" id="receiverId" required>
                    </div>
                    <div class="form-group">
                        <label for="receiveBloodGroup">Blood Group:</label>
                        <select class="form-control" id="receiveBloodGroup" required>
                            <option value="A">A+</option>
                            <option value="A">A-</option>
                            <option value="B">B+</option>
                            <option value="B">B-</option>
                            <option value="O">O+</option>
                            <option value="O">O-</option>
                            <option value="AB">AB+</option>
                            <option value="AB">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="receiveBloodQuantity">Blood Quantity:</label>
                        <input type="number" class="form-control" id="receiveBloodQuantity" required>
                    </div>
                    <div class="form-group">
                        <label for="receiveDate">Receiving Date:</label>
                        <input type="date" class="form-control" id="receiveDate" required>
                    </div>
                    <div class="form-group">
                        <label for="receiveReason">Reason for Receiving:</label>
                        <input type="text" class="form-control" id="receiveReason" required>
                    </div>
                </div>               
            </form>
            <button type="button" class="btn btn-primary" onclick="updateBloodStorage()">Update Storage</button>
        </div>

        <!--Script for update blood storage option-->
        <script>

       
            document.getElementById('storageType').addEventListener('change', function () {
                const donateFields = document.getElementById('donateFields');
                const receiveFields = document.getElementById('receiveFields');
                const storageType = this.value;
        
                if (storageType === 'donate') {
                    donateFields.style.display = 'block';
                    receiveFields.style.display = 'none';
                } else {
                    donateFields.style.display = 'none';
                    receiveFields.style.display = 'block';
                }
            });
        </script>

        <!-- Optional JavaScript -->
        <script src="script.js"></script>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    </body>

</html>
