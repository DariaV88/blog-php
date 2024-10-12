<?php 
session_start();
include_once("../../path.php");
?>

<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">Админ панель</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>

                <li class="tm-nav-item"><a href="<?php echo BASE_URL . "admin/posts/index.php" ?>" class="tm-nav-link">
                        <i class="fas fa-home"></i>Посты</a>
                </li>

                <li class="tm-nav-item"><a href="<?php echo BASE_URL . "admin/categories/index.php" ?>" class="tm-nav-link">
                        <i class="fas fa-home"></i>Категории</a>
                </li>

                <li class="tm-nav-item"><a href="<?php echo BASE_URL . "admin/users/index.php" ?>" class="tm-nav-link">
                        <i class="fas fa-home"></i>Пользователи</a>
                </li>

                <li class="tm-nav-item"><a href="<?php echo BASE_URL . "logout.php" ?>" class="tm-nav-link">
                        <i class="fas fa-home"></i>Выход</a>
                </li>

                </ul>
            </nav>
        </div>
    </header>
