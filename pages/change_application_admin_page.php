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
        // Получение имени пользователя из поля login
        $phone = $row['phone'];
        $_SESSION['user_phone'] = $phone;

        // Получение всех возможных статусов из таблицы applications
        $sql_status = "SELECT status FROM statuses";
        $result_status = $conn->query($sql_status);

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
                    <form action="server_page/change_application_admin_page_add.php" method="post" class="login-form__form">
                        <p class="title fade-in">Статус:</p>
                        <br>
                            <select name="status" id="status" class="form-input">
                                <?php
                                while ($row_status = $result_status->fetch_assoc()) {
                                    echo "<option value='" . $row_status['status'] . "'>" . $row_status['status'] . "</option>";
                                }
                                ?>
                            </select>
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