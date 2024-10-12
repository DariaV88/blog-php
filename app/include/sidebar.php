<?php 
include_once("path.php");
include_once("app/database/db.php");
?>

<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">Блог</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>Главная</a>
                    </li>

                <?php if(isset($_SESSION['id'])): ?>
                    <li class="tm-nav-item"><a href="#" class="tm-nav-link"><i class="fas fa-user-alt"></i>
                    <?php echo $_SESSION['login']; ?></a>
                    </li>
                    <li class="tm-nav-item"><a href="<?php echo BASE_URL . "create.php" ?>" class="tm-nav-link"><i class="fas fa-user-alt"></i>Создать пост</a></li>
                
                <?php if($_SESSION['admin']): ?>
                    <li class="tm-nav-item"><a href="<?php echo BASE_URL . "admin/posts/index.php" ?>" class="tm-nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>Админ панель</a>
                    </li>
                <?php endif; ?>

                <li class="tm-nav-item"><a href="<?php echo BASE_URL . "logout.php" ?>" class="tm-nav-link">
                        <i class="fas fa-backward"></i>Выход</a>
                </li>
                
                <?php else: ?>
                    <li class="tm-nav-item"><a href="<?php echo BASE_URL . "reg.php" ?>" class="tm-nav-link">
                        <i class="fas fa-users"></i>Вход</a>
                    </li>
                <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
