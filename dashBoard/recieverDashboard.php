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

  <!-- navbar -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">QuickBlood</a>
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
          <a class="nav-link" href="#">Request Blood</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Search Blood Bank Location</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Search Blood Bank</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- user profile img name -->

  <section class="userBanner">
    <div class="mr-3 mt-3">
      <div class="profile ">
        <div class=" figure profileImg d-flex justify-content-end">
          <img src="img/logo.png" class="figure-img img-fluid rounded-circle" height="64" width="64">
        </div>
      </div>
    </div>
  </section>

  <!-- Notice banner -->

  <section class="banner">
    <div class="container bannerCon">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item  active">
            <h4>"Give the gift that keeps on giving—donate blood, save lives. Be a lifeline, not a bystander."</h4>
          </div>
          <div class="carousel-item">
            <h4>"Be a hero in the truest sense—donate blood and be the heartbeat of compassion."</h4>
          </div>
          <div class="carousel-item">
            <h4>"Every drop counts, every donor matters. Join the life-saving journey, be a blood donor today."</h4>
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

  <!-- blood request blood -->

  <section>
    <div class="container">
      <div class="row">
        <section class="container bloodRequest col-lg-6 col-md-6">
          <div class="dropdown mt-5">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Requst Blood
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <form class="px-4 pt-3">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1"> What you need ?</label>
                  <input type="text" class="form-control" id="requestHeader" placeholder="">
                </div>
                <div class="form-outline mb-3" required>

                  <label class="form-label" for="form2Example1">Blood Group</label>
                  <br>

                  <select name="bloodGroup" id="requestbloodType" required>
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">B+</option>
                    <option value="4">B-</option>
                    <option value="5">O+</option>
                    <option value="6">O-</option>
                    <option value="7">AB+</option>
                    <option value="8">AB-</option>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Why you need ?</label>
                  <input type="text" class="form-control" id="requestDescription" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Quantity</label>
                  <input type="number" class="form-control" id="requestQuantity" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Hospital Name</label>
                  <input type="text" class="form-control" id="requestHospital" placeholder="">
                </div>
                
                <div class="form-outline mb-3" required>

                  <label class="form-label" for="form2Example1">Select City</label>
                  <br>

                  <select name="bloodGroup" id="requestCity" required>
                    <option value="1">Dhaka</option>
                    <option value="2">Faridpur</option>
                    <option value="3">Gopalganj</option>
                    <option value="4">Chittagong</option>
                    <option value="5">Khulna</option>
                    <option value="6">Sylhet</option>
                    <option value="7">Rangpur</option>
                    <option value="8">Comilla</option>
                  </select>
                  
                </div>

                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">When you need?</label>
                  <input type="date" class="form-control" id="requestDate" name="datepicker"" placeholder=" add">
                </div>
              </form>
              <button type="submit" class="btn btn-primary" onclick="donorRequest()" >post</button>
            </div>

            <section class="my-5">
              <div class="container bloodRequestContainer">
                <div id="bloodRequestContainer">
                  
                </div>
                
                <div class="row footer">
                  <div class="commentBtn">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><i class="fa-sharp fa-regular fa-comment"
                        style="color: #ffffff;"></i></button>

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
            </section>
          </div>
        </section>

        <section class="container col-lg-6 col-lg-6 col-md-6 SearchBloodBank">
          <div class="dropdown my-5">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Search Blood Bank Location

            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

              <form class="px-4 py-3">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">City</label>
                  <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Patient Hospital Name</label>
                  <input type="text" class="form-control" id="exampleDropdownFormPassword1" placeholder="">
                </div>


                <button type="submit" class="btn btn-primary">Search</button>
              </form>

            </div>
          </div>

          <div class= "bloodBankMap d-flex" >
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9752778852258!2d90.38369337588935!3d23.748260988857353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ba4524614f%3A0x4c1bcbb949d22e89!2sBlood%20Bank%20Dhaka!5e0!3m2!1sen!2sbd!4v1701591797330!5m2!1sen!2sbd"  style="border:0; border-radius: .5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="img-fluid" ></iframe>
          </div>
        </section>
      </div>

      <div class="row mt-5 mb-5 ">
        <div class="container col-md-6 col-lg-6 mb-5">
            <div class="dropdown ">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Search Blood Donor
  
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  
                <form class="px-4 py-3">
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1" >City</label>
                    <input type="text" class="form-control" id="donorCity" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Blood Type</label>
                    <input type="text" class="form-control" id="donorBloodType" placeholder="">
                  </div>

                </form>

                <button type="submit" onclick="DonorSearch()" class="btn btn-primary">Search</button>
  
              </div>
            </div>
          

          <div class="main-container mt-5">
            <div class="container" id="post-container">
              <div class="card mb-3">
                <div class="card-body">
                  <h4 class="card-title"> Rayhan Pervej</h4>
                  <p> Blood Type: <span> AB+</span></p>
                  <p>Total Donate: <span> 5</span></p>
                  <p>Contact: <span>01889293293</span></p>
                  <p>Address: <span> C Block, Bashudhara, Dhaka</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        

      
        
        <div class="searchBloodBank col-md-6 col-lg-6">
          <div class="container SearchBox">
              <form class="mb-3">
                  <div class="form-group">
                      <label for="exampleDropdownFormEmail1"> <h3>Search Blood Bank</h3></label>
                      <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder=" Add City...">
                  </div>
  
                  <button type="submit" class="btn btn-primary">search</button>
              </form>
          </div>
          <div class="main-container">
              <!-- Your fixed main container content goes here -->

              <div id="post-container" class="container">
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
                      </div>
                  </div>
                  <!-- Repeat the above card structure for each post -->

              </div>
          </div>
      </div>
      </div>

      

    </div>
  </section>


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
