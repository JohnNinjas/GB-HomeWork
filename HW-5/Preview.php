<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
</head>
<body>
<header>
<a href="Full.php">
Изображения ориганального размера
</a>
</header>
<?php
$dir = 'img/';
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="dat">
    <input type="submit" value="Upload">
</form>
<?php
if (isset($_FILES['dat'])) {
    $file = $_FILES['dat'];
    $name = $file['name'];
    $size = $file['size'];
    $type = $file['type'];
    $location = $file['tmp_name'];
    move_uploaded_file($location, $dir . $name);
}
$images = scandir($dir);
    for ($i = 0; $i < count($images); $i++) {
        if ($images[$i] != '.' && $images[$i] != '..') {
            echo '<a href="' . $dir . $images[$i] . '" target="_blank"><img src=' . $dir . $images[$i] . ' style="width: 200px;" alt="cars"></a>';
        }
    }

?>
</body>
</html>