<?php
if (isset($_FILES['dat'])) {
    $file = $_FILES['dat'];
    $name = $file['name'];
    $size = $file['size'];
    $type = $file['type'];
    $location = $file['tmp_name'];
    move_uploaded_file($location, $dir . $name);
}

function isAdmin() {
    if ($_SESSION['user_role'] == 'admin') {
        return true;
    }
    return false;
}
?>