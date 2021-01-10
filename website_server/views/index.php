<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkFDUser();
// $_SESSION['crm_token'] = md5(uniqid(mt_rand(), true));

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'nvContrat':
		$content 	= 'nvContrat.php';
		$pageTitle 	= 'nouveaux contrats';
		break;


	case 'contratForm':
		$content 	= 'contratForm.php';
		$pageTitle 	= 'contrat';
		break;

	case 'confirmedContrat':
		$content 	= 'confirmedContrats.php';
		$pageTitle 	= 'contrats';
		break;


	case 'contrat':
		$content 	= 'contrat.php';
		$pageTitle 	= 'contrat';
		break;

	case 'acceptedProjects':
		$content 	= 'acceptedProjects.php';
		$pageTitle 	= 'projets';
		break;

	case 'projet':
		$content 	= 'projet.php';
		$pageTitle 	= 'projet';
		break;

	case 'projetsSuspend':
		$content 	= 'projetsSuspend.php';
		$pageTitle 	= 'projet en suspends';
		break;
		
	case 'susProjet':
		$content 	= 'susProjet.php';
		$pageTitle 	= 'projet en suspends';
		break;

	case 'USERS':
		$content 	= 'userlist.php';
		$pageTitle 	= 'list des utilisateurs';
		break;

	case 'CREATE':
		$content 	= 'userform.php';
		$pageTitle 	= 'nouvel utilisateur';
		break;

	case 'updatePwd':
		$content 	= 'updatePwd.php';
		$pageTitle 	= 'changer le mot de passe';
		break;
	case 'profileEmploye':
		$content 	= 'profileEmploye.php';
		$pageTitle 	= 'profile';
		break;
		///////////

	case 'APPOINTMENT':
		$content 	= 'rdv_detailles.php';
		$pageTitle 	= 'mon compte';
		break;
	case 'UPDATERDV':
		$content 	= 'appointment.php';
		$pageTitle 	= 'mon compte';
		break;
	case 'UPDATEUSER':
		$content 	= 'userUpdatefForm.php';
		$pageTitle 	= 'modifier un utilisateur';
		break;



	default:
		$content 	= 'dashboard.php';
		$pageTitle 	= 'Tableau de bord';
}

require_once '../include/template.php';
