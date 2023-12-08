
// login registration form control 


function register() {
  let loginForm = document.getElementById('loginForm');
  let registerForm = document.getElementById('registerForm')
  loginForm.setAttribute('hidden', 'true');
  registerForm.removeAttribute('hidden');

}

function login() {
  let loginForm = document.getElementById('loginForm');
  let registerForm = document.getElementById('registerForm')
  registerForm.setAttribute('hidden', 'true');
  loginForm.removeAttribute('hidden');
}

// passing data to database




function signUp() {


  // Get form data
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const userType = document.getElementById('userType').value;
  const bloodType = document.getElementById('bloodType').value;
  const nidNumber = document.getElementById('nidNumber').value;
  const cityName = document.getElementById('cityName').value;
  const presentAddress = document.getElementById('presentAddress').value;
  const permanentAddress = document.getElementById('form2Example1').value;
  const userEmail = document.getElementById('useremail').value;
  const contactNumber = document.getElementById('contacNumber').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  const bloodTypeMap = {
    '1': 'A+',
    '2': 'A-',
    '3': 'B+',
    '4': 'B-',
    '5': 'O+',
    '6': 'O-',
    '7': 'AB+',
    '8': 'AB-'
  };

  const userTypeMap = {
    '1': 'Receiver',
    '2': 'Donor'
  };

  const userTypeValue = userType;
  const userTypeText = userTypeMap[userTypeValue];

  const BloodTypeValue = bloodType;
  const BloodTypeText = bloodTypeMap[BloodTypeValue];

  // Create an object with the form data
  const formData = {
    firstName,
    lastName,
    userType: userTypeText,
    bloodType: BloodTypeText,
    nidNumber,
    cityName,
    presentAddress,
    permanentAddress,
    userEmail,
    contactNumber,
    password,
    confirmPassword
  };

  // Make a POST request to your PHP file
  fetch('register.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(formData),
  })
    .then(response => response.text())
    .then(data => {
      // Handle the response from the server
      console.log(data);
      // You can update the UI or perform other actions based on the server response
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}


// sign in 

function signIn() {
  // Fetch email and password from the login form
  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPassword').value;

  console.log(password);

  // Send a request to the server to check credentials
  fetch('loginCheck.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      email,
      password,
    }),
  })
    .then(response => response.json())


    .then(data => {
      console.log(data);
      console.log(data.userType);
      // Check the userType from the response and redirect accordingly
      if (data.userType === 'Receiver') {
        window.location.href = 'recieverDashboard.php';
      } else if (data.userType === 'Donor') {
        window.location.href = 'donorDashboard.php';
      } else {
        // Handle other cases or show an error message
        console.log(data);
        console.error('Invalid userType');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
}



//Donor request post

function donorRequest() {

  // Get form values
  const requestHeader = document.getElementById('requestHeader').value;
  const requestBloodType = document.getElementById('requestbloodType').value;
  const requestDescription = document.getElementById('requestDescription').value;
  const requestQuantity = document.getElementById('requestQuantity').value;
  const requestHospital = document.getElementById('requestHospital').value;
  const requestCity = document.getElementById('requestCity').value;
  const requestDate = document.getElementById('requestDate').value;


  if (
    !requestHeader ||
    !requestBloodType ||
    !requestDescription ||
    !requestQuantity ||
    !requestHospital ||
    !requestCity ||
    !requestDate
  ) {
    console.log('Please fill in all fields.'); //have to work and make a pop up alert
    return;
  }

  fetch('recieverDashBoard.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      requestHeader,
      requestDescription,
      requestBloodType,
      requestHospital,
      requestQuantity,
      requestDate,
      requestCity,

    }),
  })

    .then(response => response.json())
    .then(data => {
      // Check if the request was successful
      if (data.success) {
        // Clear form inputs
        document.getElementById('requestHeader').value = '';
        document.getElementById('requestbloodType').value = '';
        document.getElementById('requestDescription').value = '';
        document.getElementById('requestQuantity').value = '';
        document.getElementById('requestHospital').value = '';
        document.getElementById('requestCity').value = '';
        document.getElementById('requestDate').value = '';

        // Close the dropdown (you may need to replace 'yourDropdownID' with the actual ID of your dropdown)
        // Example: $('#yourDropdownID').dropdown('toggle');
      } else {
        // Handle error case
        console.error('Error submitting request:', data.error);
        document.getElementById('requestHeader').value = '';
        document.getElementById('requestbloodType').value = '';
        document.getElementById('requestDescription').value = '';
        document.getElementById('requestQuantity').value = '';
        document.getElementById('requestHospital').value = '';
        document.getElementById('requestCity').value = '';
        document.getElementById('requestDate').value = '';

      }
    })

  document.getElementById('requestHeader').value = '';
  document.getElementById('requestbloodType').value = '';
  document.getElementById('requestDescription').value = '';
  document.getElementById('requestQuantity').value = '';
  document.getElementById('requestHospital').value = '';
  document.getElementById('requestCity').value = '';
  document.getElementById('requestDate').value = '';

}

//showing the post of the request post

document.addEventListener('DOMContentLoaded', function () {
  // Fetch data from PHP using AJAX
  fetch('php/recieverDashboard.php')
    .then(response => response.json())
    .then(dataArray => {
      // Process the data and display it on the page
      displayBloodRequests(dataArray);
    })
    .catch(error => console.error('Error fetching data:', error));
});

function displayBloodRequests(dataArray) {
  const container = document.getElementById('bloodRequestContainer');

  dataArray.forEach(request => {
    const requestContainer = document.createElement('div');

    requestContainer.innerHTML = `
          <div class="row header">
              <div class="subject">
                  <h4>${request.requestSubject}</h4>
                  <h6><span>${request.requestDate}</span></h6>
                  <h6>qty: <span>${request.requestQuantity} bag</span></h6>
                  <h6>Hospital Name: <span>${request.requestHospital}</span></h6>
                  <h6>City: <span>${request.requestcity}</span></h6>
                  <h6>Blood Type: <span>${request.requestBloodTypebloodType}</span></h6>
              </div>
          </div>
          <div class="row content">
              <div class="message">
                  <p>${request.requestDescription}</p>
              </div>
          </div>
      `;

    container.appendChild(requestContainer);
  });
}



//seach Donor

function DonorSearch() {
  // Get form data
  var donorCity = document.getElementById('donorCity').value;
  var donorBloodType = document.getElementById('donorBloodType').value;

  // Make AJAX request to PHP script
  fetch('php/searchBloodDonor.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    // Modify the JavaScript code
    body: JSON.stringify({
      city: donorCity,
      bloodType: donorBloodType
    }),

  })
    .then(response => response.json())
    .then(jsonData => {
      // Handle the response, e.g., update the UI with the fetched data
      console.log(jsonData);

      // Process jsonData as needed (e.g., update UI)
      // Example: Display names in an alert
      var postContainer = document.getElementById('post-container');

      // Clear existing content in postContainer
      postContainer.innerHTML = '';

      jsonData.forEach(function (user) {
        // Create a new card element
        var card = document.createElement('div');
        card.className = 'card mb-3';

        // Create card body
        var cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        // Fill in card details
        cardBody.innerHTML = `
          <h2 class="card-title text-capitalize">${user.firstName + " "+ user.lastName}</h2>
          <p>Blood Type: <span>${user.bloodType}</span></p>
          <p>Total Donate: <span>${user.totalDonations}</span></p>
          <p>Contact: <span>${user.contactNumber}</span></p>
          <p class="text-capitalize">Address: <span>${user.presentAddress}</span></p>
        `;

        // Append card body to card
        card.appendChild(cardBody);

        // Append card to postContainer
        postContainer.appendChild(card);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

//showing the blood request post in the donor dashboard

function fetchBloodRequests() {
  
  fetch('php/bloodRequest.php') 
    .then(response => response.json())
    .then(jsonData => {
      
      console.log(jsonData);

      
      var postContainer = document.getElementById('donorPostViewer');

     
      postContainer.innerHTML = '';

      jsonData.forEach(function (request) {
       
        var card = document.createElement('div');
        card.className = 'card mb-3';

        
        var cardHeader = document.createElement('div');
        cardHeader.className = 'card-header';
        cardHeader.innerHTML = `
          <h4 class="card-title">${request.requestSubject}</h4>
          <h6 class="card-title">${request.requestDate}</h6>
          <h6 class="card-title">Qty: <span>${request.requestQuantity}</span></h6>
          <h6 class="card-title">Hospital: <span>${request.requestHospital}</span></h6>
        `;

        
        card.appendChild(cardHeader);

       
        var cardBody = document.createElement('div');
        cardBody.className = 'card-body';
        cardBody.innerHTML = `
          <p class="card-text">${request.requestDescription}</p>
        `;

        
        card.appendChild(cardBody);

       
        var cardFooter = document.createElement('div');
        cardFooter.className = 'card-footer d-flex justify-content-end';

        var commentBtn = document.createElement('div');
        commentBtn.className = 'commentBtn';
        commentBtn.innerHTML = `
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i
                  class="fa-sharp fa-regular fa-comment" style="color: #ffffff;"></i></button>
          <div class="dropdown-menu">
              <div class="container commentCon">
                  <div class="">
                      <h5>Rayhan</h5>
                      <p>Hi i am available to donate.</p>
                  </div>
              </div>
              <!-- Add more comments based on your data -->
          </div>
        `;

        
        cardFooter.appendChild(commentBtn);

       
        card.appendChild(cardFooter);

       
        postContainer.appendChild(card);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

// Call the function to fetch and display blood requests
fetchBloodRequests();

