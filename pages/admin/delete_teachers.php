<?php
include '../connect/connect_db.php';

$idt = $_GET['idt'];

$sql = "DELETE FROM section_teachers WHERE idt=".$idt;

if($conn->query($sql) === TRUE){
    header('Location:admin_panel.php');
}
else {
    echo "Ошибка удаления:".$conn->error;
}

$conn->close()
?>