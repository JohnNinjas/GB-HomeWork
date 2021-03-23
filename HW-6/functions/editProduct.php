<button><a href="../catalog.php"">Каталог</a></button>
<button><a href="../admin/admin.php">Администрирование</a></button><br><br>
<?php
require_once('../database/database.php');
$result = mysqli_query($link, "SELECT * FROM products WHERE {$_GET['id']} = id");
$item = mysqli_fetch_assoc($result);
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="dat" value="<?php echo $item['image']?>"> <br><br>
    <input type="text" name="name" value="<?php echo $item['productname']?>"> Название товара<br><br>
    <input name="price" value="<?php echo $item['price']?>" type="number"> Цена<br><br>
    <input type="submit" value="Сохранить">
</form>

<?php
$name = htmlspecialchars(strip_tags($_POST['name']));
$price = htmlspecialchars(strip_tags($_POST['price']));
$fileName = 'img/' . htmlspecialchars(strip_tags($_FILES['dat']['name']));
$sql = "UPDATE Products SET productname = '$name', price = '$price', image = '$fileName' WHERE {$_GET['id']} = id";
if (mysqli_query($link, $sql)) {
    echo "Товар успешно отредактирован";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>
