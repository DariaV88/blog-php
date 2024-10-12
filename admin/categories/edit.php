<?php 
include_once("../../path.php");
include_once("../../app/controllers/categories.php");
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
        <div class="posts col-9">
            <div class="button row mb-4">
                <a href="<?php echo BASE_URL . "admin/categories/create.php";?>" class="col-2 btn btn-info">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/categories/index.php";?>" class="col-3 btn btn-warning">Управление</a>
            </div>
            <div class="row mt-30 title-table">
            <h2 class="mx-auto">Изменение категории</h2>
                <div class="mb-12 col-12 col-md-12 err">

                    <form action="edit.php" method="post" enctype="multipart/form-data">

                    <input value="<?=$id;?>" name="id" type="hidden">

                    <div class="col mb-4">
                        <input value="<?=$name;?>" name="name" type="text" class="form-control" placeholder="Имя категории" aria-label="Название категории">
                    </div>

                    <div class="col mb-4">
                        <label for="editor" class="form-label">Содержимое категории</label>
                        <textarea name="description" id="editor" class="form-control" rows="6"><?=$description;?></textarea>
                    </div>

                    <div class="col col-6">
                        <button name="category-edit" class="btn btn-primary" type="submit">Изменить категорию</button>
                    </div>

                </form>
            </div>

        </div>
        <!-- <?php include_once("../../app/include/footer.php");?> -->
        </main>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/templatemo-script.js"></script>
</body>
</html>