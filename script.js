
//for autocomplete feature

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