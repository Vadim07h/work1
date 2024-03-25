<?php
session_start();
include "connect.php";

if (isset($_SESSION['email_confirmed']) && $_SESSION['email_confirmed'] === true) {
    

    $newPassword1 = $_POST['rename-password'];
    $newPassword_confirm = $_POST['rename-password_confirm'];
    $email = $_SESSION['email'];
    $qr = mysqli_query($connect, "SELECT * FROM `users` WHERE `password` = '$newPassword1' AND `email` = '$email'");
    if(mysqli_num_rows($qr)>0){
        $_SESSION['message'] = 'Такой пароль в данный момент стоит у вас';
        header("Location: rename-pass.php");
        exit();
    }

    if ($newPassword1 === $newPassword_confirm) {
                $updateQuery = mysqli_query($connect, "UPDATE `users` SET `password` = '$newPassword1' WHERE `email` = '$email'");
                
        if($updateQuery){
            $_SESSION['message'] = 'Пароль успешно изменен';
            header("Location: auth.php");
            exit();
        }
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header("Location: rename-pass.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'Доступ запрещен. Пожалуйста, подтвердите вашу электронную почту.';
    header("Location: auth.php");
    exit();
}
?>