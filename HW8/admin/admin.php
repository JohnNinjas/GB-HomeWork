<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="../styles/style.css" rel="stylesheet">
    <button><a href="../catalog.php"">Каталог</a></button>
</head>
<body>
<?php
require_once('../database/database.php');
require_once('../functions/check.php');
$dir = 'img/';
if (!(isAdmin())) {
    echo "У вас нет прав администратора";
    die;
}
?>
<button><a href="../functions/createProduct.php" target="_blank">Добавить товар</a></button>
<button><a href="../functions/logout.php">Logout</a></button>
<div class="shop">
    <?php
    $result = mysqli_query($link, "SELECT * FROM products");
    $row = mysqli_fetch_array($result);
    foreach ($result as $row) : ?>
        <div class="shopUnitimage">
            <img src="../<?php echo $row['image'];?>" />
            <div class="shopUnitName">
                <?php echo $row['productname']; ?>
            </div>
            <div class="shopUnitPrice">
                Цена: <?php echo $row['price']; ?>
            </div>
            <a href="../product.php?id=<?php echo $row['id']; ?>" class="shopUnitMore">
                Подробнее
            </a>
            <a href="../functions/deleteProduct.php?id=<?php echo $row['id']; ?>" class="shopUnitMore">
                Удалить товар
            </a>
            <a href="../functions/editProduct.php?id=<?php echo $row['id']; ?>" class="shopUnitMore">
                Редактировать товар
            </a>
        </div>
    <?php endforeach; ?>
    <?php
    $custom = mysqli_query($link, "
    SELECT o.name, o.number, o.homeaddress, oi.price, oi.quantity, oi.product_id, p.productname FROM `order` as o 
    INNER JOIN order_items as oi ON o.id = oi.order_id 
    INNER JOIN products as p ON oi.product_id = p.id ORDer BY p.id");
    $orders = mysqli_fetch_array($custom);

    if($custom)
    {
        $rows = mysqli_num_rows($custom);
        echo "<table><tr><th>Имя</th><th>Телефон</th><th>Адрес</th><th>Цена</th><th>Наименование продукта</th></tr>";
        for ($z = 0 ; $z < $rows ; ++$z)
        {
            $count_row = mysqli_fetch_row($custom);
            echo "<tr>";
            for ($x = 0 ; $x < 10 ; ++$x) echo "<td>$count_row[$x]</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($custom);
    }
    ?>
</div>
</body>
</html>