<?php
// Подключение к базе данных
include 'connect/connect_db.php';

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
    <?php include 'connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- Header -->
<?php include 'connect/header.php'; ?>

<!-- Main -->
<main class="main">
<section class="concerts">
    <div class="container">
        <div class="contacts-flex-container">
            <div class="concerts-info">
                <h1 class="main-title concerts-title fade-in">Концерты</h1>
            </div>
        </div>

        <div class="carousel-container fade-in">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    foreach ($photos as $index => $photo) {
                        $activeClass = $index === 0 ? 'active' : '';
                        echo '<div class="carousel-item ' . $activeClass . '">';
                        echo '    <img src="../img/concerts/' . $photo . '" class="d-block w-100" alt="...">';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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