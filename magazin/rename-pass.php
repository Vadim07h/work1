<?php
session_start();
include "header.php";
?>
<form action="rename-password.php" class="form" method="POST">
    <label>Введите новый пароль:</label>
    <input type="password" name="rename-password" id="rename-password" autocomplete="off" required>
    <label>Подтвердите пароль:</label>
    <input type="password" name="rename-password_confirm" id="rename-password-confirm" autocomplete="off" required>
    <div class="prok">
    <button class="button" type="submit">Сменить пароль</button>
    </div>
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