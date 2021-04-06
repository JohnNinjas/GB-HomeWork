<?php
require_once('../database/database.php');
$sql = "DELETE FROM Products WHERE id = {$_GET['id']}";
if (mysqli_query($link, $sql)) {
    header("Location: ../admin/admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>
