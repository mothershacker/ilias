<?php
require 'connect.php';
session_reset();
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Необходимо авторизоваться, чтобы воспользоваться личным кабинетом!";
    header('Refresh:2, URL=login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$strSQL = "SELECT * FROM users WHERE user_id=?";

// Подготовить запрос и связать параметры
$stmt = $mysqli->prepare($strSQL);
$stmt->bind_param("i", $user_id);

// Выполнить запрос и получить результат
$stmt->execute();
$result = $stmt->get_result();

// Получить ассоциативный массив с данными пользователя
$row = $result->fetch_assoc();

// Закрыть соединение с БД
?>
<html lang="en">
<title>Profile | Style Loft</title>
<link rel="shortcut icon" href="img/er1.PNG" type="image/jpg">
<body>
    <?php
    include "header.php";
    ?>
    <section class="main">
        <h1 class="store-text" id="cab">Личный кабинет</h1>
        <div class="cabinet-wrapper">
            <div class="cabinet-information">
                <p class="user-data">Ваши данные:</p>
                <div class="user-information">
                    <p class="pp">Имя: <?= $row['name'] ?></p>
                    <p class="pp">Почта: <?= $row['email'] ?></p>
                    <p class="pp">Телефон: <?= $row['phone'] ?></p>
                    <p class="pp">Город: <?= $row['address'] ?></p>
                    <p><a href="logout.php" class="cbb">Выход</a></p>
                </div>
            </div>
            <div class="orders-information">
            <p class="user-data" id="dd">Ваши Заказы:</p>
                <?php
                $sql = "SELECT order_id, date, status, price, worker FROM orders WHERE user_id = '$user_id'";
                $result = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // создаем таблицу с заголовками
                    echo "<table class='orders'>
      <tr>
        <th class='t1'>Номер заказ</th>
        <th class='t1'>Статус</th>
        <th class='t1'>Итого</th>
        <th class='t1'>Имя Дизайнера</th>
      </tr>";

                    // извлекаем данные из результата в цикле
                    while ($row = mysqli_fetch_assoc($result)) {
                        // выводим данные в ячейки таблицы
                        echo "<tr>
        <td>" . $row['order_id'] . "</td>
        <td>" . $row['status'] . "</td>
        <td>" . $row['price'] . "</td>
        <td>" . $row['worker'] . "</td>
      </tr>";
                    }

                    // закрываем таблицу
                    echo "</table>";
                }
                mysqli_close($mysqli);
                ?>
            </div>
        </div>
    </section>
</body>

</html>