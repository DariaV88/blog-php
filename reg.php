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
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Регистрация</h2>
                </div>
                <div class="col-lg-7 tm-contact-left">
                <?php include "app/helps/errorInfo.php"; ?>
                    <form method="POST" action="reg.php" class="mb-5 ml-auto mr-0 tm-contact-form"> 
                                               
                        <div class="form-group row mb-4">
                        <label for="formGroupExampleInput" class="col-sm-3 col-form-label text-right tm-color-primary">Логин</label>
                            <div class="col-sm-9">  
                            <input class="form-control mr-0 ml-auto" name="login" value="<?=$login?>"
                            type="text" id="formGroupExampleInput" placeholder="Enter login"/>                         
                            </div>
                        </div>
                        

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
                            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />                        
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label text-right tm-color-primary">Повторите пароль</label>
                            <div class="col-sm-9">  
                            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password"/>                       
                            </div>
                        </div>
                        
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button type="submit" class="tm-btn tm-btn-primary tm-btn-small" name="button-reg">Регистрация</button>  
                                <a href="<?php echo BASE_URL . "log.php" ?>">Войти</a>                       
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