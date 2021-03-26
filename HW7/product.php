<?php
session_start();
?>
<link href="styles/style.css" rel="stylesheet">
<div id="content">
    <?php
    require_once('database/database.php');
    $result = mysqli_query($link, "SELECT * FROM products WHERE {$_GET['id']} = id");
    $good = mysqli_fetch_assoc($result);
    ?>
    <div id="openedProduct-img">
        <img src="<?php echo $good['image']; ?>">
    </div>
    <div id="openedProduct-content">
        <h1 id="openedProduct-name">
            <?php echo $good['productname']; ?>
        </h1>
        <div id="openedProduct-price">
            Цена: <?php echo $good['price']; ?>
        </div>
        <?php $_SESSION['cart'][$_GET['id']] = $_GET['id'] ?>
        <?php $_SESSION['count'][$_GET['id']][rand()] = $_GET['id'] ?>
    </div>
</div>


