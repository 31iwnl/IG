<?php 
    session_start();
    require_once "openserver.php";
    $id = $_POST['id'];
    $score = $_POST['score'];
    mysqli_query($connect, "UPDATE `users` SET `score` = '$score' WHERE `users`.`id` = '$id'");

    header('Location: ../pages2/game.php');
    ?>