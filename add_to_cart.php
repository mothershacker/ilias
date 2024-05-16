<?php
require 'connect.php';
$product_id = $_POST['product_id'];
// Получить user_id из $_SESSION (предполагая, что пользователь авторизован)
session_start();
$user_id = $_SESSION['user_id'];
// Выполнить SQL-запрос SELECT для проверки наличия товара в корзине для текущего пользователя
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    // Если результат не пустой, то есть такой товар уже есть в корзине
    if (mysqli_num_rows($result) > 0) {
        // Выполнить SQL-запрос UPDATE для увеличения значения quantity на единицу
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            // Перенаправить пользователя на страницу корзины
            header('Location: form.php');
        } else {
            // Вывести сообщение об ошибке при обновлении значения quantity
            echo 'Произошла ошибка при обновлении значения quantity';
        }
    } else {
        // Если результат пустой, то такого товара еще нет в корзине
        // Выполнить SQL-запрос INSERT для добавления новой записи о товаре и его количестве
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            // Перенаправить пользователя на страницу корзины
            header('Location: store.php');
        } else {
            // Вывести сообщение об ошибке при добавлении новой записи о товаре и его количестве
            echo 'Произошла ошибка при добавлении';
        }
    }
} else {
    // Вывести сообщение об ошибке при проверке наличия товара в корзине
    echo 'Произошла ошибка при проверке наличия товара в корзине';
}
?>