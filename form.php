<!DOCTYPE html>

<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="img/er1.PNG" type="image/jpg">
<title>Form</title>
<link href="panel/style.css" rel="stylesheet" type="text/css">
<meta id="myViewport" name="viewport" content="width=1000">
</head>

<body>
<?php
require 'connect.php';
session_start();
$sql = "SELECT * FROM products";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die('Could not query the database: ' . mysqli_error($mysqli));
}
if (!isset($_SESSION['user_id'])) {
    header('Refresh: 0; URL=../registration.php');
    echo '<div class="alert">Нужно зарегистрироваться</div>';
    exit;
}
?>
<div class="container">
<div class="content">
<div class="row">
  <div class="col-75">
    <div class="container1">
      <form action="add.php" method="post">
        <div class="row">
          <div class="col-50">
            <label for="fname"><i class="fa fa-user"></i> Ваше имя</label>
            <input type="text" name="name" id="name" minlength="2" maxlength="200">
            <label for="adr"><i class="fa fa-address-card-o"></i> E-mail</label>
            <input type="text" name="email" id="email" minlength="5" maxlength="100">
            <label for="adr"><i class="fa fa-address-card-o"></i>Цена</label>
            <input type="text" name="price" id="price" minlength="5" maxlength="100">
            <label for="city"><i class="fa fa-institution"></i> Задание</label>
            <input type="text" name="task" id="task" minlength="10" maxlength="100">
          </div>
          </div>
          <button type="submit" class="btn">Заказать</button>
          </form>
          </div>
          </div>
          </div>
</div>
</div>
</body></html>