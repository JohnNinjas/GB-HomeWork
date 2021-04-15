<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
<?php
require_once('database/database.php');
$dir = '../img/';
?>
<?php
require_once('functions/check.php');
?>
<?php
$totalPrice = 0;
?>
<div class="shop">
    <?php if(isset($_SESSION['cart'])) : ?>
    <?php
    foreach ($_SESSION['cart'] as $key=>$value) : ?>
    <?php
        $result = mysqli_query($link, "SELECT * FROM products where id=$value");
        $row = mysqli_fetch_array($result); ?>
        <div class="shopUnitimage">
            <img src="<?php echo $row['image'];?>" />
            <div class="shopUnitName">
                <?php echo $row['productname']; ?>
            </div>
            <div class="shopUnitPrice">
                Цена: <?php
                echo $row['price'];
                $_SESSION['price'][$row['id']] = $row['price'];
                $_SESSION['productname'][$row['id']] = $row['productname'];
                ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php
foreach ($_SESSION['count'] as $key=>$count) : ?>
    <div id="cart">
        Кол-во <?php echo $_SESSION['productname'][$key]?> : <?php
        echo count($_SESSION['count'][$key]) . 'шт';
        $totalPrice +=  $_SESSION['price'][$key] * count($_SESSION['count'][$key]);
        ?>
        Cтоимость: <?php
        echo  $_SESSION['price'][$key] * count($_SESSION['count'][$key]);
        ?>
    </div>
<?php endforeach; ?>
<div id="cart">
    Общая сумма: <?php echo $totalPrice; ?>
</div>
</body>
</html>
