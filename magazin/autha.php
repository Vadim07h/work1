<?php
    include "connect.php";
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query1 = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($query1)>0){
        $user = mysqli_fetch_assoc($query1);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "email" => $user['email']
        ];

        header("Location: profil.php");
    }
    else{
        $_SESSION['message']= 'Неправильный логин или пароль';
        header("Location: auth.php");
    }
?>