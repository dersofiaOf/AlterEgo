<?php
// Подключение к базе данных
include '../connect/connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $centerlat = $_POST['centerlat'];
    $centerlng = $_POST['centerlng'];

    // Обновление данных в базе данных
    $sql = "UPDATE section_contacts SET `phone` = '$phone',`city` = '$city',`address` = '$address',`center_lat` = '$centerlat',`center_lng` = '$centerlng'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }

    $conn->close();
}
?>