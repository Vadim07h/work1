<?php
session_start(); 
if(!$_SESSION['user']){
    header('Location: auth.php');
}
include "header.php";

?>

<div class="info-profil">
  <div class="id">
    <h1>ID: <?= $_SESSION['user']['id'] ?></h1>
  </div>
  <div class="name">
    <h1>Имя: <?= $_SESSION['user']['name'] ?></h1>
  </div>
  <div class="surname">
    <h1>Фамилия: <?= $_SESSION['user']['surname'] ?></h1>
  </div>
  <div class="email">
    <h1>Email: <?= $_SESSION['user']['email'] ?></h1>
  </div>
</div>
<div class="exit1">
<a href="exit.php" class="exit">Выйти</a>
</div>

<?php
include "footer.php";
?>