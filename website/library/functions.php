<?php


function checkFDUser()
{
	$path = "/var/www/html/apache-monitor/auth/login.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);


	if (!$data['email']) {
		header('Location: ' . WEB_ROOT . 'init_config.php');
		exit;
	}

	if (!isset($_SESSION['apache_monitor'])) {
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}

	if (isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogin()
{
	$email 	= $_POST['email'];
	$passwd 	=  $_POST['passwd'];


	$errorMessage = '';



	$path = "/var/www/html/apache-monitor/auth/login.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);
	
	if ($data["email"] == $email) {
		if ($passwd == $data['passwd']) {
			$_SESSION['apache_monitor'] = $email;
			$_SESSION['apache_monitor_token'] = md5(uniqid(mt_rand(), true));
			header('Location: index.php');
			exit();
		} else {
			$errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect. Veuillez réessayer ou contacter l\'assistance.';
		}
	} else {
		$errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect. Veuillez réessayer ou contacter l\'assistance.';
	}
	return $errorMessage;
}


/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['apache_monitor'])) {
		unset($_SESSION['apache_monitor']);
		//session_unregister('hlbank_user');
	}
	header('Location: index.php');
	exit();
}


function checkRegester()
{
	$path = "/var/www/html/apache-monitor/auth/login.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);


	if ($data['email']) {
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}

}

function checkInitConfig()
{
	$path = "/var/www/html/apache-monitor/auth/login.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	if (!$data['email']) {
		header('Location: ' . WEB_ROOT . 'init_config.php');
		exit;
	}
}

// get services
function getServices()
{
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	return $data["services"];
}


function getConfiguration()
{
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);
	return $data;
}

function getApplications()
{
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	return $data["apps"];
}
