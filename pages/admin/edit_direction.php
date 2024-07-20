<?php
include '../connect/connect_db.php';

$id = $_GET['idd'];
$sql = "SELECT * FROM section_directions WHERE idd=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $direction = $result->fetch_assoc();
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
    <h1 class="teachers-title title">Изменить иконку</h1>
    <form action="update_direction.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $direction['idd']; ?>">
    <div class="mb-3">
        <label for="iconp" class="icon-p">Описание иконки</label>
        <input type="text" class="form-control" id="iconp" name="iconp" value="<?php echo $direction['iconP']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="directionsimg" class="icon-p">Фотография</label>
        <input type="file" class="form-control" id="directionsimg" name="directionsimg">
        <?php
        $imgPath = '../../img/musical_Instruments_icon/' . $direction['directionsImg'];
        if (file_exists($imgPath)) {
            echo '<img src="' . $imgPath . '" alt="Current Image" class="img-thumbnail mt-3" style="max-height: 200px;">';
        } else {
            echo '<p class="text-danger">Изображение не найдено: ' . $imgPath . '</p>';
        }
        ?>
        <input type="hidden" name="currentimage" value="<?php echo $direction['directionsImg']; ?>">
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