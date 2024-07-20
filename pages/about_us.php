<?php
// Подключение к базе данных
include 'connect/connect_db.php';

// Извлечение данных из таблицы about_us
$sql = "SELECT * FROM section_about_us";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $about = $result->fetch_assoc();
    $about_text = $about['about_us'];
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
</head>
<body>
<!-- Header -->
<?php include 'connect/header.php'; ?>

<!-- Main -->
<main class="main">
<section class="about_us">
    <div class="container">
        <div class="about_us-flex-container">
            <div class="about_us-info">
                <h1 class="main-title about_us-title fade-in">О нас</h1>
            </div>
            <div class="about_us-info">
                <p class="main-p about_us-p fade-in"><?php echo $about_text; ?></p>
            </div>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <div class="faq-flex-container">
            <div class="faq-info">
                <?php foreach ($faqs as $faq) : ?>
                <div class="faq-info-item">
                    <p class="main-p faq_tit-p fade-in"><?php echo $faq['question_title']; ?></p>
                    <p class="main-p faq-p fade-in"><?php echo $faq['question_text']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="faq-info">
                <h1 class="main-title faq-title fade-in">Ответы на частые вопросы</h1>
            </div>
        </div>
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