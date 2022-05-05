<?php 
    session_start();
    require_once './openserver.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

    header('Location: ../pages2/db.php');
