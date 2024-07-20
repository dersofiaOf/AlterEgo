<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Ego</title>
    <?php include 'connect/favicon.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<!-- Header -->

<?php include 'connect/header.php';
include 'connect/connect_db.php'; ?>

<!-- Nain -->
<main class="main">
    <section class="contacts">
        <div class="container">
            <div class="flex-container">
                <div class="data_users">
                    <h1 class="main-title profile-title">Профиль Администратора</h1>

                    <div class="profile_info">
<h1 class="profile-title title">Заявки</h1>
</div>

                    <?php
                    $sql = "SELECT * FROM application";
                    $result = $conn->query($sql);

                    // Если есть результаты, выводим их
                    if ($result->num_rows > 0) {
                        $counter = 0;
                        echo '<div class="row">'; // Начинаем вывод строк блоков

                        while($row = $result->fetch_assoc()) {
                            if ($counter % 3 == 0 && $counter != 0) {
                                echo '</div><div class="row">'; // Начинаем новую строку каждые 3 блока
                            }

                            echo '<div class="col-md-4 mb-4">'; // Блок с шириной 1/3 и нижним отступом
                            echo '<div class="card custom-card">'; // Добавляем custom-card для наших стилей
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">Заявка #' . $row["ida"] . '</h5>';
                            echo '<p class="card-text"><strong>Номер:</strong> ' . $row["phone"] . '</p>';
                            echo '<p class="card-text"><strong>Описание:</strong> ' . $row["description"] . '</p>';
                            echo '<p class="card-text"><strong>Статус:</strong> ' . $row["status"] . '</p>';
                            echo '<div class="d-flex justify-content-between">'; // Выравниваем кнопки по краям
                            echo '<a href="change_application_admin_page.php?ida=' . $row["ida"] . '" class=" welcome-links__app me-2">Изменить</a>'; // Добавляем правый отступ
                            echo '<a href="server_page/delete_application_admin_page.php?ida=' . $row["ida"] . '" class=" welcome-links__contact">Удалить</a>';
                            echo '</div>'; 
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            $counter++;
                        }

                        echo '</div>'; // Закрываем последнюю строку блоков
                    } else {
                        ?>
                        <p class="bold_label-p">Нет активных заявок</p>
                        <?php
                    }

                    $conn->close();
                    ?>
<a href="admin/admin_panel.php" class="icon-p">Изменить записи</ф>

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