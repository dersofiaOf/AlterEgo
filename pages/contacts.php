<?php
// Подключение к базе данных
include 'connect/connect_db.php';

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
<section class="contacts">
    <div class="container">
        <div class="contacts-flex-container">
            <div class="contacts-info">
                <h1 class="main-title contacts-title fade-in">Контакты</h1>
                <p class="main-p contacts-p fade-in"><?php echo $phone; ?></p>
                <p class="main-p contacts-p fade-in"><?php echo $city; ?></p>
                <p class="main-p contacts-p fade-in"><?php echo $address; ?></p>
            </div>
            <div class="contacts-card fade-in">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>
</section>
</main>

<!-- Footer -->
<?php include 'connect/footer.php'; ?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш_API-ключ&lang=ru_RU"></script>
<script>
    let center = [<?php echo $center_lat; ?>, <?php echo $center_lng; ?>];

    function init() {
        let map = new ymaps.Map('map', {
            center: center,
            zoom: 21
        });

        map.controls.remove('geolocationControl'); // удаляем геолокацию
        map.controls.remove('searchControl'); // удаляем поиск
        map.controls.remove('trafficControl'); // удаляем контроль трафика
        map.controls.remove('typeSelector'); // удаляем тип
        map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
        map.controls.remove('zoomControl'); // удаляем контрол зуммирования
        map.controls.remove('rulerControl'); // удаляем контрол правил
    }

    ymaps.ready(init);
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/animation.js"></script>
</body>
</html>