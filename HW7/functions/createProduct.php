<button><a href="../catalog.php"">Каталог</a></button>
<button><a href="../admin/admin.php">Администрирование</a></button><br><br>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="dat"><br><br>
    <input type="text" name="name"> Название товара<br><br>
    <input type="number" name="price"> Цена<br><br>
    <input type="submit" value="Сохранить">
</form>

<?php
require_once('../database/database.php');
$name = htmlspecialchars(strip_tags($_POST['name']));
$price = htmlspecialchars(strip_tags($_POST['price']));
$fileName = 'img/' . htmlspecialchars(strip_tags($_FILES['dat']['name']));
$sql = "INSERT INTO Products (productname, price, image) VALUES ('$name', $price, '$fileName')";
if (mysqli_query($link, $sql)) {
    echo "Новый товар успешно создан";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>
