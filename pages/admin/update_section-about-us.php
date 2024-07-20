<?php
// Подключение к базе данных
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aboutus = $_POST['aboutus'];

    // Обновление данных в базе данных
    $sql = "UPDATE section_about_us SET `about_us` = '$aboutus'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }

    $conn->close();
}
?>