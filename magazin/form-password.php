<?php
session_start();
include "header.php";
?>

<form action="change_password.php" class="form" method="POST">
    <label for="email">Введите вашу почту:</label>
    <input type="email" name="email" id="email" autocomplete="off" required>
    <div class="prok">
    <button class="button" type="submit">Отправить</button>
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