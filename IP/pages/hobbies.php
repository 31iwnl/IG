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
    <link rel="stylesheet" type="text/css" href="../styles/hobbies.css">
    <title>Hobbies</title>
</head>
<body>
    <div class="links">
        <header id="header">
            <a class="logo" href="#">Melon</a>
            <div class="main"><img src="./images/CSS-Animated-Backgrounds-2.gif"></div>
            <div class = "open"><img src = "../images/openn.png"></div>
            <div class="link-container">
                <div class="pages">
                <?php 
                $main = "Вход";
                $tp = "../index.php";
                if($_SESSION['user']){
                    $main = "Профиль";
                    $tp = "../pages2/profile.php";

                } 
            ?>
                    <a class="menu1" href="../index.php">Главная</a>
                    <a class="menu1" href="../pages/me.php">Обо мне</a>
                    <a class="menu1" href="../pages/hobbies.php">Хобби</a>
                    <a class="menu1" href="../pages/gallery.php">Галерея</a>
                    <a class="menu1" href="../pages/work.php">Работы</a>
                    <a class="menu1" href="../pages/cont.php">Контакты</a>
                    <a class="menu1" href="<?= $tp ?>"><?= $main ?></a>
                </div>
                <div class="soc">
                    <a class="social" target="blank" href="https://www.instagram.com/31iwnl//"><img src="../images/inst.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://vk.com/godzilla_99"><img src="../images/vk.png" width="25" height="25"></a>
                   
                </div>
        </header>
    </div>
    <main>
        <div class="center">
            <div class = "text">Кроме програмирования, я также люблю поиграть в компьютерные игры, такие как Dota 2 и CS:GO
                А также, смотреть различное Аниме и поваляться в кровати.
            </div>
            <img class = "image" src = "../images/dota2.jpg">
            <div class = "text">В свободное от учебы время, я люблю поиграть в них, а также поизучать языки, благодаря играм</div>
            <img class = "image" src = "../images/cs.jpg">
            <div class = "text">Также, я люблю заниматься спортом, это позволяет мне построить тело таким, каким я хочу его видеть</div>
            
        </div>
        <ul class="menu">
        <li><a class="menuItem" href="../index.php">Главная</a></li>
    <li><a class="menuItem" href="./me.php">Обо мне</a></li>
    <li><a class="menuItem" href="./hobbies.php">Хобби</a></li>
    <li><a class="menuItem" href="./gallery.php">Галерея</a></li>
    <li><a class="menuItem" href="./work.php">Работы</a></li>
    <li><a class="menuItem" href="./cont.php">Контакты</a></li>
    <li><a class="menuItem" href="<?= $tp ?>"><?= $main ?></a></li>
  </ul>
  <button class="hamburger"><img src = "../images/openn.png">
    <!-- material icons https://material.io/resources/icons/ -->
    <i class="menuIcon material-icons"></i>
    <i class="closeIcon material-icons"></i>
  </button>
  </nav>
  <div class="burger-menu_overlay"></div>
</div>
        <script src="../scripts/burger.js"></script>
    </main>
</body>
</html>