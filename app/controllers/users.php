<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];

function userAuth($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if($_SESSION['admin']) {
        header('location: ' . BASE_URL . "admin/posts/index.php");
    } else{
        header('location: ' . BASE_URL);
    }
}

$users = selectAll('users');

// Форма регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS) {
        array_push($errMsg, "Пароли в полях должны соответствовать");
    } else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email) {
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован");
        } else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id] );
            userAuth($user);
        }
    }
} else{
    $login = '';
    $email = '';
}

// Авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === '') {
        array_push($errMsg, "Не все поля заполнены");
    } else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);
        } else{
            array_push($errMsg, "Почта либо пароль введены неверно");
        }
    }
} else{
    $email = '';
}

// Добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS) {
        array_push($errMsg, "Пароли в полях должны соответствовать");
    } else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            array_push($errMsg, "Пользователь с такой почтой уже зарегистрирован");
        } else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) 
            $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id] );
            userAuth($user);
        }
    }
} else{
    $login = '';
    $email = '';
}

// Удаление пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

// Редактирование пользователя в админке 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if($login === ''){
        array_push($message, "Не все поля заполнены");
    }
    elseif (mb_strlen($login, 'UTF8') < 3) {
        array_push($message, "Логин должен быть более 2-х символов");
    } elseif (!empty($password)){
        if($password !== $passwordConfirm){
            array_push($message,  "Новые пароли должны соответствовать");
        }
        else{
          $password = password_hash($password, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) {
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                'password' => $password
            ];
            update('users', $user, $id);
            header('location: ' . BASE_URL . 'admin/users/index.php');
        }
    } else{
        if(isset($_POST['admin'])){
            $admin = 1;
        }
        $user = [
            'admin' => $admin,
            'username' => $login
        ];  
        update('users', $user, $id);
        // header('location: '.'index.php');
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }}

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
        $user = selectOne('users', ['id' => $_GET['edit_id']]);
    
        $id =  $user['id'];
        $admin =  $user['admin'];
        $username = $user['username'];
        $email = $user['email'];
    }
    
