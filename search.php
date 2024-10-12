<?php 
include_once("path.php");
include SITE_ROOT . "/app/database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
    $posts = seacrhInTitileAndContent($_POST['search-term'], 'posts', 'users');
} 
if (empty($posts)) {
    header('location: ' . BASE_URL . 'undefind.php');
}
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
                    <div class="d-flex justify-content-between">
                        <span>by <?=$post['username'];?></span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                <div class="tm-prev-next-wrapper">
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                    <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
                </div>
                <div class="tm-paging-wrapper">
                    <span class="d-inline-block mr-3">Page</span>
                    <nav class="tm-paging-nav d-inline-block">
                        <ul>
                            <li class="tm-paging-item active">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                            </li>
                            <li class="tm-paging-item">
                                <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                            </li>
                        </ul>
                    </nav>
                </div>                
            </div>           
            <?php include_once("app/include/footer.php");?>
        </main>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>
</html>