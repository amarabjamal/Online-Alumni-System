// when user click

const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

//to put the option at selected

optionsList.forEach(o => {
o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    //line that selects the radio button when the div is clicked
    o.querySelector("input").checked = true; 
    optionsContainer.classList.remove("active");
});
});