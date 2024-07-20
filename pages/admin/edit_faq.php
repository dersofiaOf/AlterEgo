<?php
include '../connect/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['idfaq'];
    $sql = "SELECT * FROM section_faq WHERE idfaq=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $faq = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $question_title = $_POST['question_title'];
    $question_text = $_POST['question_text'];

    $sql = "UPDATE section_faq SET question_title = '$question_title', question_text = '$question_text' WHERE idfaq=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $question_title, $question_text, $id);

    if ($stmt->execute()) {
        echo "Вопрос обновлен.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: admin_panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Ego</title>
    <?php include '../connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/teachers.css">
    <link rel="stylesheet" href="../css/form.css"> 

</head>
<body>

<main class="main">
<div class="container">
    <h1 class="teachers-title title">Изменить вопрос</h1>
    <form action="edit_faq.php" method="post">
        <input type="hidden" name="id" value="<?php echo $faq['idfaq']; ?>">
        <div class="mb-3">
            <label for="question_title" class="icon-p">Заголовок вопроса</label>
            <input type="text" class="form-control" id="question_title" name="question_title" value="<?php echo htmlspecialchars($faq['question_title'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="question_text" class="icon-p">Текст вопроса</label>
            <textarea class="form-control" id="question_text" name="question_text" rows="3" required><?php echo htmlspecialchars($faq['question_text'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit" class="form-button welcome-links__app">Сохранить</button>
    </form>
</div>
</main>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/animation.js"></script>
</body>
</html>