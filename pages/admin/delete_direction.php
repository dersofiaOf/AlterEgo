<?php
include '../connect/connect_db.php';

$idd = $_GET['idd'];

$sql = "DELETE FROM section_directions WHERE idd=".$idd;

if($conn->query($sql) === TRUE){
    header('Location:admin_panel.php');
}
else {
    echo "Ошибка удаления:".$conn->error;
}

$conn->close()
?>