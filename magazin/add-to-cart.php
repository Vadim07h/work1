<?php
session_start();


header('Location: basket.php');

if (!isset($_SESSION['user'])) {
  header("Location: basket.php");
} 
else { 
if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];


    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {

        $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
        $sql = "SELECT * FROM products WHERE id={$product_id}";
        $result = mysqli_query($conn,$sql);
        $product = mysqli_fetch_assoc($result);
        mysqli_close($conn);

        if($product){
            $product['quantity'] = 1;
            $_SESSION['cart'][$product_id] = $product;
        }
    }
}
header("Location: index.php");
}



?>