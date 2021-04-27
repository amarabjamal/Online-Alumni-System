function togglePasswordDisplay() {
    var password = document.getElementById("password");
    var show = document.getElementById("show");
    var hide = document.getElementById("hide");

    if (password.type === 'password') {
        password.type = 'text';
        show.style.display = 'block';
        hide.style.display = 'none';
    }
    else {
        password.type = 'password';
        show.style.display = 'none';
        hide.style.display = 'block';
    }
}