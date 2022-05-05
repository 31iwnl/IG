<?php
	session_start();
	
	require_once 'openserver.php';
	$login = $_POST['login'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];
	$image = $_POST['image'];

        $idid = $_SESSION['user']['id'];
        $list = mysqli_query($connect, "SELECT * FROM users WHERE id = '$idid' ");
        $list = mysqli_fetch_all($list);
        foreach($list as $li){

        }
	if (!(($login === '') || ($password  === '') || ($email  === '' ))){

	if ($password === $password2)  {
		//$_FILES['image']['name']
		$path = 'uploads/' .time() . $_FILES['image']['name'];
		if(!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)){
			$_SESSION['message'] = 'Изображение не было загружено';
			header('Location: ../pages/reg.php');
		}
		$query = "SELECT * FROM users WHERE login='$login'";
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$count = mysqli_num_rows($result);
    	if ($count != 0) {
			$_SESSION['message'] = 'Логин уже существет';
			header('Location: ../pages/reg.php');
    	}else{
		mysqli_query($connect,"INSERT INTO `users` (`id`, `login`, `password`, `email`, `image`) VALUES (NULL, '$login', '$password', '$email', '$path') ");
		$_SESSION['message'] = 'Регистрация прошла успешно';
		
		header('Location: ../pages/log.php');
		}
	}
	else{
		$_SESSION['message'] = 'Пароли не совпадают';
		header('Location: ../pages/reg.php');
		}
	}else{
		$_SESSION['message'] = 'Введены не все данные';
			header('Location: ../pages/reg.php');
	}
	
	

	
?>
