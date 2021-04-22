

//AUTOCOMPLETE FEATURE

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

//FILTER
const selectedAll = document.querySelectorAll(".selected");

//for searching alumni
function displayPage() {
    location.replace("profile.html")
}

//for faculty and major filtering
selectedAll.forEach((selected) => {
    //based on their position in html
    const optionsContainer = selected.previousElementSibling;
    const searchBox = selected.nextElementSibling;

    //select option from current option container
    const optionsList = optionsContainer.querySelectorAll(".option");

    //when we click one option container, other option container should closed
    selected.addEventListener("click", () => {
        //if one option container (other than current one) is active, close it
        if (optionsContainer.classList.contains("active")) {
            optionsContainer.classList.remove("active");
        } else {
            let currentActive = document.querySelector(".options-container.active");

            if (currentActive) {
                currentActive.classList.remove("active");
            }

            optionsContainer.classList.add("active");
        }

        searchBox.value = "";
        filterList("");

        if (optionsContainer.classList.contains("active")) {
            searchBox.focus();
        }
    });

    optionsList.forEach((o) => {
        o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector("label").innerHTML;
            optionsContainer.classList.remove("active");
        });
    });

    searchBox.addEventListener("keyup", function (e) {
        filterList(e.target.value);
    });

    const filterList = (searchTerm) => {
        searchTerm = searchTerm.toLowerCase();
        optionsList.forEach((option) => {
            let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTerm) != -1) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    };
});

//for faculty and major new
//DYNAMIC DROPDOWN
var faculty = {
    selectF: ['Please Select Major'],
    education: ['Curriculum and Instructional Technology', ' Educational Psychology and Counselling', 'Educational Management, Planning and Policy'],
    dentistry: ['Dentistry'],
    engineering: ['Biomedic', 'Chemical', 'Civil', 'Electrical'],
    science: ['Environment', 'Genetic', 'Chemistry', 'Physics'],
    law: ['law']
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

