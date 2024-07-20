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
<h1 class="main-title form-title fade-in">Вход</h1>

    <form action="server_page/check_login.php" class="login-form__form" name="login-form__form" method="post" onsubmit="return validateLoginForm()">
                    <input type="text" placeholder="Логин" class="form-input" name="login" id="login">
                    <input type="password" placeholder="Пароль" class="form-input" name="password" id="password">
                    <input type="submit" value="Войти" class="form-buttom welcome-links__app" name="submit">
                    <div class="no_acc">
                <p class="label-p">Нет аккаунта?</p>
                <br>
                <p class="bold_label-p"><a class="bold_label-p" href="../pages/form_regist.php">Зарегистрируйтесь</a></p>
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