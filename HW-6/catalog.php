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
<button><a href="admin/admin.php">Администрирование</a></button>
<div class="shop">
<?php
$result = mysqli_query($link, "SELECT * FROM products");
$row = mysqli_fetch_array($result);
   foreach ($result as $row) : ?>
      <div class="shopUnitimage">
     <img src="<?php echo $row['image'];?>" />
      <div class="shopUnitName">
         <?php echo $row['productname']; ?>
      </div>
      <div class="shopUnitPrice">
          Цена: <?php echo $row['price']; ?>
      </div>
          <a href="product.php?id=<?php echo $row['id']; ?>" class="shopUnitMore">
              Подробнее
          </a>
</div>
<?php endforeach; ?>
</div>
</body>
</html>