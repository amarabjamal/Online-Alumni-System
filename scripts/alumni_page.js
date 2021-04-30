//AUTOCOMPLETE FEATURE - SEARCH FOR ALUMNI

//getting all required elements
const searchSB = document.querySelector(".search-box");
const inputBox = searchSB.querySelector("input");
const suggBox = searchSB.querySelector(".autocom-box");

//if user press any key and release
inputBox.onkeyup = (e) => {
    // console.log(e.target.value); //print dekat console log. Just untuk test if its working
    let userData = e.target.value; //the data user entered
    let emptyArray = [];
    //this code pickup suggestion array's element
    if (userData) {
        emptyArray = suggestion.filter((data) => {
            //filtering array value and user char to lower case and return only those word/sentence which are starts with what user entered
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        //console.log(emptyArray); //just to test if its working
        emptyArray = emptyArray.map((data) => {
            return data = '<li>' + data + '<li>';
        });
        console.log(emptyArray);
        searchSB.classList.add("active"); //show autocomplete bpx
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "select(this)");
        }
    } else {
        searchSB.classList.remove("active"); //hide autocomplete box
    }

}

function select(element) {
    let selectUserData = element.textContent;
    //console.log(selectUserData); //untuk test if kita dapat select element tu
    inputBox.value = selectUserData; //passing the user selected list item data in textfield (apa yang user pilih written in textfield)
    searchSB.classList.remove("active"); //hide autocomplete box lepas tekan select
    location.href = "profile.html";
}

function showSuggestions(list) {
    let listData;
    if (!list.length) {
        userValue = inputBox.value;
        listData = '<li>' + userValue + '<li>';
    } else {
        listData = list.join('');
    }
    suggBox.innerHTML = listData;
}

//SEARCH FOR ALUMNI BUTTON
function displayPage() {
    location.replace("profile.html")
}

//FILTER SECTION

//AUTOCOMPLETE FEATURE FOR BATCH
const searchBatch = document.querySelector(".search-input");
const inputBatch = searchBatch.querySelector("input");
const suggBatch = document.querySelector(".autocom-batch");

//if user press any key and release
inputBatch.onkeyup = (e) => {
    //user enter batch number
    let userData = e.target.value;
    let emptyArray = [];
    //accessing the yearSuggestion array
    if (userData) {
        //return words from yearSuggestion that start with userData character
        emptyArray = yearSuggestion.filter((data) => {
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data) => {
            return data = '<li>' + data + '</li>';
        });
        console.log(emptyArray);
        searchBatch.classList.add("active");
        showYSuggestions(emptyArray);
        let allList = suggBatch.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "selectY(this)");
        }
    } else {
        searchBatch.classList.remove("active");
    }
}

//to pass the clicked value to input box
function selectY(element) {
    let selectUserData = element.textContent;
    inputBatch.value = selectUserData;
    searchBatch.classList.remove("active");
}

//to show suggestion 
function showYSuggestions(list) {
    let listData;
    if (!list.length) {
        userValue = inputBatch.value;
        listData = '<li>' + userValue + '</li>'
    } else {
        listData = list.join('');
    }
    suggBatch.innerHTML = listData;
}

//DYNAMIC DROPDOWN FOR FACULTY AND MAJOR
var faculty = {
    selectF: ['Please Select Major'],
    education: ['Please Select Major', 'Curriculum and Instructional Technology', ' Educational Psychology and Counselling', 'Educational Management, Planning and Policy', 'Educational Foundations and Humanities', 'Mathematics and Science Education', 'Language and Literacy Education'],
    dentistry: ['Dentistry'],
    engineering: ['Please Select Major', 'Biomedical Engineering', 'Chemical Engineering', 'Civil Engineering', 'Electrical Engineering', 'Mechanical Engineering'],
    science: ['Please Select Major', 'Geology', 'Science & Technology Studies', 'Biological Sciences', 'Chemistry', 'Physics', 'Mathematical Sciences'],
    law: ['Please Select Major', 'Laws', 'Jurisprudence'],
    medicine: ['Please Select Major', 'Medicine', 'Biomedical Science', 'Nursing'],
    artsocial: ['Please Select Major', 'Anthropology & Sociology', 'Chinese Studies', 'East Asian Studies', 'English', 'Geography', 'History', 'Indian Studies', 'International & Strategic Studies', 'Media and Communication Studies', 'South East Asian Studies', 'Social Administration & Justice', 'Gender Studies Programme'],
    business: ['Please Select Major', 'Accounting', 'Business Administration', 'Finance'],
    economics: ['Economics'],
    languages: ['Please Select Major', 'English Language', 'Asian European Languages', 'Malaysian Languages and Applied Linguistics', 'Arabic and Middle Eastern Languages'],
    environment: ['Please Select Major', 'Science Architecture', 'Building Surveying', 'Quantity Surveying', 'Real Estate', 'Urban & Regional Planning'],
    compsc: ['Please Select Major', 'Artificial Intelligence', 'Computer System and Network', 'Information System', 'Software Engineering', 'Multimedia', 'Data Science'],
    pharmacy: ['Please Select Major', 'Chemistry', 'Life Sciences', 'Technology', 'Clinical Pharmacy & Pharmacy Practice'],
    creative: ['Please Select Major', 'Music', 'Drama', 'Dance']
}

//getting the main and sub menus

var main = document.getElementById('main-menu');
var sub = document.getElementById('sub-menu');

//trigger the event when main menu change

main.addEventListener('change', function () {
    //getting a selected option
    var selected_option = faculty[this.value];

    //removing the sub menu options using while loop
    while (sub.options.length > 0) {
        sub.options.remove(0);
    }

    //convert selected object into array and create a options for each array elements
    //using Option Constructor, it wll create html element with the given value and innertext
    Array.from(selected_option).forEach(function (el) {

        let option = new Option(el, el);

        //append the child option i sub menu

        sub.appendChild(option);
    });
});

