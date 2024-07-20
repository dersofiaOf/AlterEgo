<?php
// Подключение к базе данных
include 'connect/connect_db.php';

// Извлечение данных из таблицы section_welcome
$sql = "SELECT * FROM section_welcome";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получение данных
    while ($row = $result->fetch_assoc()) {
        $welcometitle = $row["welcome-title"];
        $welcomep = $row["welcome-p"];
        $backgroundimage = $row["background-image"];
    }
} else {
    echo "0 results";
}

// Извлечение данных из таблицы section_directions
$sql = "SELECT * FROM section_directions";
$directionsResult = $conn->query($sql);
$directions = [];
if ($directionsResult->num_rows > 0) {
    while ($row = $directionsResult->fetch_assoc()) {
        $directions[] = $row;
    }
} else {
    echo "0 results";
}

// Извлечение данных из таблицы section_teachers
$sql = "SELECT * FROM section_teachers";
$teachersResult = $conn->query($sql);
$teachers = [];
if ($teachersResult->num_rows > 0) {
    while ($row = $teachersResult->fetch_assoc()) {
        $teachers[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Ego</title>
    <?php include 'connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/teachers.css">
    <style>
        .welcome {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('<?php echo "../".$backgroundimage; ?>'); /* Полупрозрачный черный слой */
        }
    </style>
</head>
<body>
<!-- Header -->
<?php include 'connect/index-header.php'; ?>

<!-- Main -->
<main class="main">
<section class="welcome fade-in">
    <h1 class="main-title welcome-title fade-in"><?php echo $welcometitle; ?></h1>
    <p class="main-p welcome-p fade-in"><?php echo $welcomep; ?></p>
    <div class="welcome-links fade-in">
        <a href="#" class="welcome-links__app" data-bs-toggle="modal" data-bs-target="#applicationFormModal">Оставить заявку</a>
        <a href="contacts.php" class="welcome-links__contact">Контакты</a>
    </div>
</section>
<!-- Модальное окно -->
<?php include 'connect/modal_fade.php'; ?>

<!-- Направления -->
<section class="directions" id="directions">
    <div class="container">
        <h1 class="directions-title title fade-in">Направления</h1>
        <p class="directions-p section-p fade-in">А что кроме гитары?</p>
        <div class="row">
            <?php
            foreach ($directions as $index => $direction) {
                if ($index % 3 == 0 && $index != 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-md-4 directions-item">';
                echo '    <div class="directions-item_links">';
                echo '        <div class="directions-item_links_img fade-in">';
                echo '            <img src="../img/musical_Instruments_icon/' . $direction['directionsImg'] . '" alt="иконка ' . $direction['iconP'] . '">';
                echo '        </div>';
                echo '        <div class="directions-item_links_title fade-in">';
                echo '            <p class="icon-p">' . $direction['iconP'] . '</p>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Преподаватели -->
<section class="teachers" id="teachers">
        <h1 class="teachers-title title fade-in">Наша команда</h1>
        <div class="teachers-grid">
            <?php
            foreach ($teachers as $index => $teacher) {
                // Если индекс кратен 3 и не равен нулю, начинаем новый ряд
                if ($index % 3 == 0 && $index != 0) {
                }
                ?>
                <div class="teachers-item">
                <div class="teachers-item_links">
                <div class="teachers-item_links_img fade-in">
                    <?php
                echo '            <img src="../img/teachers/' . $teacher['teachersImg'] . '" alt="Фото ' . $teacher['nameP'] . '">';
                ?>
                </div>
                <div class="teachers-item_links_title fade-in">
                    <?
                echo '            <p class="icon-p">' . $teacher['nameP'] . '</p>';
                echo '            <p class="icon-p">' . $teacher['descriptionP'] . '</p>';
                ?>
                </div>';
                </div>
                </div>
                <?php
            }
            ?>
    </div>
</section>
</main>

<!-- Footer -->

<?php include 'connect/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/animation.js"></script>
</body>
</html>