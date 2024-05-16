<!DOCTYPE html>

<html lang="ru">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/er1.PNG" type="image/jpg">
</head>

<body>
<?php if($_COOKIE['admin'] == ''):
header('Location: login.php');
?>
<?php endif ?>
<div class="container">
<div class="top">
<table width="90" height="30" border="0" cellspacing="0" cellpadding="4"><tr>      
            <td valign="middle"><a href="exit.php">Выйти</a></td>
</tr>
  </table>
</div>
</div>

<div class="container">
<div class="content">
  <h1>Список заказов</h1>

<div class="menu">
<div class="color_grey">
<table class="tab_grey" cellpadding="7" cellspacing="0">
<tr>
<td width="60">№<br>заказа</td>
<td width="110">Имя заказчика</td>
<td width="250">Контакты заказчика</td>
<td width="390">Задание</td>
<td width="220">Дизайнер</td>
<td width="150">Статус</td>
</tr></table>
</div>
</div>

<?php

$mysqli = @new mysqli('127.0.0.1', 'root', '', 'bd');
if($_COOKIE['admin'] != '') {

$result1 = $mysqli->query('SELECT *
FROM orders
order by order_id DESC');
$row1 = mysqli_fetch_array($result1);

if($row1['order_id'] != null) {

  $query = $mysqli->query('SELECT *
  FROM orders
  order by order_id DESC');
  $rowquery = $query->num_rows; ?>
  <div class='color'>
  <table class='tab_zakaz' cellpadding='7' cellspacing='0'><tr>
    <?php
  for($i = 0; $i < $rowquery; ++$i)
{
  $query -> data_seek($i);
  $row = $query -> fetch_array();
  ?>
  <td  width='60'>
  <?=$row['order_id']?></td>
  

  <td width='110'>
  <?=$row['name']?>
  </td>
  <td class='tab_td_model' width='250'>
  <?=$row['email']?>
  </td>
  <td width="390">
  <?=$row['task']?>
  </td>
  <td width="220">
  <?=$row['worker']?>
  </td>
  <td width='150'>
  <?=$row['status']?>
  </td></tr>
  
<?php } ?>
</table>
</div>
	
  <?php
while($row1 = mysqli_fetch_array($result1));
$result1->close();
} else {
    do
  { ?>
    
    <?php
}
while($row1 = mysqli_fetch_array($result1));
$result1->close();
}
$mysqli->close(); }
?>
</div>
</div>
</body></html>