<?php
include '../connect/connect_db.php';

$question_title = $_POST['question_title'];
$question_text = $_POST['question_text'];

$sql = "INSERT INTO section_faq (question_title, question_text) VALUES ('$question_title', '$question_text')";
if ($conn->query($sql) === TRUE) {
    header("Location: admin_panel.php");
    exit();
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>