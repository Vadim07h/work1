<?php
session_start(); 
if(isset($_SESSION['user'])){
    header('Location: profil.php');
}
include "header.php";

?>

<form class="form" action="autha.php" method="POST">
    <label for="">Login</label>
    <input type="text" name="login" placeholder="Введите login">

    <label for="">Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">

    <button class="button">Войти</button>
    <p class="vt">Забыли пароль? - <a href="form-password.php" class="acc">Смените!</a></p>
    <p class="vt">Нету аккаунта? - <a href="register.php" class="acc">зарегистрироваться</a></p>
    <?php 
        if(isset($_SESSION['message'])){
         echo '<p class="msg">' .$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
    ?>
</form>


<?php
include "footer.php";
?>