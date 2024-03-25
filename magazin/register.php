<?php
session_start(); 
if(isset($_SESSION['user'])){
    header('Location: profil.php');
}
include "header.php";

?>
<div class="center">
<form class="form1" action="reg.php" method="POST">
    <label for="">Login</label>
    <input type="text" name="login" autocomplete="off" placeholder="Введите login">

    <label for="">Имя</label>
    <input type="text" name="name" placeholder="Введите имя">

    <label for="">Фамилия</label>
    <input type="text" name="surname" placeholder="Введите фамилию">

    <label for="">Почта</label>
    <input type="email" name="email" autocomplete="off" placeholder="Введите почту">

    <label for="">Пароль</label>
    <input type="password" name="password" autocomplete="off" placeholder="Введите пароль">

    <label for="">Подтвердите пароль</label>
    <input type="password" name="password_confirm" autocomplete="off" placeholder="Подтвердите пароль">
    <button class="button">Зарегистрироваться</button>
    <p class="vt1">Уже есть аккаунт? - <a href="auth.php" class="acc">войти</a></p>
    <?php 
        if(isset($_SESSION['message'])){
         echo '<p class="msg1">' .$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
    ?>
</form>
</div>

<?php
include "footer.php";
?>