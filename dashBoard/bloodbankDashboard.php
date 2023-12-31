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
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspy2">Request Blood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="existingDonor.html">Existing Donor</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspy1"><i class="fa-solid fa-bell"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profileBloodBank.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- bloodBank Information -->

        <!-- Notice banner -->
        <section class="banner mt-5">
            <div class="container bannerCon">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item  active">
                            <h4>"Donate blood, save lives."</h4>
                        </div>
                        <div class="carousel-item">
                            <h4>"Lifesaver: Be a donor."</h4>
                        </div>
                        <div class="carousel-item">
                            <h4>"Gift of life: Donate!"</h4>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!--Storage box-->
        <div class="container container-blood-storage">

            <div class="row justify-content-between">
                <h2>Blood Storages</h2>
                
                <a class="btn btn-info btn-update-storage" href="updateStorage.php" role="button">Update Storage</a>
            </div>

            <div class="row justify-content-center row-blood-storage" id="bloodStorageBox">
        
<!-- 
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="a+">A+</h4>
                        <p>Blood Available</p>
                        <p id="a+Quantity">Total: 5 Bags</p>
                    </div>
                </div>
        

                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="a-">A-</h4>
                        <p>Blood Available</p>
                        <p id="a-Quantity">Total: 5 Bags</p>
                    </div>
                </div>
        
    
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="b+">B+</h4>
                        <p>Blood Available</p>
                        <p id="b+Quantity">Total: 5 Bags</p>
                    </div>
                </div>
        
    
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="b-">B-</h4>
                        <p>Blood Available</p>
                        <p id="b-Quantity">Total: 5 Bags</p>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-center row-blood-storage">
        
    
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="o+">O+</h4>
                        <p>Blood Available</p>
                        <p id="o+Quantity">Total: 5 Bags</p>
                    </div>
                </div>
        
    
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="o-">O-</h4>
                        <p>Blood Available</p>
                        <p id="o-Quantity">Total: 5 Bags</p>
                    </div>
                </div>
        
        
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="ab+">AB+</h4>
                        <p>Blood Available</p>
                        <p id="ab+Quantity">Total: 5 Bags</p>
                    </div>
                </div>

        
                <div class="col-mb-4 box-blood-storage">
                    <div class="p-3 text-center">
                        <h4 id="ab-">AB-</h4>
                        <p>Blood Available</p>
                        <p id="ab-Quantity">Total: 5 Bags</p>
                    </div>
                </div> -->
        
            </div>
        </div>

        <!--Blood request notifictions-->
        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="donationView col-md-8 mb-4">
                    <h2 id="scrollspy1">Blood Request Notifications</h2>
                    <div class="main-container">
        
                        <div id="post-container" class="container">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h4 class="card-title">Urgent A+ Blood Needed</h4>
                                    <p class="card-text"><small class="text-dark">Posted on: December 10, 2023</small></p>
                                    <h6 class="card-title"> Qty: <span>4</span></h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Urgent request for A+ blood. Please contact the requester at 019********.</p>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <div class="commentBtn">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="fa-sharp fa-regular fa-comment" style="color: #ffffff;"></i></button>
        
                                        <div class="dropdown-menu">
                                            <div class="container commentCon">
                                                <div class="">
                                                    <h5>Rayhan</h5>
                                                    <p>Hi, I am available to donate.</p>
                                                </div>
                                            </div>
                                            <div class="container commentCon">
                                                <div class="">
                                                    <h5>Rayhan</h5>
                                                    <p>Hi, I am available to donate.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h4 class="card-title">B- Blood Needed</h4>
                                    <p class="card-text"><small class="text-dark">Posted on: December 9, 2023</small></p>
                                    <h6 class="card-title"> Qty: <span>4</span></h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Emergency request for B- blood. Contact the requester at 017********.</p>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <div class="commentBtn">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="fa-sharp fa-regular fa-comment" style="color: #ffffff;"></i></button>
        
                                        <div class="dropdown-menu">
                                            <div class="container commentCon">
                                                <div class="">
                                                    <h5>Rayhan</h5>
                                                    <p>Hi, I am available to donate.</p>
                                                </div>
                                            </div>
                                            <div class="container commentCon">
                                                <div class="">
                                                    <h5>Rayhan</h5>
                                                    <p>Hi, I am available to donate.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Request blood-->
        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 mb-5">
                    <h2 id="scrollspy2">Requests Blood</h2>
                    <form>
                        <div class="mb-3">
                            <label for="bloodGroup" class="form-label">Blood Group Needed</label>
                            <select class="form-select" id="bloodGroup" required>
                                <option value="" disabled selected>Select the blood group needed</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Request Blood</button>
                    </form>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer class="bg-dark text-light py-4 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>About Us</h5>
                        <p>We connect dedicated blood donors with those in need, fostering a community committed to making a life-saving impact.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Contact Us</h5>
                        <p>Email: info@example.com</p>
                        <p>Phone: 018********</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <a href="#" class="text-light mr-3"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-light mr-3"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fa-brands fa-square-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        
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
