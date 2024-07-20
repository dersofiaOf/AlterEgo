<?php
session_start();
if ($_SESSION['user_dat']) {
    header('Location: ../user_page.php');
}

include '../connect/connect_db.php';

$login = $_POST['login'];
$password = $_POST['password'];

// Проверяем, является ли введенный логин и пароль админскими
if ($login === 'admin' && $password === 'adminadmin') {
    // Перенаправляем на страницу админа
    header('Location: ../admin_page.php');
    exit;
} else {
    // Проверяем наличие введенных данных в базе
    $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user_data = mysqli_fetch_assoc($result);

        // Сохраним данные о пользователе
        $_SESSION['user_dat'] = [
            "idc" => $user_data['idu'],
            "fio" => $user_data['fio'],
            "phone" => $user_data['phone'],
            "email" => $user_data['email'],
            "login" => $user_data['login'],
            "password" => $user_data['password']
        ];
        // Если данные найдены, перенаправляем на страницу пользователя
        header('Location: ../user_page.php');
    } else {
        // Если данных в базе нет, перенаправляем на страницу регистрации
        header('Location: ../form_regist.php');
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>