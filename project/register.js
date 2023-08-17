document.getElementById("registrationform").addEventListener("submit",function (e) {
    e.preventDefault();

var fName = document.getElementById('fname').value;
var mname = document.getElementById('mname').value;
var familyname = document.getElementById('familyname').value;
var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
var cpassword = document.getElementById('cpassword').value;
var pnumber = document.getElementById('pnumber').value;
// var userType = document.getElementById('userType').value;
var birthday = document.getElementById('birthday').value;
birthday=new Date(birthday); 


// function validatePassword(password) {
//     if (password.length < 8) {
//       return "Very weak - Please enter a stronger password.\nHint: The password should be at least eight characters long.";
//     }
  
//     var hasUpperCase = /[A-Z]/.test(password);
//     var hasLowerCase = /[a-z]/.test(password);
//     var hasNumbers = /\d/.test(password);
//     var hasSymbols = /[! "?$%^&)]/.test(password);
  
//     if (!hasUpperCase || !hasLowerCase || !hasNumbers || !hasSymbols) {
//       return "Very weak - Please enter a stronger password.\nHint: To make it stronger, use upper and lower case letters, numbers, and symbols like ! \" ? $ % ^ & ).";
//     }
  
//     return "Password is strong!";
//   }
  
//   // Example usage:
//   var password = "myweakpassword";
//   var passwordStrength = validatePassword(password);
//   console.log(passwordStrength);


// Send an API request to validate the registration data
fetch('register-form.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        email: email,
        fname: fName,
        mname: mName,
        familyname: familyName,
        password: password,
        cpassword: cpassword,
        pnumber: pnumber,
        birthday: birthday,
    })
})
.then(function(response) {
    if (response.ok) {
        // Validation successful, redirect to welcome.html
        // window.location.href = 'welcome.html';
    } else {
        // Validation failed, display error message
        var errorElement = document.getElementById('registrationError');
        errorElement.innerText = 'Error registering user. Please try again.';
    }
})
.catch(function(error) {
    console.error(error);
});})