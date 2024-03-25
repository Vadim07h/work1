<?php
    include "connect.php";
    session_start();
    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $query3 = mysqli_query($connect, "SELECT * FROM users WHERE `email`='$email'");
    if(mysqli_num_rows($query3)>0){
        $_SESSION['message'] = 'Аккаунт с такой почтой уже существует';
        header("Location: register.php");
        exit();
    }

    $query4 = mysqli_query($connect, "SELECT * FROM users WHERE `login`='$login'");
    if(mysqli_num_rows($query4)>0){
        $_SESSION['message'] = 'Аккаунт с таким login уже существует';
        header("Location: register.php");
        exit();
    }

    if ($password === $password_confirm) {
        $query = mysqli_query($connect, "INSERT INTO users (id, login, name, surname, email, password, game_passed, promocode_status, confirmationCode) VALUES (0, '$login', '$name', '$surname', '$email', '$password', 0, 0, 0)");
    
        if ($query) {
            header("Location: auth.php");
            exit();
        } else {
            $_SESSION['message'] = 'Ошибка при выполнении запроса на добавление пользователя'.mysqli_error($connect);
            header("Location: register.php");
            exit();
        }
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header("Location: register.php");
        exit();
    }