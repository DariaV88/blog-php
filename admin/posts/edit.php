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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>

<body>
<?php include_once("../../app/include/sidebar-admin.php");?>
    <div class="container-fluid">
        <main class="tm-main">        
        <div class="posts col-9">
            <div class="row title-table">  
            <h2 class="mx-auto mb-4">Редактирование записи</h2>
                <div class="mb-12 col-12 col-md-12 err">

                    <?php include "../../app/helps/errorInfo.php"; ?>
                    
                    <form action="edit.php" method="post" enctype="multipart/form-data">

                    <div class="mb-4">

                    <input value="<?=$id;?>" name="id" type="hidden">

                    <label for="title" class="form-label">Название статьи</label>
                        <input value="<?=$post['title']; ?>" name="title" id="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                    </div>

                    <!-- Create the editor container -->
                    <div class="mb-4">
                        <label for="editor" class="form-label">Содержимое</label>
                        <textarea name="content" id="editor" class="form-control" rows="6"><?=$post['content']; ?></textarea>
                    </div>
                        

                    <div class="input-group mb-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div>

                    <select name="category" class="form-select mb-4" aria-label="Default select example">
                     
                        <?php foreach ($categories as $key => $category): ?>
                            <?php if ($category_id == $category['id']): ?>
                                <option value="<?= $category['id']; ?>" selected><?= $category['name']; ?></option>
                            <?php else: ?>
                                <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                    <div class="form-check mb-4">
                    <?php if (empty($publish) && $publish == 0): ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            В черновик
                        </label>
                    <?php else: ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                        </label>
                    <?php endif; ?>
                </div>
                    <div >
                        <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- <?php include_once("../../app/include/footer.php");?> -->
        </main>
    </div>
    
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/templatemo-script.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>

</body>
</html>