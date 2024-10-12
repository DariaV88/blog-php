<?php 
include_once("../../path.php");
include_once("../../app/controllers/posts.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/templatemo-xtra-blog.css" rel="stylesheet">
</head>

<body>
<?php include_once("../../app/include/sidebar-admin.php");?>
    <div class="container-fluid">
        <main class="tm-main">        
        <div>
            <div class="button row mb-4">
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-2 btn btn-info">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-3 btn btn-warning">Управление</a>
            </div>
            <h2 class="mx-auto">Управление записями</h2>
            <div class="row mt-30 title-table">
                <div class="col-1">ID</div>
                <div class="col-3">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-6">Управление</div>
            </div>
        </div>
        <?php foreach ($postsAdm as $key => $post): ?>
                <div class="row">
                    <div class="id col-1"><?=$key + 1; ?></div>
                    <div class="title col-3"><?=mb_substr($post['title'], 0, 50, 'UTF-8'). '...'  ?></div>
                    <div class="author col-2"><?=$post['username']; ?></div>
                    
                    <div class="red col-2"><a href="edit.php?id=<?=$post['id'];?>">Редактировать</a></div>
                    <div class="del col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">Удалить</a></div>
                    <?php if ($post['status']): ?>
                        <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">В черновик</a></div>
                    <?php else: ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Опубликовать</a></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <!-- <?php include_once("../../app/include/footer.php");?> -->
        </main>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/templatemo-script.js"></script>
</body>
</html>