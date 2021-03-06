<?php
require_once '../library/config.php';
require_once '../library/functions.php';

// checkFDUser();
// $_SESSION['crm_token'] = md5(uniqid(mt_rand(), true));

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'services':
		$content 	= 'services.php';
		$pageTitle 	= 'services';
		break;
	case 'configuration':
		$content 	= 'configuration.php';
		$pageTitle 	= 'configuration';
		break;
		
		case 'change_password':
			$content 	= 'change_password.php';
			$pageTitle 	= 'change password';
			break;

			case 'applications':
				$content 	= 'applications.php';
				$pageTitle 	= 'Application';
				break;


	default:
		$content 	= 'dashboard.php';
		$pageTitle 	= 'Tableau de bord';
}

require_once '../include/template.php';
