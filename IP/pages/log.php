<?php
session_start();
    if($_SESSION['user']){
        header('Location: ../pages2/profile.php');
    }
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
    <link rel="stylesheet" type="text/css" href="../styles/log.css">
    <title>Login</title>
</head>
<body>
    <div class="links">
        <header id="header">
            <a class="logo" href="#">Melon</a>
            <div class="main"><img src="./images/CSS-Animated-Backgrounds-2.gif"></div>
            <div class="link-container">
                <div class="pages">
                <?php 
                $main = "Вход";
                $tp = "./main.php";
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
        <form action="/src/signin.php" method="post">
            <h1>Авторизация</h1>
                    <label for="">Логин:</label>
                   <input type="text" name = "login" placeholder="Введите логин">
                    <label for="">Пароль:</label>
                    <input type="password" name = "password" placeholder="Введите пароль">
                <button  type = "submit">Войти</button>
                <a href = "../pages/reg.php">Ещё нет аккаунта?</a>
                <div class = "msg">
                <p>
        <?php
			echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </p>
                </div>
        </form>
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
            </div>

</body>
</html>