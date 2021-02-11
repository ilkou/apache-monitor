<?php


/*
	Check if a session user id exist or not. If not set redirect
	to login page. If the user session id exist and there's found
	$_GET['logout'] in the query string logout the user
*/
function checkFDUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['crm_fd_user'])) {
		// header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
}

function doLogin()
{
	$login 	= $_POST['login'];
	$pwd 	=  $_POST['pwd'];


	$errorMessage = '';

	$sql 	= "SELECT * FROM users WHERE login = '$login' and fonction IN ('admin','commercial','manager', 'developpeur_tech')";
	$result = dbQuery($sql);

	if (dbNumRows($result) == 1) {
		$row = dbFetchAssoc($result);
		if (password_verify($pwd, $row['password'])) {
			$_SESSION['crm_fd_user'] = $row;
			$_SESSION['crm_token'] = md5(uniqid(mt_rand(), true));
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
	if (isset($_SESSION['crm_fd_user'])) {
		unset($_SESSION['crm_fd_user']);
		//session_unregister('hlbank_user');
	}
	header('Location: index.php');
	exit();
}

