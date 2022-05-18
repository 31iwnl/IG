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
        <link rel="stylesheet" href="../styles/db.css">
        <title>Users</title>
    </head>
    <body>
        <div class="fixed">
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
    </body>
    <main>
        <div class="users">
            <h1>Список пользователей</h1>
            <table>
                <tr>
                    <td>id</td>
                    <td>Логин</td>
                    <td>Почта</td>
                    <td>Аватар</td>
                    <td>Тип пользователя</td>
                    <td>Очки</td>                     
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
            <?php
            $query = "SELECT * FROM `users`";
            $res = mysqli_query($connect, $query);
            while( ($user = mysqli_fetch_array($res))) {
                ?>
                <tr>
                    <?php 
                    $delete = "../src/delete.php?id=";
                    if($user['type'] === 'admin'){
                        $delete = ("#");
                    }
                        ?>
                    
                    <td class="data"><?=$user['id']?></td>
                    <td class="data"><?=$user['login']?></td>
                    <td class="data"><?=$user['email']?></td>
                    <td class="data"><img src="<?="../" . $user['image']?>" width="100" height = "90" class="avatarimg" alt="Аватарка"></td>
                    <td class ="data"><?=$user['type']?></td>
                    <td class ="data"><?=$user['score']?></td>
                    <td class="data"><a href="./redact.php?id=<?=$user['id']?>"><img src="../images/edit.png" width="50" class="edel" alt="Редактировать"></a></td>
                    <td class="data"><a href="<?= $delete ?><?=$user['id']?>"><img src="../images/delete.png" width="50" class="edel" alt="Удалить"></a></td>
                </tr>
        </div>
        <?php
    }
    ?>
        </table>
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
</html>
