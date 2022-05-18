<?php 
    session_start();
    require_once './openserver.php';

    $id = $_POST['id'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$id'");

    header('Location: ../pages2/profile.php');
