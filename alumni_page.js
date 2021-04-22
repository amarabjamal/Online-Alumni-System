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
//dynamic dropdown
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

