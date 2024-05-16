<?php
    $login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);
    $mysql = new mysqli('127.0.0.1', 'root', '', 'bd');

    $result = $mysql->query("SELECT * FROM admins WHERE `login` = '$login' AND `pass` = '$pass'");

    $admin = $result->fetch_assoc();

  if(!empty($admin) == 0) {
    echo "
    <link href='style1.css' rel='stylesheet' type='text/css'>
    <div class='login'>
    <div class='login-screen'>
      <div class='app-title'>
        <h1>Авторизация</h1>
      </div>
      <form class='login-form' action='check.php' method='post'>
        <div class='control-group'>
        <label for='user' style='color:#ff0000'>Неправильно указан логин или пароль</label><p></p>
        <input id='login' name='login' type='text' class='input' placeholder='Логин'>
        <label class='login-field-icon fui-user' for='login-name'></label>
        </div>
        <div class='control-group'>
        <input id='pass' type='password' class='input' name='pass' data-type='password' placeholder='Пароль'>
        <label class='login-field-icon fui-lock' for='login-pass'></label>
        </div>
        <button type='submit' class='btn btn-primary btn-large btn-block' name='submit' href='#'>Войти</button>
</form>
    </div>
  </div>
           ";
    exit();
  }
  setcookie('admin', $admin['id'], time() + 3600, "/");


    $mysql->close();

    header('Location: panel.php');
?>