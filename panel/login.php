<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Autorization</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../img/er1.PNG" type="image/jpg">
</head>
<body>
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Авторизация</h1>
      </div>
      <form class="login-form" action="check.php" method="post">
        <div class="control-group">
        <input id="login" name="login" type="text" class="input" placeholder="Логин">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>
        <div class="control-group">
        <input id="pass" type="password" class="input" name="pass" data-type="password" placeholder="Пароль">
        <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
        <button type="submit" class="btn btn-primary btn-large btn-block" name="submit" href="#">Войти</button>
</form>
    </div>
  </div>
</body>
</html>