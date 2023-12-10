<?php
include 'count_total_suggestion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container justify-content-center">  
            <img class="my-logo" src="../image/logo.png" alt="">         
            <p class="text-center w-auto p-0 h3 text-primary">Welcome to Admin Dashboard</p> 
  
        </div>
      </nav>

      <div class="container">
        <div class="row mt-5">
          <div class="col">
                <div class="card text-center">
                    <div class="card-body bg-danger text-light">
                      <h5 class="card-title">8</h5>
                      <p class="card-text text-light p-4">Total listed Blood group</p>
                    </div>
                    <div class="card-footer text-muted text-start">
                        <a href="#" class="btn">Full details</a>
                        <img src="../image/icons8-arrow-30.png" alt="">
                    </div>
                  </div>

        
          </div>
          <div class="col ">
            <div class="card text-center">
                <div class="card-body bg-info text-light">
                 <?php include 'userinfocount.php'; ?>
                  <p class="card-text text-light p-4">Total Number of Doners</p>
                </div>
                <div class="card-footer text-muted text-start">
                    <a href="http://localhost/quickBlood/admin/fetchUserData.php" class="btn">Full details</a>
                    <img src="../image/icons8-arrow-30.png" alt="">
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card text-center">
                <div class="card-body bg-primary text-light">
                  <h5 class="card-title">1</h5>
                  <p class="card-text text-light p-4">Number of Bloodbanks</p>
                </div>
                <div class="card-footer text-muted text-start">
                    <a href="#" class="btn">Full details</a>
                    <img src="../image/icons8-arrow-30.png" alt="">
                </div>
              </div>
              
          </div>
          <div class="col">
            <div class="card text-center">
                <div class="card-body bg-success text-light">
                  <h5 class="card-title">10</h5>
                  <p class="card-text text-light p-4">Total  Blood Received</p>
                </div>
                <div class="card-footer text-muted text-start">
                    <a href="#" class="btn">Full details</a>
                    <img src="../image/icons8-arrow-30.png" alt="">
                </div>
              </div>

    
      </div>
          

          
        </div>

        <div class="row mt-5">
           
            <div class="col ">
              <div class="card text-center">
                  <div class="card-body bg-warning text-light">
                    <h5 class="card-title">1</h5>
                    <p class="card-text text-light p-4">Painding Blood request</p>
                  </div>
                  <div class="card-footer text-muted text-start">
                      <a href="#" class="btn">Full details</a>
                      <img src="../image/icons8-arrow-30.png" alt="">
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="card text-center">
                  <div class="card-body bg-secondary text-light">
                  <div id="numberContainer">
                      <?php include 'get_pending_bloodbank_count.php'; ?>
                  </div>
                    <p class="card-text text-light p-4">Painding Bloodbank Request</p>
                  </div>
                  <div class="card-footer text-muted text-start">
                      <a href="http://localhost/quickBlood/admin/fetchData.php" class="btn">Full details</a>
                      <img src="../image/icons8-arrow-30.png" alt="">
                  </div>
                </div>
                
            </div>
            <div class="col">
              <div class="card text-center">
                  <div class="card-body bg-secondary text-light">
                      <h5 class="card-title"><?php echo $totalRows; ?></h5>
                      <p class="card-text text-light p-4">Total Suggestions</p>
                  </div>
                  <div class="card-footer text-muted text-start">
                      <a href="http://localhost/quickBlood/admin/showmessege.php" class="btn">Full details</a>
                      <img src="../image/icons8-arrow-30.png" alt="">
                  </div>
              </div>
          </div>
  
            
          </div>

          <a href="../quickBlood.html" class="btn btn-danger text-white m-lg-4">Logout</a>
          <script src="script.js"></script>
      </div>

      


   
</body>
</html>