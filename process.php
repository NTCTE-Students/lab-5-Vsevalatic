<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirmPassword = $_POST['confirm_password'];
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if ($password === $confirmPassword) {
        echo "Пароли совпадают!";

    } else {
        echo "Пароли не совпадают, попробуйте снова.";
    }

    if (empty($password)) {
        $errors[] = "Пароль обязетелен";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $password = htmlspecialchars($password);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Пароль: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}