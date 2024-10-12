<?php 
include_once("path.php");
include_once "app/controllers/categories.php";

$posts = selectAll('posts', ['id_category' => $_GET['id']]);
$category = selectOne('categories', ['id' => $_GET['id']]);
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
   
            <h2 class="mb-5">Посты категории "<?=$category['name'];?>"</h2> 
                 
            <div class="row tm-row">
            <?php foreach ($posts as $post): ?>
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                        <img src="<?=BASE_URL . 'assets/img/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-fluid">                           -->
                        </div>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">
                            <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 60) . '...'  ?></a>
                        </h2>  
                    </a>                    
                    <p class="tm-pt-30">
                    <?=mb_substr($post['content'], 0, 70, 'UTF-8'). '...'  ?>
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary"><?=$post['created_date'];?></span>
                    </div>
                    <hr>
                </article>
                <?php endforeach; ?>
 
            </div>   

            

            <?php include_once("app/include/footer.php");?>
        </main>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>
</html>