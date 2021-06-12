function loadAgeSelector()
{
    var startyear = 1905;
    var endyear = new Date().getFullYear();
    for (var i = endyear;i >= startyear;i--){
        option=document.createElement("Option");
        option.text = i;
        option.value = i;
        document.getElementById("grad_year").add(option);
    }
}

function verifyPassword() {  
    var password = document.getElementById('password').value; 
    var rpassword = document.getElementById('rpassword').value; 

   //minimum password length validation  
    if(password.length < 8) {  
        document.getElementById('password').classList.add('is-invalid')
        document.getElementById('password_error').innerText = "Use 8 characters or more for your password";
    }  

    //Reset message when password is emptied or has at least 8 characters
    if(password.length == 0 || password.length >= 8) {
        document.getElementById('password').classList.remove('is-invalid')
        document.getElementById('password_error').innerText= "";
    }

    if(password == rpassword && rpassword != '') {
        document.getElementById('rpassword').classList.remove('is-invalid');
        document.getElementById('rpassword_error').innerText= "";
    }
    else if (password != rpassword && rpassword != '') {
        document.getElementById('rpassword').classList.add('is-invalid');
        document.getElementById('rpassword_error').innerText= "Those passwords didn’t match. Try again.";
    }

    if (password != rpassword & password == '') {
        document.getElementById('rpassword').classList.add('is-invalid');
        document.getElementById('rpassword_error').innerText= "Enter the password first.";
    }

    if (rpassword == '') {
        document.getElementById('rpassword').classList.remove('is-invalid');
        document.getElementById('rpassword_error').innerText= "";
    }

}  

function verifySubmit() {
    var password = document.getElementById('password').value; 
    var rpassword = document.getElementById('rpassword').value; 

    if(password.length < 8) {  
        alert('Use 8 characters or more for your password')
        return false;  
    } 

    if (password == rpassword) {
        return true;
    } else {
        alert('Those passwords didn’t match. Try again.');
        return false;
    }
}