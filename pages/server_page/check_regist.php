<?php 
include '../connect/connect_db.php';

$fio=$_POST['fio'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$login=$_POST['login'];
$password=$_POST['password'];

// Запись данных в базу данных
$sql = "INSERT INTO users (fio, phone, email, login, password) VALUES ('$fio', '$phone', '$email', '$login', '$password')";
            
if ($conn->query($sql) === TRUE) {
    header ('Location:../form_login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
            
// Закрытие подключения
$conn->close();
?>