
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


//