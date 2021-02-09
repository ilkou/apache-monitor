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




function getUsersRecords()
{

	$per_page = 20;
	$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1;
	$start 	= ($page - 1) * $per_page;

	$type = $_SESSION['crm_fd_user']['fonction'];
	if ($type == 'admin') {
		$login = $_SESSION['crm_fd_user']['login'];
		$sql = "SELECT  * FROM users  WHERE fonction != 'admin' ORDER BY nom_user DESC";
		$result = dbQuery($sql);
		$records = array();
		while ($row = dbFetchAssoc($result)) {
			extract($row);
			$records[] = array(
				"login" => $login,
				"nom_user" => $nom_user,
				"prenom_user" => $prenom_user,
				"fonction" => $fonction
			);
		}
		return $records;
	}
	return [];
}


function getOneUserRecords()
{

	$login = $_GET['login'];

	$type = $_SESSION['crm_fd_user']['fonction'];
	if ($type == 'admin') {
		$sql = "SELECT  * FROM users  WHERE login = '$login'";
		$result = dbQuery($sql);
		$row = dbFetchAssoc($result);
		return $row;
	}
	return null;
}

function getMyRecords()
{
	$login =  $_SESSION['crm_fd_user']['login'];
	if ($_SESSION['crm_fd_user']['fonction'] == 'admin' || $_SESSION['crm_fd_user']['fonction'] == 'manager') {
		$login = $_GET['login'];
	}

	// $sql = "SELECT  * FROM users  WHERE login = '$login'";
	// $result = dbQuery($sql);
	// $row = dbFetchAssoc($result);

	// $sql ="SELECT SUM(rendez_vous.mensualite  ) As chiffre_affaire
	// 	 FROM contrats,
	// 	 rendez_vous  where rendez_vous.login_commercial = '$login'
	// 	 and rendez_vous.code_rdv = contrats.code_rdv
	// 	 and  rendez_vous.status_rdv IN ('confirmed_contrat','dev_site',
	// 	 'cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu') and 
	// 	 YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())
	// 	 and MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '2'";

	// $result = dbQuery($sql);
	// $records = array();
	// while ($row1 = dbFetchAssoc($result)) {
	// 	extract($row1);
	// 	$records[] = array(
	// 		"chiffre_affaire" => $chiffre_affaire
	// 	);
	// }
	// extract($records);

	// // die($chiffre_affaire);

	// $row = array_merge($row,  $records);

	// SUM(case when year(readingDate) = 2009 then readingValue else 0 end) `2009`,

	// $sql = "SELECT SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = MONTH(CURRENT_DATE()) then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'chiffre_affaire',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '1' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '1',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '2' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '2',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '3' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '3',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '4' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '4',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '5' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '5',

	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '6' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '6',

	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '7' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '7',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '8' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '8',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '1' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '1',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '9' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '9',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '10' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '10',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '11' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '11',
	// SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '12' then 
	// rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) '12',
	//  users.*  FROM contrats,
	//  rendez_vous,users  where rendez_vous.login_commercial = '$login'
	//  and  rendez_vous.status_rdv IN ('confirmed_contrat','dev_site',
	//  'cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu') and 
	//  YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())";


	$sql = "SELECT SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = MONTH(CURRENT_DATE()) then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'chiffre_affaire',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '1' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm1',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '2' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm2',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '3' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm3',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '4' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm4',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '5' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm5',

	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '6' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm6',
	
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '7' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm7',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '8' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm8',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '9' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm9',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '10' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm10',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '11' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm11',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '12' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm12',
	users.*
	 FROM contrats,users,
	 rendez_vous where  rendez_vous.code_rdv = contrats.code_rdv AND
	  users.login = '$login'
	 and rendez_vous.login_commercial = '$login'
	 and  rendez_vous.status_rdv IN ('confirmed_contrat','dev_site',
	 'cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu') and 
	 YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())";

	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}


function getNvContrats()
{

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$sql = "SELECT * FROM rendez_vous where status_rdv = 'vente'";
	} else {
		if ($_SESSION['crm_fd_user']['fonction'] == 'commercial') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT * FROM rendez_vous where login_commercial = '$login' and status_rdv = 'vente'";
		} else {
			return [];
		}
	}
	$result = dbQuery($sql);
	$records = [];
	while ($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array(
			"nom_societe" => $nom_societe,
			"tel_societe" => $tel_societe,
			"login_commercial" => $login_commercial,
			"contrat_type" => $contrat_type,
			"code_rdv" => $code_rdv
		);
	}
	return $records;
}



function getOneContrat()
{
	$code_rdv = $_GET['code_rdv'];

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$login = $_SESSION['crm_fd_user']['login'];
		$sql = "SELECT * FROM rendez_vous where status_rdv = 'vente' and code_rdv = '$code_rdv'";
	} else {
		if ($_SESSION['crm_fd_user']['fonction'] == 'commercial') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT * FROM rendez_vous where login_commercial = '$login' and status_rdv = 'vente' and code_rdv = '$code_rdv'";
		} else {
			return null;
		}
	}
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}




function getConfirmedContrats()
{

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$sql = "SELECT rendez_vous.nom_societe,rendez_vous.tel_societe,rendez_vous.login_commercial,rendez_vous.contrat_type,contrats.code_contrat FROM rendez_vous,contrats where rendez_vous.status_rdv = 'confirmed_contrat'  and rendez_vous.code_rdv = contrats.code_rdv";
	} else {
		if ($_SESSION['crm_fd_user']['fonction'] == 'commercial') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT rendez_vous.nom_societe,rendez_vous.tel_societe,rendez_vous.login_commercial,rendez_vous.contrat_type,contrats.code_contrat FROM rendez_vous,contrats where rendez_vous.login_commercial = '$login'
			 and rendez_vous.status_rdv = 'confirmed_contrat' and rendez_vous.code_rdv = contrats.code_rdv
			 and  rendez_vous.login_commercial = '$login'";
		} else {
			return [];
		}
	}
	$result = dbQuery($sql);
	$records = [];
	while ($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array(
			"nom_societe" => $nom_societe,
			"tel_societe" => $tel_societe,
			"login_commercial" => $login_commercial,
			"contrat_type" => $contrat_type,
			"code_contrat" => $code_contrat
		);
	}
	return $records;
}


function getOneConfirmedContrat()
{
	$code_contrat = $_GET['code_contrat'];

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$sql = "SELECT contrats.*,rendez_vous.*  FROM contrats,rendez_vous where rendez_vous.status_rdv = 'confirmed_contrat' and contrats.code_contrat = '$code_contrat'";
	} else {
		if ($_SESSION['crm_fd_user']['fonction'] == 'commercial') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT contrats.*,rendez_vous.*  FROM contrats,rendez_vous  where rendez_vous.login_commercial = '$login' and  rendez_vous.status_rdv = 'confirmed_contrat' and contrats.code_contrat = '$code_contrat'";
		} else {
			return null;
		}
	}
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}



function getProjets()
{
	$fonction = $_SESSION['crm_fd_user']['fonction'];

	if (
		$fonction == 'admin' ||
		$fonction == 'manager'
	) {
		$sql = "SELECT rendez_vous.nom_societe,rendez_vous.status_rdv,rendez_vous.login_commercial,rendez_vous.contrat_type,contrats.code_contrat , contrats.delai FROM rendez_vous,contrats 
		where rendez_vous.status_rdv IN ('dev_site','cr_contenue','optimisation','cr_reseaux','projet_livre') 
		and rendez_vous.code_rdv = contrats.code_rdv";
	} else {

		if ($fonction == 'developpeur_tech') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT rendez_vous.nom_societe,rendez_vous.status_rdv,rendez_vous.login_commercial,rendez_vous.contrat_type,contrats.code_contrat, contrats.delai FROM rendez_vous,contrats 
			where rendez_vous.status_rdv IN ('dev_site','cr_contenue','optimisation','cr_reseaux','projet_livre') 
			and rendez_vous.code_rdv = contrats.code_rdv 
			and contrats.login_devtech = '$login'";
		} else {
			return [];
		}
	}
	$result = dbQuery($sql);
	$records = [];
	while ($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array(
			"nom_societe" => $nom_societe,
			"status_rdv" => $status_rdv,
			"login_commercial" => $login_commercial,
			"contrat_type" => $contrat_type,
			"code_contrat" => $code_contrat,
			"delai" => $delai
		);
	}
	return $records;
}


function getOneProjet()
{
	$code_contrat = $_GET['code_contrat'];
	$fonction = $_SESSION['crm_fd_user']['fonction'];

	if (
		$fonction == 'admin' ||
		$fonction == 'manager'
	) {
		$sql = "SELECT contrats.*,rendez_vous.*  FROM contrats,rendez_vous 
		where rendez_vous.status_rdv IN ('dev_site','cr_contenue','optimisation','cr_reseaux','projet_livre') 
		and contrats.code_contrat = '$code_contrat'";
	} else {
		if ($fonction == 'developpeur_tech') {
			$login = $_SESSION['crm_fd_user']['login'];
			$sql = "SELECT contrats.*,rendez_vous.*  FROM contrats,rendez_vous 
			where rendez_vous.status_rdv IN ('dev_site','cr_contenue','optimisation','cr_reseaux','projet_livre') 
			and contrats.code_contrat = '$code_contrat' 
			and contrats.login_devtech = '$login'";
		} else {
			return null;
		}
	}
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}

function getSuspendProjets()
{

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$sql = "SELECT rendez_vous.nom_societe,rendez_vous.tel_societe,rendez_vous.login_commercial,rendez_vous.contrat_type,contrats.code_contrat FROM rendez_vous,contrats where rendez_vous.status_rdv = 'projet_suspendu'  and rendez_vous.code_rdv = contrats.code_rdv";
	} else {

		return [];
	}
	$result = dbQuery($sql);
	$records = [];
	while ($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array(
			"nom_societe" => $nom_societe,
			"tel_societe" => $tel_societe,
			"login_commercial" => $login_commercial,
			"contrat_type" => $contrat_type,
			"code_contrat" => $code_contrat
		);
	}
	return $records;
}


function getOneSuspendProject()
{
	$code_contrat = $_GET['code_contrat'];

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'admin' ||
		$_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech' ||
		$_SESSION['crm_fd_user']['fonction'] == 'manager'
	) {
		$sql = "SELECT contrats.*,rendez_vous.*  FROM contrats,rendez_vous where rendez_vous.status_rdv = 'projet_suspendu' and contrats.code_contrat = '$code_contrat'";
	} else {

		return null;
	}
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}






function getStatistiques()
{
	if ($_SESSION['crm_fd_user']['fonction'] != 'admin' && $_SESSION['crm_fd_user']['fonction']  != 'manager') {
		die("acces refusé");
	}

	$sql = "SELECT SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '1' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm1',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '2' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm2',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '3' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm3',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '4' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm4',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '5' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm5',

	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '6' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm6',
	
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '7' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm7',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '8' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm8',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '9' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm9',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '10' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm10',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '11' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm11',
	SUM(case when MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = '12' then 
	rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 else 0 end) 'm12',
	SUM(case when contrat_type = 'starter' then 1 else 0 end) 'starter',
	SUM(case when contrat_type = 'premium' then 1 else 0 end) 'premium',
	SUM(case when contrat_type = 'vip' then 1 else 0 end) 'vip'
	FROM contrats, rendez_vous 
	where
	rendez_vous.code_rdv = contrats.code_rdv AND
	rendez_vous.status_rdv IN
	 ('confirmed_contrat','dev_site','cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu')
	  and 
	 YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())";

	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	return $row;
}
