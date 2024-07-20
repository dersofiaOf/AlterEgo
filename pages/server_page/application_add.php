<?php
    // Подключение
    include '../connect/connect_db.php';

    $phoneNumber = $_POST['phoneNumber'];
    $additionalInfo = $_POST['additionalInfo'];

    $sql = "INSERT INTO application (phone, description, status) VALUES ('$phoneNumber', '$additionalInfo', 'в обработке')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../index.php');
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>