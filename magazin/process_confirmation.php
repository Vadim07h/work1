<?php
session_start();
include "connect.php";

$confirmationCode = $_POST['confirmation_code'];
$email = $_SESSION['email'];

$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `confirmation_code` = '$confirmationCode'");

if (mysqli_num_rows($query) > 0) {
    $_SESSION['email_confirmed'] = true;
    header("Location: rename-pass.php");
    exit();
} else {
    $_SESSION['message'] = 'Неправильный код';
    header("Location: confirm_email.php");
    exit();
}
?>