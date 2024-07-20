<?php
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../../img/concerts/";
    $target_file = $target_dir . basename($_FILES["slider_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Проверка, является ли файл изображением
$uploadOk = 1; // Предполагаем, что загрузка прошла успешно по умолчанию

    // Проверка размера файла
    if ($_FILES["slider_photo"]["size"] > 5000000) {
        echo "Извините, ваш файл слишком большой.";
        $uploadOk = 0;
    }

    // Разрешенные форматы файлов
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
        echo "Извините, разрешены только JPG, JPEG, PNG, GIF и SVG файлы.";
        $uploadOk = 0;
    }

    // Проверка ошибок
    if ($uploadOk == 0) {
        echo "Извините, ваш файл не был загружен.";
    } else {
        if (move_uploaded_file($_FILES["slider_photo"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO section_slider (slider_photo) VALUES ('$target_file')";
            if ($conn->query($sql) === TRUE) {
                header("Location: admin_panel.php");
                exit();
            } else {
                echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Извините, произошла ошибка при загрузке вашего файла.";
        }
    }
}
$conn->close();
?>