<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style Loft</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/er1.PNG" type="image/jpg">
</head>

<header>
    <div class="header-wrapper">
        <div class="brand"><a href="index.php">Style Loft</a></div>
        <ul class="navbar">
            <li class="navbtn"><a href="store.php" class="nav2">Каталог</a></li>
            <li class="navbtn"><a href="Start.html" class="nav4">О нас</a></li>
        <li class="user-buttons">
            <div class="user-acbtn">
                <?php if (isset($_SESSION['user_id'])) {
                        echo '<a href="cabinet.php" class="acbtn">'. 'Профиль' .'</a>';
                    } else {
                        echo '<a href="login.php" class="acbtn">Вход</a>';
                    } ?>
                    </div>
            </li>
        </ul>
    </div>
</header>


