<?php
  setcookie('admin', $admin['name'], time() - 3600, "/");
  header('Location: login.php');
?>