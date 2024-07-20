<?php
// Подключение к базе данных
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $welcometitle = $_POST['welcometitle'];
    $welcomep = $_POST['welcomep'];

    $backgroundimage = $_POST['currentimage']; // Старое изображение по умолчанию

    // Проверка, была ли загружена новая фотография
    if (!empty($_FILES['backgroundimage']['name'])) {
        $target_dir = "../../img/";
        $unique_filename = uniqid() . '-' . basename($_FILES["backgroundimage"]["name"]);
        $target_file = $target_dir . $unique_filename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        echo "Debug: target_file = $target_file<br>";
        echo "Debug: tmp_name = " . $_FILES["backgroundimage"]["tmp_name"] . "<br>";
        echo "Debug: name = " . $_FILES["backgroundimage"]["name"] . "<br>";


        // Ограничение по размеру файла (например, 5MB)
        if ($_FILES["backgroundimage"]["size"] > 5000000) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Проверка, что $uploadOk установлено в 0 из-за ошибки
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        // Если все проверки пройдены, попытка загрузить файл
        } else {
            if (move_uploaded_file($_FILES["backgroundimage"]["tmp_name"], $target_file)) {
                $backgroundimage = "img/" . $unique_filename;
                echo "File uploaded successfully: $backgroundimage<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }

    // Обновление данных в базе данных
    $sql = "UPDATE section_welcome SET `welcome-title` = '$welcometitle', `welcome-p` = '$welcomep', `background-image` = '$backgroundimage'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }

    $conn->close();
}
?>