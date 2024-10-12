<?php 
include_once("../../path.php");
include_once("../../app/controllers/users.php");
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
                <a href="<?php echo BASE_URL . "admin/user/create.php";?>" class="col-2 btn btn-info">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-warning">Управление</a>
            </div>
            <div class="row mt-30 title-table">
            <h2 class="mx-auto">Создание пользователя</h2>
                <div class="mb-12 col-12 col-md-12 err">

                <?php include "../../app/helps/errorInfo.php"; ?>

                    <form method="POST" action="create.php"> 

                        <div class="mb-4">
                        <label for="formGroupExampleInput">Логин</label>
                            <input class="form-control" name="login" value="<?=$login?>"
                            type="text" id="formGroupExampleInput" placeholder="Example input"/>                         
                        </div>   

                        <div class="mb-4">
                        <label for="exampleInputEmail1">Email</label> 
                            <input name="email" type="email" value="<?=$email?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                        </div>

                        <div class="mb-4">
                        <label for="exampleInputPassword1">Пароль</label> 
                            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />                        
                        </div>

                        <div class="mb-4">
                        <label for="exampleInputPassword2">Повторите пароль</label>
                            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password"/>                       
                        </div>

                        <div class="form-check mb-4">
                        <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked"> Администратор? </label>
                       </div>
                        
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button type="submit" name="create-user" class="tm-btn tm-btn-primary tm-btn-small">Создать</button>                      
                            </div>                           
                        </div>                                
                    </form>
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