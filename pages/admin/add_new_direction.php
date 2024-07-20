<?php
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iconp = $_POST['iconp'];

    // Загрузка файла
    $target_dir = "../../img/musical_Instruments_icon/";
    $target_file = $target_dir . basename($_FILES["directionsimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Проверка, является ли файл изображением
    $uploadOk = 1; // Предполагаем, что загрузка прошла успешно по умолчанию

// Проверка размера файла
if ($_FILES["directionsimg"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Разрешенные форматы файлов
$imageFileType = strtolower(pathinfo($_FILES["directionsimg"]["name"], PATHINFO_EXTENSION));
if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed.";
    $uploadOk = 0;
}

    // Проверка ошибок
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["directionsimg"]["tmp_name"], $target_file)) {
            $directionsimg = basename($_FILES["directionsimg"]["name"]);

            // Вставка данных в базу
            $sql = "INSERT INTO section_directions (iconP, directionsImg) VALUES ('$iconp', '$directionsimg')";
            if ($conn->query($sql) === TRUE) {
                header("Location: admin_panel.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>