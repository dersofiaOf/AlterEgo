<?php
include '../connect/connect_db.php';

if (isset($_GET['photo'])) {
    $photo = urldecode($_GET['photo']);
    $sql = "DELETE FROM section_slider WHERE slider_photo = '$photo'";

    if ($conn->query($sql) === TRUE) {
        // Удаляем файл с сервера
        if (file_exists($photo)) {
            unlink($photo);
        }
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Ошибка при удалении записи: " . $conn->error;
    }
} else {
    echo "Неверный запрос.";
}
$conn->close();
?>