<?php
session_start();
require_once('../database/database.php');
require_once('../functions/check.php');
?>
<?php
if (isset($_POST['submit'])) {;
    $users = "SELECT * FROM users WHERE login = '{$_POST['login']}'";
    $login_link = mysqli_query($link, $users);
    $user = mysqli_fetch_array($login_link );
    $password = htmlspecialchars($_POST['password']);
    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['login'] = $user['login'];
        $_SESSION['user_role'] = $user['user_role'];
    } else {
        die('Неверно');
    }
}
if (isset($_SESSION['login'])) {
    echo "Привет {$_SESSION['login']}!";
} else { ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="login"> Login<br><br>
    <input type="password" name="password"> Password<br><br>
    <input type="submit" value="Войти" name="submit">
</form>
<?php } ?>
<button><a href="../catalog.php">К каталогу</a></button>