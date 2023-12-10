<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['userId'])) {
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
    <link rel="stylesheet" href="style.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <!-- Page name -->
    <title>Dashboard</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
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
                    <a class="nav-link" href="#navbloodrequest">Blood Request</a>
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#navCheckBloodBank">Check Blood Bank</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#"> Profile </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- user banner -->

    <section class="donorBanner">
        <div class="mx-3 mt-3">
            <div class="profile d-flex justify-content-between flex-row align-items-center">

                <div class=" figure msgAlert dropdown">
                    <a class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="tree"
                        aria-expanded="false"><i class="fa-solid fa-bell fa-2xl" style="color: #ff0000;"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    </div>
                </div>

                <div class="donationInfo text-center">
                    <div class="totalDonate">
                        <h5>Total Donate: <span>4</span></h5>
                    </div>
                    <div class="lastTimeBloodDonate">
                        <h5>Last Time Donate: <span>20/8/2023</span></h5>
                    </div>
                </div>

                <div class=" figure profileImg">
                    <img src="img/logo.png" class="figure-img img-fluid rounded-circle" height="64" width="64">
                </div>

            </div>
        </div>
    </section>

    <!-- Notice banner -->

    <section class="banner mt-5">
        <div class="container bannerCon">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item  active">
                        <h4>"Give the gift that keeps on giving—donate blood, save lives. Be a lifeline, not a
                            bystander."</h4>
                    </div>
                    <div class="carousel-item">
                        <h4>"Be a hero in the truest sense—donate blood and be the heartbeat of compassion."</h4>
                    </div>
                    <div class="carousel-item">
                        <h4>"Every drop counts, every donor matters. Join the life-saving journey, be a blood donor
                            today."</h4>
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

    <!-- Section blood-->

    <section class=" container mt-5">

        <div class="row">
            <div id="navbloodrequest" class="donationView col-md-6 col-lg-4 col-12 mb-5">
                <h2>Blood Request</h2>
                <div class="main-container">
                    <!-- Your fixed main container content goes here -->

                    <div id="donorPostViewer" class="container pt-4">
                        <!-- Dynamic post cards go here -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Urgent Blood Need</h4>
                                <h6 class="card-title">20/12/2023</h6>
                                <h6 class="card-title"> Qty: <span>4</span></h6>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Hi need blood in bashundhara. I need 2 bag blood.</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <div class="commentBtn">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i
                                            class="fa-sharp fa-regular fa-comment" style="color: #ffffff;"></i></button>

                                    <div class="dropdown-menu">
                                        <div class="container commentCon">
                                            <div class="">
                                                <h5>Rayhan</h5>
                                                <p>Hi i am avaialbe to donate.</p>
                                            </div>
                                        </div>
                                        <div class="container commentCon">
                                            <div class="">
                                                <h5>Rayhan</h5>
                                                <p>Hi i am avaialbe to donate.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Repeat the above card structure for each post -->

                    </div>
                </div>
            </div>


            <!-- location search -->
            
            <div class="searchBloodBank col-md-6 col-lg-6" id="navCheckBloodBank">
                <div class="container SearchBox">
                    <form class="mb-3">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1"> <h3>Check Blood Bank </h3></label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder=" Dhaka">
                        </div>
        
                        <button type="submit" class="btn btn-primary">search</button>
                    </form>
                </div>
                <div class="main-container">
                    <!-- Your fixed main container content goes here -->

                    <div id="bloodBankView" class="container pt-4">
                        <!-- Dynamic post cards go here -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="card-title text-center">Dhaka Blood Bank</h4>
                                <p class="card-title"> c block, bashundhara, dhaka</p>
                                
                            </div>
                            <div class="card-body">
                                <h4>Blood Avaialbe:</h4>
                                <ul>
                                    <li>A+ : <span> 35</span> bag</li>
                                    <li>B+ : <span> 200</span> bag</li>
                                    <li>AB- : <span> 20</span> bag</li>
                                </ul>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                
                                <button type="submit" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Make an Appoinment</button>

                                <div class="dropdown-menu">

                                    <form >
                                        <div>
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" id="appointerFirstName">
                                        </div>
                                        <div>
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" id="appointerLastName">
                                        </div>
                                        <div>
                                            <label for="">Mobile Number</label>
                                            <input type="text" class="form-control" id="appointerContactNumber">
                                        </div>
                                        <div>
                                            <label for="">Blood Type</label>
                                            <input type="text" class="form-control" placeHolder="" id="appointerBloodType">
                                        </div>
                                        <div>
                                            <label for="">Date of Blood Donation</label>
                                            <input type="date" class="form-control" id="appointerDate">
                                        </div>
                                    </form>

                                    <button class="text-center mt-3 btn btn-primary" onclick=bloodBankAppointment()> Submit</button>

                                </div>
                                

                            </div>
                        </div>
                        <!-- Repeat the above card structure for each post -->

                    </div>
                </div>
            </div>
        </div> 
    </section>


    <!-- Check Nearby Blood bank to donate -->

    



    <!-- hospital section -->

    <!-- <section class="healthcheckup mt-5">
        <div class="container">
            <h4>Check Your Health</h4>
        </div>
    </section> -->



    <!-- footer -->

  <footer class=" footer text-light py-4 text-center">
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