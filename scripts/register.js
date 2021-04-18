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
    var pw = document.getElementById('password').value; 
    var check = document.getElementById('cpassword').value; 

    if(pw == "") {  
        document.getElementById("passwordHelpBlock").innerHTML = "**Fill the password please!";  
        return false;  
    }  

   //minimum password length validation  
    if(pw.length < 8) {  
        document.getElementById("passwordHelpBlock").innerHTML = "Must be atleast 8 characters";  
        return false;  
    }  
    
  //maximum length of password validation  
    if(pw.length > 20) {  
        document.getElementById("passwordHelpBlock").innerHTML = "Must not exceed 20 characters";  
        return false;  
}  