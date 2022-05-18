<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/st.css">
    <title>Account</title>
</head>
<body>
    <div class="links">
        <header id="header">
            <a class="logo" href="./index.php">Melon</a>
           
            <div class="main"><img src="./images/836-1600x900.jpg"></div>
            <div class="link-container">
                <div class="pages">
            <?php 
                $main = "Вход";
                $tp = "../pages/main.php";
                if($_SESSION['user']){
                    $main = "Профиль";
                    $tp = "../pages2/profile.php";

                } 
            ?>
                    <a class="menu1" href="./index.php">Главная</a>
                    <a class="menu1" href="./pages/me.php">Обо мне</a>
                    <a class="menu1" href="./pages/hobbies.php">Хобби</a>
                    <a class="menu1" href="./pages/gallery.php">Галерея</a>
                    <a class="menu1" href="./pages/work.php">Работы</a>
                    <a class="menu1" href="./pages/cont.php">Контакты</a>
                    <a class="menu1" href="<?= $tp ?>"><?= $main ?></a>
                </div>
                <div class="soc">
                    <a class="social" target="blank" href="https://www.instagram.com/31iwnl//"><img src="./images/inst.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://vk.com/godzilla_99"><img src="./images/vk.png" width="25" height="25"></a>
            </div>
        </header>
    </div>
    <main>
        <div class="center">
               <h5>Добро пожаловать!</h5>
               <div class = "hh">Здесь вы найдете: Информацию обо мне, Мои контакты, Выполненные работы, Галлерею, а также мои увлечения.
               </div>
               <a class = "button" href = "../pages2/game.php">Игра</a>
        </div>
        <ul class="menu">
        <li><a class="menuItem" href="./index.php">Главная</a></li>
    <li><a class="menuItem" href="./pages/me.php">Обо мне</a></li>
    <li><a class="menuItem" href="./pages/hobbies.php">Хобби</a></li>
    <li><a class="menuItem" href="./pages/gallery.php">Галерея</a></li>
    <li><a class="menuItem" href="./pages/work.php">Работы</a></li>
    <li><a class="menuItem" href="./pages/cont.php">Контакты</a></li>
    <li><a class="menuItem" href="<?= $tp ?>"><?= $main ?></a></li>
  </ul>
  <div class="hamburger"><img src = "./images/openn.png">
    <!-- material icons https://material.io/resources/icons/ -->
    <i class="menuIcon material-icons"></i>
    <i class="closeIcon material-icons"></i>
            </div>
  </nav>
  <div class="burger-menu_overlay"></div>
</div>
        <script src="../scripts/burger.js"></script>
    </main>
</body>
</html>