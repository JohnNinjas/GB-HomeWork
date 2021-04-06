<?php
session_start();
require_once('database/database.php');
require_once('functions/check.php');
$totalPrice = 0;
?>
<?php if(isset($_SESSION['cart'])) : ?>
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
<form method="POST">
    <input type="text" name="name">Имя<br><br>
    <input type="tel" name="phone">Телефон<br><br>
    <input type="text" name="address">Адрес<br><br>
    <input type="submit" value="Оформить заказ" name="order_submit">
</form>
<?php
    if ($_POST[order_submit]) {
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $phone = htmlspecialchars(strip_tags($_POST['phone']));
        $address = htmlspecialchars(strip_tags($_POST['address']));
        $sql = "INSERT INTO `stortables`.`order`  (name, number, homeaddress) VALUES ('$name', '$phone', '$address')";

        if (mysqli_query($link, $sql)) {
            $orderId = mysqli_insert_id($link);
            foreach ($_SESSION['cart'] as $item) {
                $productId = $item['id'];
                $quantity = $item['count'];
                $price = $_SESSION['price'][$productId];
                $order = "INSERT INTO `stortables`.`order_items`  (order_id, product_id, price, quantity) VALUES ($orderId, $productId, '$price', '$quantity')";
                if (mysqli_query($link, $order)) {
                    echo "Заказ оформлен";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
            unset($_SESSION['cart']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }
?>