<?php
include '../connect/connect_db.php';

$id = $_GET['idt'];
$sql = "SELECT * FROM section_teachers WHERE idt=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $teachers = $result->fetch_assoc();
} else {
    echo "No record found";
}

$conn->close();
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
    <h1 class="teachers-title title">Изменить преподавателя</h1>
    <form action="update_teachers.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $teachers['idt']; ?>">
    <div class="mb-3">
        <label for="namep" class="icon-p">Имя</label>
        <input type="text" class="form-control" id="namep" name="namep" value="<?php echo $teachers['nameP']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="iconp" class="icon-p">Описание</label>
        <input type="text" class="form-control" id="descriptionp" name="descriptionp" value="<?php echo $teachers['descriptionP']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="teachersimg" class="icon-p">Фотография</label>
        <input type="file" class="form-control" id="teachersimg" name="teachersimg">
        <?php
        $imgPath = '../../img/teachers/' . $teachers['teachersImg'];
        if (file_exists($imgPath)) {
            echo '<img src="' . $imgPath . '" alt="Current Image" class="img-thumbnail mt-3" style="max-height: 200px;">';
        } else {
            echo '<p class="text-danger">Изображение не найдено: ' . $imgPath . '</p>';
        }
        ?>
        <input type="hidden" name="currentimage" value="<?php echo $teachers['teachersImg']; ?>">
    </div>
    <button type="submit" class="form-button welcome-links__app">Изменить</button>
</form>
</div>
</main>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/animation.js"></script>
</body>
</html>