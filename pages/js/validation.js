function validateRegistForm() {
    // Проверка на длину пароля (не менее 8 символов)
    var password = document.getElementById("password").value;
    if (password.length < 8) {
        alert("Пароль должен содержать не менее 8 символов");
        return false;
    }

    // Проверка на уникальность email
    var email = document.getElementById("email").value;
    // Проверка на формат email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Пожалуйста, введите корректный email адрес");
        return false;
    }

    // Проверка на формат номера телефона
    var phone = document.getElementById("phone").value;
    var phonePattern = /^\+\d{1,3}\s\(\d{3}\)\s\d{3}-\d{4}$/;
    if (!phone.match(phonePattern)) {
        alert("Пожалуйста, введите номер телефона в формате +7 (XXX) XXX-XXXX");
        return false;
    }

    // Проверка на формат ФИО
    var fio = document.getElementById("fio").value;
    var fioPattern = /^[a-zA-Zа-яА-Я\s]+$/;
    if (!fio.match(fioPattern)) {
        alert("Пожалуйста, введите ФИО только буквами и пробелами");
        return false;
    }
    
    // Проверка на логин "admin" и пароль "admin"
    var login = document.getElementById("login").value;
    if (login.toLowerCase() === "admin" || password === "admin") {
        alert("Использование логина 'admin' и пароля 'admin' недопустимо");
        return false;
    }

    if (login == "" || password == "" || fio == "" || phone == "" || email == "") {
        alert("Пожалуйста, заполните все поля!");
        return false; // предотвращает отправку формы
    }

    return true; // Форма прошла все проверки
}

function validateLoginForm() {
    // Проверка на длину пароля (не менее 8 символов)
    var password = document.getElementById("password").value;
    if (password.length < 8) {
        alert("Пароль должен содержать не менее 8 символов");
        return false;
    }

    let login = document.forms["login-form__form"]["login"].value;
    if (login == "" || password == "") {
        alert("Пожалуйста, заполните все поля!");
        return false; // предотвращает отправку формы
    }

    return true; // Форма прошла все проверки
}

function validateActionForm() {
    var phoneNumber = document.getElementById("phoneNumber").value;
    var phonePattern = /^\+\d{1,3}\s\(\d{3}\)\s\d{3}-\d{4}$/;
    if (!phoneNumber.match(phonePattern)) {
        alert("Пожалуйста, введите номер телефона в формате +7 (XXX) XXX-XXXX");
        return false; // предотвращает отправку формы
    }

    var additionalInfo = document.getElementById("additionalInfo").value; // Заменил document.forms["laction-form"]["additionalInfo"].value на document.getElementById("additionalInfo").value
    if (phoneNumber === "" || additionalInfo === "") { // Заменил phoneNumber == "" на phoneNumber === ""
        alert("Пожалуйста, заполните все поля!");
        return false; // предотвращает отправку формы
    }

    return true; // Форма прошла все проверки
}
