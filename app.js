    function checkPassword() {
        let password = document.getElementById("Password");
       // let confirmPassword = document.getElementById("confirmPassword");
        let passwordEntered = password.value;
       // let confirmPasswordEntered = confirmPassword.value;

        if (passwordEntered => 6) {
            return true;
        }
            alert("Должно быть 6 символов или больше!");
            return false;
        }
       /* if (passwordEntered === confirmPasswordEntered) {
            return true;
        }
            alert("Введенные пароли не совпадают!");
            return false;
         }*/
