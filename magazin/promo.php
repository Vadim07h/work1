<?php
session_start();
include "connect.php";

$promocode = $_POST['promocode'];

if ($promocode === "promo1") {
    $userId = $_SESSION['user']['id'];
    $query = "UPDATE users SET promocode_status = 1 WHERE id = $userId";
    $connect->query($query);
    $_SESSION['promocode_applied'] = true;
    $_SESSION['message1']= 'Промокод применен';
    header('Location: basket.php');
    exit();
} else {
    $_SESSION['promocode_applied'] = false;
    $_SESSION['message1']= 'Такого промокода не существует';
    header('Location: basket.php');
}
?>