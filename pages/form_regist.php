<?php
session_start();
if ($_SESSION['user_dat']) {
    header('Location: user_page.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Ego</title>
    <?php include 'connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css"> 
</head>
<body>
<!-- Header -->
    
<?php include 'connect/index-header.php'; ?>

<!-- Nain -->
<main class="main">
<section class="form login-form fade-in">
    <div class="container">
        <div class="form-flex-container">
<h1 class="main-title form-title fade-in">Регистрация</h1>

<form action="server_page/check_regist.php" class="login-form__form" name="login-form__form" method="post" onsubmit="return validateRegistForm()">
                    <input type="text" placeholder="Логин" id="login" name="login" class="form-input">
                    <input type="password" placeholder="Пароль" id="password" name="password" class="form-input">
                    <input type="text" placeholder="ФИО" id="fio" name="fio" class="form-input">
                    <input type="tel" placeholder="Номер телефона" id="phone" name="phone" class="form-input">
                    <input type="email" placeholder="Email" id="email" name="email"  class="form-input">
                    <input type="submit" value="Зарегистрироваться" class="form-buttom welcome-links__app" name="submit"> 
                    <div class="no_acc">
                <p class="label-p">Есть аккаунт?</p>
                <br>
                <p class="bold_label-p"><a class="bold_label-p" href="../pages/form_login.php">Войдите</a></p>
    </div>
    </form>
   
</div>
    </div>
</section>

<!-- Модальное окно -->
<?php include 'connect/modal_fade.php'; ?>
</main>

<!-- Footer -->

<?php include 'connect/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/animation.js"></script>
<script src="js/validation.js"></script>
</body>
</html>