<?php
session_start();
if(isset($_POST['submit'])) {
    $phone = $_SESSION['user_phone'];
    $status = $_POST['status'];

    include '../connect/connect_db.php';
    
    $sql_update = "UPDATE application SET status='$status' WHERE phone='$phone'";

    if ($conn->query($sql_update) === TRUE) {
        header('Location: ../admin_page.php');
    } else {
        echo "Ошибка при обновлении данных: " . $conn->error;
    }

    // Закрытие соединения с базой данных
    $conn->close();
}
?>