<?php
	session_start();
	require_once 'openserver.php';
	$login = $_POST['login'];
	$password = $_POST['password'];

	$check_user = mysqli_query($connect,"SELECT * FROM `users` 
	WHERE `login` = '$login' AND `password` = '$password'");
	if (mysqli_num_rows($check_user) > 0){
		$user = mysqli_fetch_assoc($check_user);
		$_SESSION['user'] = [
			"id" =>$user ['id'],
			"login" => $user['login'],
			"password"=> $user['password'],
			"email"=> $user['email'],
			"image"=> $user['image']
		];		
		header('Location: ../pages2/profile.php');

	}else{
		$_SESSION['message'] = 'Неверный логин или пароль';
		header('Location: ../pages/log.php');
		}
	?>
	<pre>
		<?php

		?>
	</pre>