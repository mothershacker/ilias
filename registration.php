<?php
session_start();
include "header.php"
?>
<head>
<link rel="shortcut icon" href="img/er1.PNG" type="image/jpg">
</head>
<body>
    <section class="main">
        <div class="registration-form">
            <form action="" method="post">
                <p><input type="email" name="email" placeholder="Почта" required></p>
                <p><input type="password" name="password" placeholder="Пароль" required></p>
                <p><input type="text" name="name" placeholder="Имя" required></p>
                <p><input type="text" name="address" placeholder="Город" required list="cities">
                    <datalist id="cities">
                        <option value="Москва">
                        <option value="Бишкек">
                        <option value="Домодедово">
                        <option value="Алматы">
                        <option value="Казань">
                    </datalist>
                </p>
                <p><input type="tel" name="phone" id="phone" placeholder="Телефон" required></p>
                <p><input type="submit" class="submit-btn" name="submit" value="Зарегистрироваться"></p>
            </form>
            <p class="log-link">Уже зарегистрированы? <a href="login.php">Войти</a></p>
        </div>
    </section>
</body>
<script>
    var phone = document.getElementById("phone");
    window.onload = function() {
    phone.value = "+7" + phone.value;
    };
    phone.onfocus = function() {
        if (phone.value === "") {
            phone.value = "+7";
        }
    };
</script>
<?php
$db = mysqli_connect("localhost", "root", "", "bd");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неверный формат email";
        exit();
    }
    if (!filter_var($phone, FILTER_VALIDATE_INT)) {
        echo "Неверный формат телефона";
        exit();
    }


    $password = md5($password);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Такой email уже зарегистрирован";
        exit();
    }

    $sql = "INSERT INTO users (email, password, name, address, phone) VALUES ('$email', '$password', '$name', '$address', '$phone')";
    if (mysqli_query($db, $sql)) {
        echo "Регистрация успешна";
    } else {
        echo "Ошибка: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>