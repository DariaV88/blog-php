<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];
$id = '';
$name = '';
$description = '';

$categories = selectAll('categories');

// Создание категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-create'])) {
    
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    if($name === '' || $description === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errMsg, "Категория должна быть более 2-х символов");
    } else{
        $existence = selectOne('categories', ['name' => $name]);
        if($existence['name'] === $name){
            array_push($errMsg, "Такая категория уже есть в базе");
        } else{
            $category = [
                'name' => $name,
                'description' => $description
            ];

            $id = insert('categories', $category);
            $category = selectOne('categories', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/categories/index.php');
        }
    }
} else {
    $name = '';
    $description = '';
}

// Обновление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = selectOne('categories', ['id' => $id]);
    $id = $category['id'];
    $name = $category['name'];
    $description = $category['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errMsg, "Категория должна быть более 2-х символов");
    } else{
        $category = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $category_id = update('categories', $category, $id );
        header('location: ' . BASE_URL . 'admin/categories/index.php');
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('categories', $id);
    header('location: ' . BASE_URL . 'admin/categories/index.php');
}
