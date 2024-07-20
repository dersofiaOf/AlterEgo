<?php
include '../connect/connect_db.php';

$ida = $_GET['ida'];

$sql = "DELETE FROM application WHERE ida=".$ida;

if($conn->query($sql) === TRUE){
    header('Location:../user_page.php');
}
else {
    echo "Ошибка удаления:".$conn->error;
}

$conn->close()
?>