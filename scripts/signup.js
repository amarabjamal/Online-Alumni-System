function loadAgeSelector()
{
var startyear = 1905;
var endyear = new Date().getFullYear();
for (var i = endyear;i >= startyear;i--){
    option=document.createElement("Option");
    option.text = i;
    option.value = i;
    document.getElementById("classOf").add(option);
}
}

function loadFacultySelector()
{
    const faculties = [
        {value : '01', name : 'Academy of Islamic Studies'},
        {value : '02', name : 'Academy of Malay Studies'},
        {value : '03', name : 'Centre for Foundation Studies in Science'},
        {value : '04', name : 'Cultural Centre'},
        {value : '05', name : 'Faculty of Arts and Social Sciences'},
        {value : '06', name : 'Faculty of Built Environment'},
        {value : '07', name : 'Faculty of Business and Accountancy'},
        {value : '08', name : 'Faculty of Computer Science and Information Technology'},
        {value : '09', name : 'Faculty of Dentistry'},
        {value : '10', name : 'Faculty of Economics and Administration'},
        {value : '11', name : 'Faculty of Education'},
        {value : '12', name : 'Faculty of Engineering'},
        {value : '13', name : 'Faculty of Languages and Linguistics'},
        {value : '14', name : 'Faculty of Law'},
        {value : '15', name : 'Faculty of Medicine'},
        {value : '16', name : 'Faculty of Pharmacy'},
        {value : '17', name : 'Faculty of Science'},
        {value : '18', name : 'Sport Centre'}
    ]

    faculties.forEach( faculty => {
        option=document.createElement("Option");
        option.text = faculty.name;
        option.value = faculty.value;
        document.getElementById("faculty").add(option);
    })
}

function verifyPassword() {  
    var password = document.getElementById('password').value; 
    var rpassword = document.getElementById('rpassword').value; 

   //minimum password length validation  
    if(password.length < 8) {  
        /* document.getElementById('passwordHelpBlock').classList.add('red-alert')
        document.getElementById('passwordHelpBlock').innerText = "Use 8 characters or more for your password";  */
        /* $( "#rpassword" ).addClass( "is-invalid" );
        $( "#rpassword_error" ).text('');  */
        document.getElementById('password').classList.add('is-invalid')
        document.getElementById('password_error').innerText = "Use 8 characters or more for your password";
    }  

    //Reset message when password is emptied or has at least 8 characters
    if(password.length == 0 || password.length >= 8) {
        /* document.getElementById('passwordHelpBlock').innerText = "";  */
        
        document.getElementById('password').classList.remove('is-invalid')
        document.getElementById('password_error').innerText= "";
    }

    if(password == rpassword && rpassword != '') {
        /* document.getElementById('rpassword').classList.remove('red-border');
        document.getElementById('passwordCheckBlock').innerText= ""; */
        /* $( "#rpassword" ).removeClass( "is-invalid" );
        $( "#rpassword_error" ).text(''); */
        document.getElementById('rpassword').classList.remove('is-invalid');
        document.getElementById('rpassword_error').innerText= "";
    }
    else if (password != rpassword && rpassword != '') {
        /* document.getElementById('passwordCheckBlock').classList.add('red-alert')
        document.getElementById('rpassword').classList.add('red-border');
        document.getElementById('passwordCheckBlock').innerText = "Those passwords didn’t match. Try again."; */
        /* $( "#rpassword" ).addClass( "is-invalid" );
        $( "#rpassword_error" ).text('Those passwords didn’t match. Try again.'); */
        document.getElementById('rpassword').classList.add('is-invalid');
        document.getElementById('rpassword_error').innerText= "Those passwords didn’t match. Try again.";
    }

    if (password != rpassword & password == '') {
        /* document.getElementById('passwordCheckBlock').classList.add('red-alert')
        document.getElementById('rpassword').classList.remove('red-border');
        document.getElementById('passwordCheckBlock').innerText = "Enter the password first."; */
        /* $( "#rpassword" ).removeClass( "is-invalid" );
        $( "#rpassword_error" ).text('Enter the password first.'); */
        document.getElementById('rpassword').classList.add('is-invalid');
        document.getElementById('rpassword_error').innerText= "Enter the password first.";
    }

    if (rpassword == '') {
        /* document.getElementById('rpassword').classList.remove('red-border');
        document.getElementById('passwordCheckBlock').innerText = ""; */
        /* $( "#rpassword" ).removeClass( "is-invalid" );
        $( "#rpassword_error" ).text(''); */
        document.getElementById('rpassword').classList.remove('is-invalid');
        document.getElementById('rpassword_error').innerText= "";
    }

}  

function verifySubmit() {
    var password = document.getElementById('password').value; 
    var rpassword = document.getElementById('rpassword').value; 

   //minimum password length validation  
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