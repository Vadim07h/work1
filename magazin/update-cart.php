<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if(isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

      
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 'update';
        }

      
        if(isset($_SESSION['cart'][$product_id])) {
            $product = $_SESSION['cart'][$product_id];

            
            switch($action) {
                case 'decrease':
                    $product['quantity']--;
                    break;
                case 'increase':
                    $product['quantity']++;
                    break;
                default:
                    $product['quantity'] = $_POST['quantity'];
            }          
            if($product['quantity'] == 0) {
                unset($_SESSION['cart'][$product_id]);
            } else {
                
                $_SESSION['cart'][$product_id] = $product;
            }
        }
    }
}


header('Location: basket.php');
exit;