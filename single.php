<?php include_once("path.php");
include "app/controllers/categories.php";

$post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);
$category = selectOne('categories', ['id' => $post['id_category']]);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/templatemo-xtra-blog.css" rel="stylesheet">
</head>

<body>
<?php include_once("app/include/sidebar.php");?>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="post" action="search.php" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="search-term" type="text" placeholder="Поиск..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>  
            
            <div class="row tm-row">
                <div class="col-12">
                <img src="<?=BASE_URL . 'assets/img/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-fluid"> 
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title"><?=$post['title'];?></h2>
                            <p class="tm-mb-40">Опубликовано <?=$post['created_date'];?> by <?=$post['username'];?></p>
                            <p><?=$post['content'];?></p>
                            <span class="d-block text-right tm-color-primary">Категория: <?=$category['name'];?></span>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Категории:</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                        <?php foreach ($categories as $key => $category): ?>
                    <li>
                        <a class="tm-color-primary" href="<?=BASE_URL . 'category.php?id=' . $category['id']; ?>"> - <?=$category['name']; ?></a>
                    </li>
                    <?php endforeach; ?>
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                    </div>                    
                </aside>
            </div>

        </main>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>
</html>