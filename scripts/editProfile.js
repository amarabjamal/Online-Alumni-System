var btn = document.querySelector(".cancel-btn");
var bg = document.querySelector(".modal-bg");

btn.addEventListener("click", function(){
    bg.classList.add("modal-active");
})
