<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязетелен";
    }
    
    if (strlen($name) < 4){
        $errors[]="Имя должно содержать минимум 4 символа!";
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