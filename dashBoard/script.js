
// login registration form control 


function register() {
  let loginForm = document.getElementById('loginForm');
  let registerForm = document.getElementById('registerForm');
  loginForm.setAttribute('hidden', 'true');
  registerForm.removeAttribute('hidden');

}

function bankRegister() {
  let loginForm = document.getElementById('loginForm');
  let bankRegisterForm = document.getElementById('bankRegisterForm');
  loginForm.setAttribute('hidden', 'true');
  bankRegisterForm.removeAttribute('hidden');

}

function login() {
  let loginForm = document.getElementById('loginForm');
  let registerForm = document.getElementById('registerForm');
  let bankRegisterForm = document.getElementById('bankRegisterForm');
  bankRegisterForm.setAttribute('hidden', 'true');
  registerForm.setAttribute('hidden', 'true');
  loginForm.removeAttribute('hidden');
}

// passing data to database




function signUp() {

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

  // an object with the form data
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

      console.log(data);

    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

function apply() {

  const bankName = document.getElementById('bankName').value;
  const regId = document.getElementById('regId').value;
  const licenceNumber = document.getElementById('licenceNumber').value;
  const bankCityName = document.getElementById('bankCityName').value;
  const bankAddress = document.getElementById('bankAddress').value;
  const bankEmail = document.getElementById('bankEmail').value;
  const bankNumber = document.getElementById('bankNumber').value;
  console.log(bankName);

  const formData = {
    bankName,
    regId,
    licenceNumber,
    bankCityName,
    bankAddress,
    bankEmail,
    bankNumber
  };

  fetch('php/bloodBankRegister.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(formData),
  })

    .then(response => response.text())
    .then(data => {

      console.log(data);

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
      }
      else if (data === 'bloodBank') {
        window.location.href = 'bloodbankDashboard.php';
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

  fetch('php/bloodRequest.php', {
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

//showing the post of the request post in reciever dashboard

document.addEventListener('DOMContentLoaded', function () {

  fetch('php/recieverDashboard.php')
    .then(response => response.json())
    .then(dataArray => {
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
          <h2 class="card-title text-capitalize">${user.firstName + " " + user.lastName}</h2>
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

  fetch('php/viewBloodRequest.php')
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

//  fetch and display blood requests
fetchBloodRequests();




//Donor will able to view the blood Bank

function fetchBloodBanks() {
  fetch('php/bloodBankView.php')
    .then(response => response.json())
    .then(jsonData => {

      console.log(jsonData);

      var bloodBankContainer = document.getElementById('bloodBankView');
      bloodBankContainer.innerHTML = '';

      Object.values(jsonData).forEach(function (bloodBank) { //this is a effiecent way to get the obeject json file and pass it as an array. 

        var card = document.createElement('div');
        card.className = 'card mb-3';

        var cardHeader = document.createElement('div');
        cardHeader.className = 'card-header';
        cardHeader.innerHTML = `
                  <h4 class="card-title text-center">${bloodBank.bankName}</h4>
                  <p class="card-title">${bloodBank.bankAddress}</p>
                  <h6 class="card-title">${bloodBank.bankNumber}</h6>
                  <p id="bloodBankId" hidden> ${bloodBank.bankId}</p>
              `;

        card.appendChild(cardHeader);

        var cardBody = document.createElement('div');
        cardBody.className = 'card-body';
        cardBody.innerHTML = `
                  <h4>Blood Available:</h4>
                  <ul>
                  ${bloodBank.bloodData.map(blood => `<li>${blood.bloodType} : <span>${blood.totalQuantity} bags</span></li>`).join('')} 
              </ul>
              `;

        card.appendChild(cardBody);

        var cardFooter = document.createElement('div');
        cardFooter.className = 'card-footer d-flex justify-content-end';

        var appointBtn = document.createElement('button');
        appointBtn.className = 'btn btn-primary dropdown-toggle';
        appointBtn.setAttribute('type', 'button');
        appointBtn.setAttribute('data-toggle', 'dropdown');
        appointBtn.setAttribute('aria-haspopup', 'true');
        appointBtn.setAttribute('aria-expanded', 'false');
        appointBtn.textContent = 'Make an Appointment';

        var dropdownMenu = document.createElement('div');
        dropdownMenu.className = 'dropdown-menu';

        var appointForm = document.createElement('form');
        appointForm.innerHTML = `
                  <div>
                      <label for="appointerFirstName">First Name</label>
                      <input type="text" class="form-control" id="appointerFirstName">
                  </div>
                  <div>
                      <label for="appointerLastName">Last Name</label>
                      <input type="text" class="form-control" id="appointerLastName">
                  </div>
                  <div>
                      <label for="appointerContactNumber">Mobile Number</label>
                      <input type="text" class="form-control" id="appointerContactNumber">
                  </div>
                  <div>
                      <label for="appointerBloodType">Blood Type</label>
                      <input type="text" class="form-control" placeHolder="" id="appointerBloodType">
                  </div>
                  <div>
                      <label for="appointerDate">Date of Blood Donation</label>
                      <input type="date" class="form-control" id="appointerDate">
                  </div>
              `;

        dropdownMenu.appendChild(appointForm);

        var submitBtn = document.createElement('button');
        submitBtn.className = 'text-center mt-3 btn btn-primary';
        submitBtn.textContent = 'Submit';
        submitBtn.onclick = function () {
          bloodBankAppointment();
        };

        dropdownMenu.appendChild(submitBtn);
        cardFooter.appendChild(appointBtn);
        cardFooter.appendChild(dropdownMenu);
        card.appendChild(cardFooter);
        bloodBankContainer.appendChild(card);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}


fetchBloodBanks();

// donor will make an appointment to bloodBank
function bloodBankAppointment() {
  const appointerFirstName = document.getElementById('appointerFirstName').value;
  const appointerLastName = document.getElementById('appointerLastName').value;
  const appointerContactNumber = document.getElementById('appointerContactNumber').value;
  const appointerBloodType = document.getElementById('appointerBloodType').value;
  const appointerDate = document.getElementById('appointerDate').value;
  const bankId = document.getElementById('bloodBankId').textContent;
  console.log(appointerDate);


  fetch('php/donorAppointment.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      appointerFirstName,
      appointerLastName,
      appointerContactNumber,
      appointerBloodType,
      appointerDate,
      bankId
    }),
  })
    .then(response => response.json())
    .then(jsonData => {

      document.getElementById('appointerFirstName').value = '';
      document.getElementById('appointerLastName').value = '';
      document.getElementById('appointerContactNumber').value = '';
      document.getElementById('appointerBloodType').value = '';
      document.getElementById('appointerDate').value = '';

      console.log(jsonData);


    })
    .catch(error => {
      console.error('Error:', error);
    });



}


//bloodBank bloodstroage view in blood box

function fetchBloodStorage() {
  fetch('php/bloodStorageView.php')
    .then(response => response.json())
    .then(jsonData => {
      var bloodBankContainer = document.getElementById('bloodStorageBox');
      bloodBankContainer.innerHTML = '';

      Object.values(jsonData).forEach(function (bloodBank) {
        bloodBank.bloodData.forEach(function (bloodTypeData) {
          // Create a new div for each blood type
          var bloodTypeDiv = document.createElement('div');
          bloodTypeDiv.className = 'col-mb-4 box-blood-storage';

          // Create the content for each blood type div
          bloodTypeDiv.innerHTML = `
            <div class="p-3 text-center">
              <h4 id="${bloodTypeData.bloodType.toLowerCase()}">${bloodTypeData.bloodType}</h4>
              <p>Blood Available</p>
              <p id="${bloodTypeData.bloodType.toLowerCase()}-Quantity">Total: ${bloodTypeData.totalQuantity} Bags</p>
            </div>
          `;

          // Append the blood type div to the bloodBankContainer
          bloodBankContainer.appendChild(bloodTypeDiv);
        });
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}


fetchBloodStorage()

// update blood Storage 

function updateBloodStorage() {

  const storageType = document.getElementById('storageType').value;
  if (storageType == 'donate') {

    const donateId = document.getElementById('donateId').value;
    const donatedBloodGroup = document.getElementById('donatedBloodGroup').value;
    const donatedBloodQuantity = document.getElementById('donatedBloodQuantity').value;
    const donatedDate = document.getElementById('donatedDate').value;

    fetch('php/updateStorage.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        donateId,
        donatedBloodGroup,
        donatedBloodQuantity,
        donatedDate
      }),
    })
      .then(response => response.json())
      .then(jsonData => {
        document.getElementById('donateId') = '';
        document.getElementById('donatedBloodGroup') = '';
        document.getElementById('donatedBloodQuantity') = '';
        document.getElementById('donatedDate') = '';

        console.log(jsonData);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  else {
    console.log(storageType);
  }


}

