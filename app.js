function checkPassword() {
    let password = document.getElementById("Password");
    let passwordEntered = password.value;
    if (passwordEntered => 6) {
        return true;
    }
    alert("Должно быть 6 символов или больше!");
    return false;
}
