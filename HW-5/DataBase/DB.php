<?php
$link = mysqli_connect("127.0.0.1", "root", "root", "gallery");
if(!$link) {
    die(mysqli_connect_error($link));
}
$result = mysqli_query($link, "SELECT name FROM photos");
if (!$result) {
    die(mysqli_error($link));
}
while ($row = mysqli_fetch_assoc($result)) {
    echo "<a href='img/{$row['name']}'>{$row['name']}</a><br>";
}
mysqli_close($link);
