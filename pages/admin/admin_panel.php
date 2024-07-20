<?php
// Подключение к базе данных
include '../connect/connect_db.php';

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

// Извлечение данных из таблицы section_about_us
$sql = "SELECT * FROM section_about_us";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получение данных
    while ($row = $result->fetch_assoc()) {
        $about_us = $row["about_us"];
    }
} else {
    echo "0 results";
}

// Извлечение данных из таблицы contacts
$sql = "SELECT * FROM section_contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $contact = $result->fetch_assoc();
    $phone = $contact['phone'];
    $city = $contact['city'];
    $address = $contact['address'];
    $center_lat = $contact['center_lat'];
    $center_lng = $contact['center_lng'];
} else {
    echo "0 results";
}

// Извлечение данных из таблицы faq
$sql = "SELECT * FROM section_faq";
$faqResult = $conn->query($sql);
$faqs = [];
if ($faqResult->num_rows > 0) {
    while($row = $faqResult->fetch_assoc()) {
        $faqs[] = $row;
    }
} else {
    echo "0 results";
}

// Извлечение данных из таблицы slider_photos
$sql = "SELECT * FROM section_slider";
$result = $conn->query($sql);
$photos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row['slider_photo'];
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
    <?php include '../connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/teachers.css">
    <link rel="stylesheet" href="../css/form.css"> 
    <style>
        .welcome {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('<?php echo "../../".$backgroundimage; ?>'); /* Полупрозрачный черный слой, передаём фото из базы */
        }
    </style>
</head>
<body>
<!-- Header -->
<?php include 'admin_header.php'; ?>

<!-- Main -->
<main class="main">
<!-- Приветственная секция -->
<section class="welcome fade-in">
<div class="container">
    <h1 class="title fade-in">Изменить секцию Welcome</h1>
    <form action="update_section-welcome.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="welcometitle" class="icon-p fade-in">Заголовок</label>
            <input type="text" class="form-control fade-in" id="welcometitle" name="welcometitle" value="<?php echo $welcometitle; ?>" required>
        </div>
        <div class="mb-3">
            <label for="welcomep" class="icon-p fade-in">Подпись</label>
            <textarea class="form-control fade-in" id="welcomep" name="welcomep" required><?php echo $welcomep; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="backgroundimage" class="icon-p fade-in">Фотография</label>
            <input type="file" class="form-control fade-in" id="backgroundimage" name="backgroundimage">
            <img src="<?php echo "../../".$backgroundimage; ?>" alt="Current Image" class="img-thumbnail mt-3 fade-in" style="max-height: 200px;">
            <input type="hidden" name="currentimage" value="<?php echo $backgroundimage; ?>">
        </div>
        <button type="submit" class="form-button welcome-links__app fade-in">Изменить</button>
    </form>
</div>
</section>

<!-- Секция Направления -->
<section class="directions">
    <div class="container">
        <h1 class="directions-title title fade-in">Изменить секцию Направления</h1>
        <div class="row">
            <?php foreach ($directions as $direction): ?>
                <div class="col-md-4 directions-item">
                    <div class="directions-item_links">
                        <div class="directions-item_links_img fade-in">
                            <img src="<?php echo '../../img/musical_Instruments_icon/' . $direction['directionsImg']; ?>" alt="иконка <?php echo $direction['iconP']; ?>">
                        </div>
                        <div class="directions-item_links_title fade-in">
                            <p class="icon-p"><?php echo $direction['iconP']; ?></p>
                        </div>
                        <div class="fade-in">
                            <a href="edit_direction.php?idd=<?php echo $direction['idd']; ?>" class="welcome-links__contact">Изменить</a>
                            <a href="delete_direction.php?idd=<?php echo $direction['idd']; ?>" class="welcome-links__contact" onclick="return confirm('Вы уверены, что хотите удалить эту иконку?')">Удалить</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Форма для добавления новой иконки -->
        <h2 class="directions-title title fade-in">Добавить новое направление</h2>
        <form action="add_new_direction.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 fade-in">
                <label for="iconp" class="icon-p">Название направления</label>
                <input type="text" class="form-control" id="iconp" name="iconp" required>
            </div>
            <div class="mb-3 fade-in">
                <label for="directionsimg" class="icon-p">Фотография</label>
                <input type="file" class="form-control" id="directionsimg" name="directionsimg" required>
            </div>
            <button type="submit" class="form-button welcome-links__app fade-in">Добавить</button>
        </form>
    </div>
</section>

<!-- Секция Преподаватели -->
<section class="teachers" id="teachers">
        <h1 class="teachers-title title fade-in">Изменить секцию Наша команда</h1>
        <div class="teachers-grid">
            <?php foreach ($teachers as $index => $teacher): ?>
                <!-- Если индекс кратен 3 и не равен нулю, начинаем новый ряд -->
                <?php if ($index % 3 == 0 && $index != 0): ?>
                    </div><div class="row">
                <?php endif; ?>
                <div class="teachers-item fade-in">
                    <div class="teachers-item_links">
                        <div class="teachers-item_links_img fade-in">
                            <img src="<?php echo '../../img/teachers/' . htmlspecialchars($teacher['teachersImg'], ENT_QUOTES, 'UTF-8'); ?>" alt="Фото <?php echo htmlspecialchars($teacher['nameP'], ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="teachers-item_links_title fade-in">
                            <p class="icon-p"><?php echo htmlspecialchars($teacher['nameP'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="icon-p"><?php echo htmlspecialchars($teacher['descriptionP'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="fade-in">
                            <a href="edit_teachers.php?idt=<?php echo htmlspecialchars($teacher['idt'], ENT_QUOTES, 'UTF-8'); ?>" class="welcome-links__contact">Изменить</a>
                            <a href="delete_teachers.php?idt=<?php echo htmlspecialchars($teacher['idt'], ENT_QUOTES, 'UTF-8'); ?>" class="welcome-links__contact" onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> <!-- Закрываем последний ряд -->

        <!-- Форма для добавления нового преподавателя -->
        <div class="container">
        <h2 class="teachers-title title fade-in">Добавить нового преподавателя</h2>
        <form action="add_new_teachers.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 fade-in">
                <label for="namep" class="icon-p">Имя</label>
                <input type="text" class="form-control" id="namep" name="namep" required>
            </div>
            <div class="mb-3 fade-in">
                <label for="descriptionp" class="icon-p">Описание</label>
                <input type="text" class="form-control" id="descriptionp" name="descriptionp" required>
            </div>
            <div class="mb-3 fade-in">
                <label for="teachersimg" class="icon-p">Фотография</label>
                <input type="file" class="form-control" id="teachersimg" name="teachersimg" required>
            </div>
            <button type="submit" class="form-button welcome-links__app fade-in">Добавить</button>
        </form>
    </div>
</section>

<!-- Секция Концерты -->
<section class="current-slider-photos">
    <div class="container">
        <h2 class="teachers-title title fade-in">Изменить секцию Концерты</h2>
        <div class="row">
            <?php foreach ($photos as $photo): ?>
                <div class="col-md-4">
                    <div class="card mb-3 fade-in">
                        <img src="<?php echo '../../img/concerts/' . $photo; ?>" class="card-img-top" alt="Slider Photo">
                        <div class="card-body fade-in">
                            <a href="delete_slider_photo.php?photo=<?php echo urlencode($photo); ?>" class="form-button welcome-links__app" onclick="return confirm('Вы уверены, что хотите удалить эту фотографию?')">Удалить</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Форма для добавления новой фотографии -->
<section class="slider-section">
    <div class="container">
        <h2 class="teachers-title title fade-in">Добавить новую фотографию в слайдер</h2>
        <form action="add_new_slider_photo.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 fade-in">
                <label for="slider_photo" class="icon-p">Фотография</label>
                <input type="file" class="form-control" id="slider_photo" name="slider_photo" required>
            </div>
            <button type="submit" class="form-button welcome-links__app fade-in">Добавить</button>
        </form>
    </div>
</section>
</section>

<!-- Секция О нас -->
<section class="about_us">
    <div class="container">
                <h1 class="teachers-title title fade-in">Изменить секцию О нас</h1>
            <form action="update_section-about-us.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 fade-in">
                <label for="aboutus" class="icon-p">Описание</label>
                <textarea class="form-control" id="aboutus" name="aboutus" rows="5" required><?php echo $about_us; ?></textarea>
            </div>
            <button type="submit" class="form-button welcome-links__app fade-in">Изменить</button>
        </form>
    </div>
</section>

<!-- Секция Ответы на вопросы -->
<section class="faq-section">
    <div class="container">
        <h1 class="teachers-title title fade-in">Изменение секции FAQ</h1>
        <div class="faq-list">
            <?php foreach ($faqs as $faq): ?>
                <div class="faq-item">
                    <h2 class="icon-p fade-in"><?php echo htmlspecialchars($faq['question_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="icon-p fade-in"><?php echo htmlspecialchars($faq['question_text'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <a href="edit_faq.php?idfaq=<?php echo $faq['idfaq']; ?>" class="form-button welcome-links__app fade-in">Изменить</a>
                    <a href="delete_faq.php?idfaq=<?php echo $faq['idfaq']; ?>" class="form-button welcome-links__app fade-in" onclick="return confirm('Вы уверены, что хотите удалить этот вопрос?')">Удалить</a>
                </div>
            <?php endforeach; ?>
        </div>
        <h2 class="teachers-title title">Добавить новый вопрос</h2>
        <form action="add_new_faq.php" method="post">
            <div class="mb-3 fade-in">
                <label for="question_title" class="icon-p">Заголовок вопроса</label>
                <input type="text" class="form-control" id="question_title" name="question_title" required>
            </div>
            <div class="mb-3 fade-in">
                <label for="question_text" class="icon-p">Текст вопроса</label>
                <textarea class="form-control" id="question_text" name="question_text" rows="3" required></textarea>
            </div>
            <button type="submit" class="form-button welcome-links__app fade-in">Добавить</button>
        </form>
    </div>
</section>

<!-- Секция Контакты -->
<section class="contacts">
    <div class="container">
            <h1 class="teachers-title title fade-in">Изменить секцию Контакты</h1>
            <form action="update_section-contacts.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 fade-in">
            <label for="phone" class="icon-p">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
        </div>
        <div class="mb-3 fade-in">
            <label for="city" class="icon-p">Город</label>
            <textarea class="form-control" id="city" name="city" required><?php echo $city; ?></textarea>
        </div>
        <div class="mb-3 fade-in">
            <label for="address" class="icon-p">Адресс</label>
            <textarea class="form-control" id="address" name="address" required><?php echo $address; ?></textarea>
        </div>
        <div class="mb-3 fade-in">
            <label for="centerlat" class="icon-p">Координаты</label>
            <textarea class="form-control" id="centerlat" name="centerlat" required><?php echo $center_lat; ?></textarea>
        </div>
        <div class="mb-3 fade-in">
            <label for="centerlng" class="icon-p">Координаты</label>
            <textarea class="form-control" id="centerlng" name="centerlng" required><?php echo $center_lng ?></textarea>
        </div>
        <button type="submit" class="form-button welcome-links__app fade-in">Изменить</button>
    </form>
    </div>      
</section>
</main>
<!-- Footer -->
<?php include 'admin_footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/animation.js"></script>
</body>
</html>