<?php 
session_start();
   require_once '../src/openserver.php';
    if (!$_SESSION['user']) {
        header('Location: ../pages/log.php');
    
    }
    $_SESSION['score'] = $user['score'];

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
    <link rel="stylesheet" type="text/css" href="../styles/game.css">
    <title>Game</title>
</head>
<body>
    <div class="links">
        <header id="header">
            <a class="logo" href="#">Melon</a>
           
            <div class="main"><img src="./images/830-1600x900.jpg"></div>
            <div class="link-container">
                <div class="pages">
                    
            <?php 
                $main = "Вход";
                $tp = "../main.php";
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
    <div class = "center">
    <div id="game">
    <div class = "alert" id = "death">Вы проиграли</div>  
    <div class = "alert2" id = "new">Новый рекорд!</div> 
		<div class="game-header">
			<div class="game-score">
				<span class="score-count">1234</span>
                <p id="score"></p>
			</div>
		</div>
		<div class="canvas-wrapper">
			<canvas id="game-canvas" width="320" height="400"></canvas>
		</div>
	</div>
    </div>
	<script src="../scripts/game.js"></script>
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
<form action="../src/res.php" method="post">
            <?php

        $idid = $_SESSION['user']['id'];
        $list = mysqli_query($connect, "SELECT * FROM users WHERE id = '$idid' ");
        $list = mysqli_fetch_all($list);
        foreach($list as $li){
        }
    ?>
                    <h10>
        Ваш рекорд = <?= $li[6]?>
                    </h10>
            <input type = "hidden" name = "id" value = "<?= $_SESSION['user']['id'] ?>"> 
            <input type = "hidden" name = "score" id = "scores" value = "<?= $li[6]?>">
            <button class = "butt" id="butt1" type="button" onclick="reload()">Начать заново</button>
            <button class = "butt" id="butt" type="submit" style="visibility: hidden;">Обновить результаты</button>
        </form>
        <div>
  <img class = "snake "src = "../images/snake.png">
  </div>
        <script src="../scripts/burger.js"></script> 
        <audio src="../mp3/Snake.mp3" autoplay="autoplay"></audio>
    </main>
</body>
</html>