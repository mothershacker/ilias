<?php
require 'connect.php';
session_start();
$sql = "SELECT * FROM products";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die('Could not query the database: ' . mysqli_error($mysqli));
}
if (!isset($_SESSION['user_id'])) {
    header('Refresh: 0; URL=registration.php');
    echo '<div class="alert">Нужно зарегистрироваться</div>';
    exit;
}
?>
<html lang="en">
    <head><link rel="shortcut icon" href="img/er1.PNG" type="image/jpg">
</head>
<?php include "header.php"; ?>
<body>
    <section class="main">
        <div class="store-wrapper">
            <div class="store-text" id="st1">Каталог</div>
            <div class="store-grid">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form action="add_to_cart.php" method="POST">';
                    echo '<div class="grid-item">';
                    echo '<div class="item-name">' . $row['name'] . '</div>';
                    echo '<div class="item-price">' . $row['price'] . '</div>';
                    echo '<div class="item-image"><img src="' . $row['image'] . '" alt=""></div>';
                    echo '<div class="item-btn"><button name="product_id" value="' . $row['product_id'] .'">Купить</button></div>';
                    echo '</div>';
                    echo '</form>';
                }
                ?>
            </div>
        </div>
        </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>
</html>