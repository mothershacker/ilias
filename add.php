<?php
session_start();
	$name = filter_var(trim($_POST['name']),
	FILTER_SANITIZE_STRING);
	$price = filter_var($_POST['price']);
    $email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
    $task = filter_var(trim($_POST['task']),
	FILTER_SANITIZE_STRING);
	$date = date('Y-m-d');
	$user_id = $_SESSION['user_id'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 echo "Неверный формат email";
	 exit();
 }
 if (!filter_var($phone, FILTER_VALIDATE_INT)) {
	 echo "Неверный формат телефона";
	 exit();
 }
    $mysql = new mysqli('127.0.0.1','root','','bd');
	
	$mysql->query("INSERT INTO `orders` (`user_id`, `date`, `status`, `price`, `name`, `email`, `task`, `worker`)
	VALUES('$user_id', '$date','Заказ в обработке','$price','$name', '$email', '$task', 'Lozman');
	");

	$mysql->close();

	header('Location: https://t.me/+ceffIW96SoAwYmFi');
	exit();
?>