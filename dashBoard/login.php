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


  <title>Login</title>
</head>

<body>



  <section class="loginForm">
    <div class="container col-md-5 col-lg-3 col-8">
      <!-- Logo -->
      <img src="img/logo_name.png" class="img-fluid mx-auto d-block" width="256" height="256">

      <!-- login form -->

      <form id="loginForm">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="loginEmail" class="form-control" />
          <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="loginPassword" class="form-control" />
          <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=""  checked />
              <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4" onclick="signIn()">Sign in</button>



        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="#!" id="registerButton" onclick="register()">Register</a></p>
          <p>Register as a Blood Bank <a href="#!" id="bankRegisterButton" onclick="bankRegister()">Register</a></p>
          <p>or sign in with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
      </form>


      <!-- registration form for reciever and donor -->



      <div id="registerForm" hidden>
        <form >
          <div class="form-outline mb-3">
            <input type="text" id="firstName" class="form-control" required />
            <label class="form-label" for="form2Example1">First Name</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="lastName" class="form-control" required />
            <label class="form-label" for="form2Example1">Last Name</label>
          </div>
  
          <div class="form-outline mb-3" required>
  
            <select name="bloodGroup" id="userType" required>
              <option value="1">Reciver</option>
              <option value="2">Donor</option>
            </select>
            <br>
            <label class="form-label" for="form2Example1">User Type</label>
          </div>
  
          <div class="form-outline mb-3" required>
  
            <select name="bloodGroup" id="bloodType" required>
              <option value="1">A+</option>
              <option value="2">A-</option>
              <option value="3">B+</option>
              <option value="4">B-</option>
              <option value="5">O+</option>
              <option value="6">O-</option>
              <option value="7">AB+</option>
              <option value="8">AB-</option>
            </select>
            <br>
            <label class="form-label" for="form2Example1">Blood Group</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="nidNumber" class="form-control" required />
            <label class="form-label" for="form2Example1">NID Number</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="cityName" class="form-control" required />
            <label class="form-label" for="form2Example1">City Name</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="presentAddress" class="form-control" required />
            <label class="form-label" for="form2Example1">Present Address</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Permanent Address</label>
          </div>
  
  
          <div class="form-outline mb-4">
            <input type="email" id="useremail" class="form-control" required />
            <label class="form-label" for="form2Example1">Email Address</label>
          </div>
  
          <div class="form-outline mb-4">
            <input type="tel" id="contacNumber" class="form-control" required />
            <label class="form-label" for="form2Example1">Mobile Number</label>
          </div>
  
  
          <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control" required />
            <label class="form-label" for="form2Example2">Password</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="password" id="confirmPassword" class="form-control" required />
            <label class="form-label" for="form2Example2">Confirm Password</label>
          </div>
  
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="#" checked />
            <label class="form-check-label" for="form2Example31"> I accept all the policy </label>
          </div>
  
  
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" onclick="signUp()">Sign up</button>

        </form>

        <div class="text-center mb-4">
          <p>Already have an account? <a href="#!" id="registerButton" onclick="login()">Login</a></p>
          <p>or sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
  
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>

      </div>


       <!-- registration form for BloodBank-->


      <div id="bankRegisterForm" hidden>
        <form >
          <div class="form-outline mb-3">
            <input type="text" id="bankName" class="form-control" required />
            <label class="form-label" for="form2Example1">Blood Bank Name</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="regId" class="form-control" required />
            <label class="form-label" for="form2Example1">Registration Number</label>
          </div>

          <div class="form-outline mb-3">
            <input type="text" id="licenceNumber" class="form-control" required />
            <label class="form-label" for="form2Example1">Trade licence Number</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="bankCityName" class="form-control" required />
            <label class="form-label" for="form2Example1">City Name</label>
          </div>
  
          <div class="form-outline mb-3">
            <input type="text" id="bankAddress" class="form-control" required />
            <label class="form-label" for="form2Example1">Address</label>
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="bankEmail" class="form-control" required />
            <label class="form-label" for="form2Example1">Email Address</label>
          </div>
  
          <div class="form-outline mb-4">
            <input type="tel" id="bankNumber" class="form-control" required />
            <label class="form-label" for="form2Example1">Mobile Number</label>
          </div>


          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox"  checked />
            <label class="form-check-label" for="form2Example31"> I accept all the policy </label>
            <figcaption class="text-light"><i> *You will get email for approval. Wait for the confirmation as we have to varify your company.</i></figcaption>
          </div>
  
  
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" onclick="apply()">Apply</button>

        </form>

        <div class="text-center mb-4">
          <p>Already have an account? <a href="" id="registerButton" onclick="login()">Login</a></p>
      </div>

      
    </div>
  </section>

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