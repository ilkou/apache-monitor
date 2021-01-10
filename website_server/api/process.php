<?php

require_once 'Booking.php';
require_once '../library/config.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch ($cmd) {

	case 'book':
		bookCalendar();
		break;

	case 'plage':
		plageCalendar();
		break;

	case 'calview':
		calendarView();
		break;


	case 'user':
		userDetails();
		break;

	default:
		break;
}



function bookCalendar()
{
	$login_commercial 		= $_POST['login_commercial'];
	$login_devloppeur		= $_POST['login_devloppeur'];
	$nom_interlocuteur		= $_POST['nom_interlocuteur'];
	$tel_interlocuteur		= $_POST['tel_interlocuteur'];
	$fonction_interlocuteur		= $_POST['fonction_interlocuteur'];
	$nom_societe		= $_POST['nom_societe'];
	$tel_societe	= $_POST['tel_societe'];
	$adresse_rdv 	= $_POST['adresse_rdv'];
	$date_debut 		= $_POST['date_debut'] . ' ' . $_POST['houre_debut'];
	$budget		= $_POST['budget'];
	$commentaire = $_POST['commentaire'];


	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");

	$sql = "INSERT INTO rendez_vous (login_devloppeur, login_commercial,status_rdv, nom_interlocuteur,tel_interlocuteur,fonction_interlocuteur,nom_societe,tel_societe, adresse_rdv ,date_debut, budget, commentaire) 
			VALUES ('$login_devloppeur', '$login_commercial','non_confirme', '$nom_interlocuteur','$tel_interlocuteur','$fonction_interlocuteur','$nom_societe','$tel_societe','$adresse_rdv' ,'$date_debut' , '$budget', '$commentaire')";
	$r = dbQuery($sql);
	header('Location: ../index.php?msg=' . urlencode('appointment successfully registered.'));
	exit();
}


function plageCalendar()
{
	$login_commercial 		= $_POST['login_commercial'];
	$login_devloppeur		= $_POST['login_devloppeur'];
	$date_debut 		= $_POST['date_debut'] . ' ' . $_POST['houre_debut'];
	$date_fin 		= $_POST['date_fin'] . ' ' . $_POST['houre_fin'];



	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");

	$sql = "INSERT INTO rendez_vous (login_devloppeur, login_commercial,status_rdv, nom_interlocuteur,tel_interlocuteur,fonction_interlocuteur,nom_societe,tel_societe,adresse_rdv ,date_debut, date_fin, budget, commentaire) 
			VALUES ('$login_devloppeur', '$login_commercial','plage', '','','','','','' ,'$date_debut', '$date_fin', '', '')";

	// $sql = "INSERT INTO rendez_vous (login_devloppeur, login_commercial,status_rdv ,date_debut, date_fin) 
	// 		VALUES ('$login_devloppeur', '$login_commercial','plage','$date_debut', '$date_fin')";
	dbQuery($sql);
	header('Location: ../index.php?msg=' . urlencode('plage successfully registered.'));
	exit();
}


function get_appointment()
{

	if ($_SESSION['crm_fd_user']['fonction'] == 'manager') {
		return ("SELECT * FROM rendez_vous");
	} else {
		if ($_SESSION['crm_fd_user']['fonction'] == 'devloppeur_commercial') {
			$login = $_SESSION['crm_fd_user']['login'];
			return ("SELECT * FROM rendez_vous where login_devloppeur  = '$login'");
		} else {
			if ($_SESSION['crm_fd_user']['fonction'] == 'commercial') {
				$login = $_SESSION['crm_fd_user']['login'];
				return ("SELECT * FROM rendez_vous where login_commercial = '$login'");
			}
		}
	}
	return ("");
}




function calendarView()
{
	$bookings = array();
	$sql	= get_appointment();
	$result = dbQuery($sql);
	while ($row = dbFetchAssoc($result)) {
		extract($row);
		$book = new Booking();
		$book->title = $nom_societe;

		$d = explode(" ", $date_debut);
		$book->start = date("Y-m-d", strtotime($d[0])) . ' ' . $d[1];




		$bgClr = '#dede00'; //pending

		if ($status_rdv == 'confirme') {
			$bgClr = '#00b818'; /// vert
		} else if ($status_rdv == 'non_confirme') {
			$bgClr = '#dede00';
		} else if ($status_rdv == 'r2') {
			$bgClr = '#d16a0a';
		} else if ($status_rdv == 'r3') {
			$bgClr = '#b30ad1';
		} else if ($status_rdv == 'r4') {
			$bgClr = '#d10a2b';
		} else if ($status_rdv == 'vente') {
			$bgClr = '#3f0ad1';
		} else if ($status_rdv == 'pas_de_vente') {
			$bgClr = '#0a99d1';
		} else if ($status_rdv == 'plage') {
			$bgClr = '#000000';
			$d2 = explode(" ", $date_fin);
			$book->end = date("Y-m-d", strtotime($d2[0])) . ' ' . $d2[1];
		}



		$book->backgroundColor = $bgClr;
		$book->borderColor = $bgClr;
		if ($status_rdv == 'plage') {
			$book->url = WEB_ROOT . 'views/process.php?cmd=deleteRdv&code_rdv=' . $code_rdv . "&token=" . $_SESSION['crm_token'];
			$book->title = 'plage d\'indisponibilité';
		} else {
			$book->url = WEB_ROOT . 'views/?v=APPOINTMENT&code_rdv=' . $code_rdv;
		}

		$bookings[] = $book;
	}
	echo json_encode($bookings);
}

function userDetails()
{
	$userId	= $_GET['userId'];
	$hsql	= "SELECT * FROM tbl_users WHERE id = $userId";
	$hresult = dbQuery($hsql);
	$user = array();
	while ($hrow = dbFetchAssoc($hresult)) {
		extract($hrow);
		$user['user_id'] = $id;
		$user['address'] = $address;
		$user['phone_no'] = $phone;
		$user['email'] = $email;
	} //while
	echo json_encode($user);
}
