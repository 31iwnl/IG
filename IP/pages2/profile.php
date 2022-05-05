<?php
session_start();
require_once '../src/openserver.php';
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
    <link rel="stylesheet" type="text/css" href="../styles/profile.css">
    <title>Profile</title>
</head>
<body>
    <?php

        $idid = $_SESSION['user']['id'];
        $list = mysqli_query($connect, "SELECT * FROM users WHERE id = '$idid' ");
        $list = mysqli_fetch_all($list);
        foreach($list as $li){
        }
    ?>
    <div class="links">
        <header id="header">
            <a class="logo" href="#">Melon</a>
            <div class="link-container">
                
                <div class="pages">
                    <?php
                $main = "Главная";
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
        <form>
        <h4 color = "white">Мой профиль</h4>   
        <img class = "profile_img" src = "../<?=$li[4] ?>" alt = "" width = "200px" height = "200px">
        <h3>
        id = <?= $li[0]?>
    </h3>
    <h3>
       Логин = <?= $li[1]?>
    </h3>
    <h3>
      Пароль =  <?= $li[2]?>
    </h3>
    <h3>
    Почта = <?= $li[3]?>
    </h3>
    <?php
    $db = "../pages2/db_user.php";
    if($_SESSION['user']['login'] === 'admin'){
        $db = "../pages2/db.php";
    } 
     ?>
    <a class="sql" href="<?= $db ?>">Таблица всех пользователей</a>
    <a class="sql" href= "../src/exit.php">Выйти</a>
        </form>
        <ul class="menu">
        <li><a class="menuItem" href="../index.php">Главная</a></li>
    <li><a class="menuItem" href="../pages/me.php">Обо мне</a></li>
    <li><a class="menuItem" href="../pages/hobbies.php">Хобби</a></li>
    <li><a class="menuItem" href="../pages/gallery.php">Галерея</a></li>
    <li><a class="menuItem" href="../pages/work.php">Работы</a></li>
    <li><a class="menuItem" href="../pages/cont.php">Контакты</a></li>
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