<?php
session_start();
if ($_POST['cart_delete']) {
    if ($_SESSION['cart'][$_POST[product_id]]['count'] > 1) {
        $_SESSION['cart'][$_POST[product_id]]['count'] -= 1;
    } else {
        unset($_SESSION['cart'][$_POST[product_id]]);
    }
    header("Refresh:0");
}

require_once('database/database.php');
require_once('functions/check.php');
$dir = '../img/';
$totalPrice = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link href="styles/style.css" rel="stylesheet">
    <button><a href="catalog.php"">Каталог</a></button>
    <button><a href="order.php"">Оформить заказ</a></button>
</head>
<body>
<div class="shop">

    <?php if(!empty($_SESSION['cart'])) : ?>
    <?php
    foreach ($_SESSION['cart'] as $key=>$value) : ?>
    <?php
        $result = mysqli_query($link, "SELECT * FROM products where id=$key");
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
            <form method="POST">
                <input type="text" style="display: none" value="<? echo $row['id']?>" name="product_id">
                <input type="submit" class="shopUnitMore" value="Удалить из корзины" name="cart_delete">
            </form>
        </div>
    <?php endforeach; ?>
</div>
<?php
foreach ($_SESSION['cart'] as $item) : ?>
    <div id="cart">
        Кол-во <?php echo $_SESSION['productname'][$item['id']]?> : <?php
        echo $item['count'] . 'шт';
        $totalPrice +=  $_SESSION['price'][$item['id']] * $item['count'];
        ?>
        Cтоимость: <?php
        echo  $_SESSION['price'][$item['id']] * $item['count'];
        ?>
    </div>
<?php endforeach; ?>
<div id="cart">
    Общая сумма: <?php echo $totalPrice; ?>
</div>
<?php else :
    echo "Корзина пустая";
    ?>
<?php endif; ?>
</body>
</html>