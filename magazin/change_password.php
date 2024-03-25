<?php
include "connect.php";
session_start();

$email = $_POST['email'];

function generate_password($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}

function send_email($to, $subject, $message) {
    $headers = "From: your_email@example.com" . "\r\n" .
               "Reply-To: your_email@example.com" . "\r\n" .
               "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}

$confirmationCode = generate_password(8);

$em = mysqli_query($connect,"SELECT * FROM `users` WHERE `email` = '$email'");
if(mysqli_num_rows($em)>0){
    mysqli_query($connect, "UPDATE `users` SET `confirmation_code` = '$confirmationCode' WHERE `email` = '$email'");
    $subject = "Проверка почты";
    $message = "Код для подтверждения почты: $confirmationCode";
    send_email($email, $subject, $message);
    
    $_SESSION['email'] = $email;
    header("Location: confirm_email.php");
    exit();
}
else{
    $_SESSION['message'] = "Аккаунта с такой почтой не существует";
    header("Location: form-password.php");
}



?>