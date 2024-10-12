<?php 
include_once "path.php";
include_once "app/controllers/users.php";
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
    <div class="container-fluid">
        <main class="tm-main">    
        <?php include_once("app/include/sidebar.php");?>      
            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Войти</h2>
                </div>
                <div class="col-lg-7 tm-contact-left">
                <?php include "app/helps/errorInfo.php"; ?>
                    <form method="POST" action="log.php" class="mb-5 ml-auto mr-0 tm-contact-form"> 
                                               
                        <div class="form-group row mb-4">
                        <label for="exampleInputEmail1" class="col-sm-3 col-form-label text-right tm-color-primary">Email</label>
                            <div class="col-sm-9">  
                            <input name="email" type="email" value="<?=$email?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label for="exampleInputPassword1" class="col-sm-3 col-form-label text-right tm-color-primary">Пароль</label>
                            <div class="col-sm-9">  
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />                        
                            </div>
                        </div>
                        
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <a href="<?php echo BASE_URL . "reg.php" ?>">Регистрация</a> 
                                <button type="submit" class="tm-btn tm-btn-primary tm-btn-small" name="button-log">Войти</button>              
                            </div>                           
                        </div>                                
                    </form>
                </div>
            </div>      
        </main>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>
</html>