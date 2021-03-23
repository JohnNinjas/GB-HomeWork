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
$dir = 'img/';
?>
<button><a href="../functions/createProduct.php" target="_blank">Добавить товар</a></button>
<?php
require_once('../functions/check.php');
?>
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
    <?php endforeach; mysqli_close($link);?>
</div>
</body>
</html>
