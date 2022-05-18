<?php 
    session_start();
    require_once '../src/openserver.php';
    $id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    $product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/edit.css">
    <title>Update</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Edit</a>
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
    <form action="../src/edit.php" method="post">
        <h1>Редактирование</h1>
        <input type="hidden" name="id" value="<?= $product['id']?>">
        <label>Логин</label>
        <input type="text" name="login" value="<?= $product['login']?>">
        <label>Почта</label>
        <input type="email" name="email" value="<?= $product['email']?>">
        <label>Пароль</label>
        <input type="password" name="password" value="">
        <button type="submit">Изменить</button>
        </form>
    </main>
</body>
</html>