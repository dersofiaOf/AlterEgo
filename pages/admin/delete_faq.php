<?php
include '../connect/connect_db.php';

$idfaq = $_GET['idfaq'];

$sql = "DELETE FROM section_faq WHERE idfaq=".$idfaq;

if($conn->query($sql) === TRUE){
    header('Location:admin_panel.php');
}
else {
    echo "Ошибка удаления:".$conn->error;
}

$conn->close()
?>