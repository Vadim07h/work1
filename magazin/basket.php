<?php
session_start();
?>
<?php
include "header.php";

if (!isset($_SESSION['user'])) {
  echo '<div class="alert"><h1 class="tex">Для того чтобы просмотреть корзину необходимо авторизоваться</h1></div>';
} else {
  $total = 0;
  foreach ($_SESSION['cart'] as $id => $product) {
    $total += $product['price'] * $product['quantity'];
}
if (isset($_SESSION['user'])) {
  $connect = mysqli_connect('localhost', 'root', '', 'vadim');
  $user_id = $_SESSION['user']['id'];
  $query = "SELECT promocode_status FROM users WHERE id = $user_id";
  $result = mysqli_query($connect, $query);
  if ($result && mysqli_num_rows($result) > 0) {
      $promocode_status = mysqli_fetch_assoc($result)['promocode_status'];
  } else {
      $promocode_status = 0;
  }
  mysqli_close($connect);
} else {
  $promocode_status = 0;
}


  ?>
  <script>
    function closeAlert() {
      var alert = document.querySelector('.alert');
      alert.style.display = 'none';
    }
  </script>
  <div class="cart-container">
    <?php if (empty($_SESSION['cart'])) : ?>
      <p class="korz">Ваша корзина пуста</p>
    <?php else : ?>
      <?php foreach ($_SESSION['cart'] as $id => $product) : ?>
        <div class="cart-item">
          <img src="<?php echo $product['photo']; ?>" alt="<?php echo $product['name']; ?>">
          <div class="product-name"><?php echo $product['name']; ?></div>
          <div class="product-price"><?php echo $product['price'] * $product['quantity']; ?> руб.</div>
          <form method="post" action="remove-from-cart.php">
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <button class="del"  type="submit">Удалить</button>
          </form>
        </div>
      <?php endforeach; ?>


    <div class="right1">
<form action="promo.php" class="form_promo" method="POST">
      <label for="promocode">Промокод:</label>
      <input type="text" id="promocode" name="promocode" placeholder="Введите промокод">
      <button type="submit" class="btn_promo">применить промокод</button>
      <?php 
        if(isset($_SESSION['message1'])){
         echo '<p class="msg1">' .$_SESSION['message1'].'</p>';
        }
        unset($_SESSION['message1']);
    ?>
  </form>
<?php
      if ($promocode_status) {
        echo '<div class="cart-total">Общая сумма со скидкой: ' . ($total * 0.85) . ' руб.</div>';
    } else {
        echo '<div class="cart-total">Общая сумма: ' . $total . ' руб.</div>';
    }
      ?>

    <?php endif; ?>
    


  </div>
  <div class="zak">
    <a href="index.php  " class="zakazat">Заказать</a>
  </div>
  <?php
}

include "footer.php";
?>


