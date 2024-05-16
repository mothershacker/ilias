<?php
include "header.php";
?>

<body>
    <section class="main">
        <div class="login-form">
            <form action="" method="post">
                <p><input type="email" name="email" placeholder="Почта" required></p>
                <p><input type="password" name="password" placeholder="Пароль" required></p>
                <p><input type="submit" class="submit-btn" id="lgn" name="submit" value="Войти"></p>
            </form>
        </div>
    </section>
    <p class="log-link" id="logl">Еще не зарегистрированы? <a href="registration.php">Регистрация</a></p>
</body>
<?php
$db = mysqli_connect("localhost", "root", "", "bd");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Получаем пароль из формы
    $password = md5($password); // Хешируем пароль в md5

    // Проверяем существование пользователя в базе данных
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; // Формируем запрос
    $result = mysqli_query($db, $sql); // Выполняем запрос
    if (mysqli_num_rows($result) > 0) { // Если есть хотя бы одна запись
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        session_start();
        $_SESSION['user_id'] = $user_id;
        echo "Вход успешен"; // Выводим сообщение об успехе
        header('Refresh: 2; URL=index.php');
    } else { // Иначе
        echo "Неверная почта или пароль"; // Выводим сообщение об ошибке
    }
}
mysqli_close($db);
?>
