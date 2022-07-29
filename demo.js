
var uid = null;
// function parseJwt (token) {
//   var base64Url = token.split('.')[1];
//   var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
//   var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
//       return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
//   }).join(''));

//   return JSON.parse(jsonPayload);
// };

function login1() {
  console.log("Hello")
  email = document.getElementById('email').value
  password = document.getElementById('password').value


  if (validate_mail(email) == false || validate_password(password) == false) {
    alert('Incorrect email or password');
    return;
  }

  auth.signInWithEmailAndPassword(email, password).then(function () {
    var user = auth.currentUser
    console.log(user);
    sessionStorage.setItem("uid", user.uid);
    // var logoutTimer = setTimeout(function() { sessionStorage.clear(); }, (10 * 60 * 1000));
 
// This goes in the second web page:
// Retrieve the sessionStorage variable
    var user_data = {
      last_login: Date.now()
    }
    location.replace('Attendance.html');
    //database_ref.child('users/'+user.uid).update(user_data)
  })
    .catch(function (error) {
      var error_code = error.code
      var error_message = error.message

      alert(error_message)
    })
}


function validate_mail(email) {
  expression = /^[^@]+@\w+(\.\w+)+\w$/
  if (expression.test(email) == true) {
    return true;
  }
  else {
    return false;
  }
}

function validate_password(password) {
  if (password.length < 6) {
    return false;
  }
  else {
    return true;
  }
}

function validate_field(field) {
  if (field == null) {
    return false;
  }
  if (field.length <= 0) {
    return false;
  }
  else {
    return true;
  }
}

function checkAuth()
{

}