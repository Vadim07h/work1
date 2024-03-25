<?php
session_start();
include "header.php";
?>


<h2 class="center">Подтвердите почту</h2>
    <form method="post" class="form3" action="process_confirmation.php">
        <input type="text" name="confirmation_code" placeholder="Введите код" autocomplete="off" required>
        <div class="prok">
    <button class="button" type="submit">Проверить</button>
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