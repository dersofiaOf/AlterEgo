<?php
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namep = $_POST['namep'];
    $descriptionp = $_POST['descriptionp'];

    // Загрузка файла
    $target_dir = "../../img/teachers/";
    $target_file = $target_dir . basename($_FILES["teachersimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Проверка, является ли файл изображением
    $check = getimagesize($_FILES["teachersimg"]["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Проверка размера файла
    if ($_FILES["teachersimg"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Разрешенные форматы файлов
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed.";
        $uploadOk = 0;
    }

    // Проверка ошибок
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["teachersimg"]["tmp_name"], $target_file)) {
            $teachersimg = basename($_FILES["teachersimg"]["name"]);

            // Вставка данных в базу
            $sql = "INSERT INTO section_teachers (nameP, descriptionP, teachersImg) VALUES ('$namep', '$descriptionp', '$teachersimg')";
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