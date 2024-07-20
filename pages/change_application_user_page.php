<?php
session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Ego</title>
    <?php include 'connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<!-- Header -->

<?php include 'connect/header.php';
include 'connect/connect_db.php'; 

$ida = $_GET['ida'];
$sql = "SELECT * FROM application WHERE ida=" . $ida;
$result = $conn->query($sql);

// Проверка наличия записей
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Получение данных из базы
        $phone = $row['phone'];
        $description = $row['description'];
        $_SESSION['user_phone'] = $phone; 
        ?>


<!-- Nain -->
<main class="main">
    <section class="contacts">
        <div class="container">
            <div class="flex-container change-form">
                <div class="data_users">
                    <h1 class="main-title welcome-title fade-in">
                    Изменить заявку</h1>
                <br>
                <div class="form">
                    <form action="server_page/change_application_user_page_add.php" method="post" class="login-form__form">
                        <p class="title fade-in">Описание:</p>
                        <br>
                        <textarea name="description" id="description" class="form-input" rows="5"><?php echo $description; ?></textarea>
                        <br>
                        <input type="submit" name="submit" value="Изменить" class="form-buttom welcome-links__app">
                    </form>
                </div>
                </div>
            </div> 
        </div>
    </section>
</main>

        <?php
            }
        } else {
            echo "0 результатов";
        }
        
        // Закрыть соединение с базой данных
        $conn->close();
        ?>

<!-- Footer -->

<?php include 'connect/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/animation.js"></script>
</body>
</html>