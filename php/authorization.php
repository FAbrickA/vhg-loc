<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	$mysql = new mysqli('vhg.loc', 'root', '', 'accounts-bd');

	$result = $mysql->query("SELECT * FROM `users` WHERE `surname` = '$login' AND `password` = '$password'");
	$user = $result->fetch_assoc();

	if (!$user || count($user) == 0) {
		setcookie('bad', "1", time() + 1, "/");
		header("Location: /");
		exit();
	}

	if ($_POST['memory'] == '1') {
		$full_time = 10;
	} else {
		$full_time = 60;
	}

	setcookie('name', $user['name'], time() + $full_time, "/");
	setcookie('surname', $user['surname'], time() + $full_time, "/");
	setcookie('subjects', $user['subjects'], time() + $full_time, "/");
	setcookie('type', $user['type'], time() + $full_time, "/");
	setcookie('class', $user['class'], time() + $full_time, "/");
	setcookie('id', $user['id'], time() + $full_time, "/");

	$mysql->close();

	header("Location: /");
?>