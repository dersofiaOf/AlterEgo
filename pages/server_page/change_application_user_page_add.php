<?php
session_start();
if(isset($_POST['submit'])) {
    $phone = $_SESSION['user_phone'];
    $description = $_POST['description'];

    include '../connect/connect_db.php';
    
    $sql_update = "UPDATE application SET description='$description' WHERE phone='$phone'";

    if ($conn->query($sql_update) === TRUE) {
        header('Location: ../user_page.php');
    } else {
        echo "Ошибка при обновлении данных: " . $conn->error;
    }

    // Закрытие соединения с базой данных
    $conn->close();
}
?>