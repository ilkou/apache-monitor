<?php

require_once '../library/config.php';
require_once '../library/functions.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch ($cmd) {

	case 'create':
		createUser();
		break;

	case 'updateUser':
		updateUser();
		break;
	case 'deleteUser':
		deleteUser();
		break;


	case 'updatePwd':
		updatePwd();
		break;

	case 'confirmerContrat':
		confirmerContrat();
		break;

	case 'accepterContrat':
		accepterContrat();
		break;
	case 'updateProject':
		updateProject();
		break;


	default:
		break;
}







function createUser()
{
	$nom_user 		= $_POST['nom_user'];
	$prenom_user 	= $_POST['prenom_user'];
	$tel 		= $_POST['tel'];
	$fonction 		= $_POST['fonction'];
	$login		= $_POST['login'];
	$password		=  password_hash($_POST['password'], PASSWORD_DEFAULT);

	$photo = $_POST['photo'];

	list($type, $photo) = explode(';', $photo);
	list(, $photo) = explode(',', $photo);

	$photo = base64_decode($photo);
	$photo_name = time() . '.png';
	file_put_contents('uploads/' . $photo_name, $photo);

	$photo = 'uploads/' . $photo_name;


	$hsql	= "SELECT * FROM users WHERE login = '$login'";
	$hresult = dbQuery($hsql);
	if (dbNumRows($hresult) > 0) {
		$errorMessage = 'utilisateur deja existe utiliser  un autre email/login';
		header('Location: ../views/?v=CREATE&err=' . urlencode($errorMessage));
		exit();
	}
	$sql = "INSERT INTO users (login, password,nom_user, prenom_user, tel,fonction, photo)
			VALUES ('$login', '$password','$nom_user', '$prenom_user', '$tel','$fonction','$photo')";
	dbQuery($sql);


	header('Location: ../views/?v=USERS&msg=' . urlencode('L\'utilisateur est enregistré avec succès.'));
	exit();
}


function updateUser()
{
	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token ");

	$login		= $_GET['login'];

	$nom_user 		= $_POST['nom_user'];
	$prenom_user 	= $_POST['prenom_user'];
	$tel 		= $_POST['tel'];
	$fonction 		= $_POST['fonction'];





	$type = $_SESSION['crm_fd_user']['fonction'];
	if ($type == 'admin') {
		$sql = "";
		if (isset($_FILES['photo']) && $_FILES['photo']['name']) {
			$photo = uploadFile('photo');
			$sql	= "UPDATE users SET nom_user = '$nom_user', prenom_user = '$prenom_user',tel = '$tel', fonction = '$fonction' ,photo = '$photo' WHERE login = '$login'";
		} else {
			$sql	= "UPDATE users SET nom_user = '$nom_user', prenom_user = '$prenom_user',tel = '$tel', fonction = '$fonction' WHERE login = '$login'";
		}
		dbQuery($sql);
		header('Location: ../views/?v=USERS&msg=' . urlencode('utilisateur modifié avec succès'));
	}



	exit();
}

function deleteUser()
{
	$login = $_GET['login'];

	if ($_SESSION['crm_token'] != $_GET['token'])
		die("Invalide token ");


	$sql = "DELETE FROM users WHERE login = '$login'";
	dbQuery($sql);
	header('Location: ../views/?v=USERS&msg=' . urlencode('utilisateur supprimé avec succès'));
	exit();
}


function updatePwd()
{

	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");

	$currentPwd = $_POST['currentPwd'];
	$nvPwd1 = $_POST['nvPwd1'];
	$nvPwd2 = $_POST['nvPwd2'];

	$errorMessage = '';

	$login = $_SESSION['crm_fd_user']['login'];

	$sql 	= "SELECT * FROM users WHERE login = '$login'";
	$result = dbQuery($sql);

	if (dbNumRows($result) == 1) {
		$row = dbFetchAssoc($result);
		if (password_verify($currentPwd, $row['password'])) {
			if ($nvPwd1 == $nvPwd2) {
				$password =  password_hash($nvPwd1, PASSWORD_DEFAULT);
				$sql2 	=  "UPDATE users SET password = '$password' WHERE login = '$login'";
				dbQuery($sql2);
				header('Location: ../views?v=&msg=' . urlencode('le mot de passe est modifié avec succès'));
				exit();
			} else {
				header('Location: ../views?v=updatePwd&msg=' . urlencode('confirmez le mot de passe'));
			}
		} else {
			header('Location: ../views?v=updatePwd&msg=' . urlencode('le mot de passe incorrect'));
		}
	} else {
		header('Location: ../views?vupdatePwd=&msg=' . urlencode('le mot de passe incorrect'));
	}
	return $errorMessage;
}




////////////////////////////////



function uploadMultiFiles($file)
{
	$name = "";
	header('Content-type: application/json');

	$valid_exts = array('jpeg', 'jpg', 'png', 'gif', 'doc', 'txt', 'pdf'); // valid extensions
	$max_size = 50000000 * 1024; // max file size (200kb)
	$path = 'uploads/'; // upload directory
	for ($a = 0; $a < count($_FILES[$file]["name"]); $a++) {

		$path = 'uploads/'; // upload director

		if (@is_uploaded_file($_FILES[$file]['tmp_name'][$a])) {
			// get uploaded file extension
			$ext = strtolower(pathinfo($_FILES[$file]['name'][$a], PATHINFO_EXTENSION));
			// looking for format and size validity
			if (in_array($ext, $valid_exts) and $_FILES[$file]['size'][$a] < $max_size) {
				// unique file path
				$path = $path . uniqid() . '.' . $ext;
				// move uploaded file from temp to uploads directory

				if (move_uploaded_file($_FILES[$file]['tmp_name'][$a], $path)) {


					$status = 'images successfully uploaded!';
					if ($a === 0)
						$name = $path;
					else
						$name = $name . ',' . $path;
				} else {
					$status = 'Upload Fail: Unknown error occurred!';
				}
			} else {
				$status = 'Upload Fail: Unsupported file format or It is too large to upload!';
			}
		} else {
			$status = 'Upload Fail: File not uploaded!';
		}

		// echo out json encoded status
		echo json_encode(array('status' => $status));
	}
	return ($name);
}

function uploadFile($file)
{
	header('Content-type: application/json');

	$valid_exts = array('jpeg', 'jpg', 'png', 'gif', 'pdf', 'doc', 'txt', 'docx'); // valid extensions
	$max_size = 5000000000 * 1024; // max file size (200kb)
	$path = 'uploads/'; // upload directory
	header('Content-type: application/json');

	if (@is_uploaded_file($_FILES[$file]['tmp_name'])) {
		// get uploaded file extension
		$ext = strtolower(pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION));
		// looking for format and size validity
		if (in_array($ext, $valid_exts) and $_FILES[$file]['size'] < $max_size) {
			// unique file path
			$path = $path . uniqid() . '.' . $ext;
			// move uploaded file from temp to uploads directory

			if (move_uploaded_file($_FILES[$file]['tmp_name'], $path)) {


				$status = 'images successfully uploaded!';
				return ($path);
			} else {
				$status = 'Upload Fail: Unknown error occurred!';
			}
		} else {
			$status = 'Upload Fail: Unsupported file format or It is too large to upload!';
		}
	} else {
		$status = 'Upload Fail: File not uploaded!';
	}

	// echo out json encoded status
	echo json_encode(array('status' => $status));
	return ("");
}





function confirmerContrat()
{	
	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");


	// uploadMultiFiles("images");

	$code_rdv = $_GET['code_rdv'];
	$date_signature = "";
	if (isset($_POST['date_signature']))
		$date_signature = $_POST['date_signature'];

	$nom_site = "";
	if (isset($_POST['nom_site']))
		$nom_site = $_POST['nom_site'];

	$nom_domaine = "";
	if (isset($_POST['nom_domaine']))
		$nom_domaine = $_POST['nom_domaine'];

	$second_domaine = "";
	if (isset($_POST['']))
		$second_domaine = $_POST['second_domaine'];

	isset($_POST['creation_logo']) ?  $creation_logo = 1 : $creation_logo = 0;

	$logo_existant = "";
	if (isset($_FILES['logo_existant']))
		$logo_existant = uploadFile('logo_existant');

	$style_ecriture = "";
	if (isset($_POST['style_ecriture']))
		$style_ecriture = $_POST['style_ecriture'];

	$couleurs_dominantes1 = "";
	if (isset($_POST['couleurs_dominantes1']))
		$couleurs_dominantes1 = $_POST['couleurs_dominantes1'];
	$couleurs_dominantes2 = "";
	if (isset($_POST['couleurs_dominantes2']))
		$couleurs_dominantes2 = $_POST['couleurs_dominantes2'];
	$couleurs_dominantes3 = "";
	if (isset($_POST['couleurs_dominantes3']))
		$couleurs_dominantes3 = $_POST['couleurs_dominantes3'];

	$aspect_visuel = "";
	if (isset($_POST['aspect_visuel']))
		$aspect_visuel = $_POST['aspect_visuel'];


	$rubriques = "";
	if (isset($_POST['rubriques']))
		$rubriques = $_POST['rubriques'];



	$histoire_societe = "";
	if (isset($_POST['histoire_societe']))
		$histoire_societe = $_POST['histoire_societe'];

	$site_aime = "";
	if (isset($_POST['site_aime']))
		$site_aime = $_POST['site_aime'];
	$site_concurrents = "";
	if (isset($_POST['site_concurrents']))
		$site_concurrents = $_POST['site_concurrents'];


	$logos_partenaires = "";
	if (isset($_FILES['logos_partenaires']))
		$logos_partenaires = uploadFile('logos_partenaires');

	isset($_POST['creation_texte']) ?  $creation_texte = 1 : $creation_texte = 0;

	$texte_importer = "";
	if (isset($_FILES['texte_importer']))
		$texte_importer = uploadFile('texte_importer');

	isset($_POST['gallerie_photos']) ?  $gallerie_photos = 1 : $gallerie_photos = 0;

	$photos_importer = "";
	if (isset($_FILES['photos_importer']))
		$photos_importer = uploadMultiFiles('photos_importer');

	$option_personnalisees = "";
	if (isset($_POST['option_personnalisees']))
		$option_personnalisees =  $_POST['option_personnalisees'];

	$creation_reseaux = "";
	if (isset($_POST['creation_reseaux']))
		$creation_reseaux = $_POST['creation_reseaux'];

	$expressions_cles = "";
	if (isset($_POST['expressions_cles']))
		$expressions_cles = $_POST['expressions_cles'];

	$geolocalisation = "";
	if (isset($_POST['geolocalisation']))
		$geolocalisation = $_POST['geolocalisation'];

	$commentaire_realisation = "";
	if (isset($_POST['commentaire_realisation']))
		$commentaire_realisation = $_POST['commentaire_realisation'];

	$carte_identite = "";
	if (isset($_FILES['carte_identite']))
		$carte_identite = uploadFile('carte_identite');

	$contrat_recto = "";
	if (isset($_FILES['contrat_recto']))
		$contrat_recto = uploadFile('contrat_recto');

	$contrat_verso = "";
	if (isset($_FILES['contrat_recto']))
		$contrat_verso = uploadFile('contrat_verso');

	$cheque = "";
	if (isset($_FILES['cheque']))
		$cheque = uploadFile('cheque');



	$num_cheque = "";
	if (isset($_POST['num_cheque']))
		$num_cheque = $_POST['num_cheque'];

	$rib = "";
	if (isset($_FILES['rib']))
		$rib = uploadFile('rib');

	$mandats = "";
	if (isset($_FILES['mandats']))
		$mandats = uploadFile('mandats');

	$proces_verbal = "";
	if (isset($_FILES['proces_verbal']))
		$proces_verbal = uploadFile('proces_verbal');


	$sql = "INSERT INTO contrats(code_rdv , date_signature , nom_site , nom_domaine , second_domaine ,
	 creation_logo , logo_existant , style_ecriture , couleurs_dominantes1 ,
	 couleurs_dominantes2 , couleurs_dominantes3 , aspect_visuel , histoire_societe ,
	 site_aime , site_concurrents , logos_partenaires , creation_texte , texte_importer ,
	 gallerie_photos , photos_importer , option_personnalisees , creation_reseaux , expressions_cles ,
	 geolocalisation , commentaire_realisation , carte_identite , contrat_recto , contrat_verso ,cheque,num_cheque, rib ,
	 mandats , proces_verbal,
	rubriques)
	 
	 VALUES ('$code_rdv','$date_signature','$nom_site','$nom_domaine','$second_domaine','$creation_logo','$logo_existant',
	 '$style_ecriture','$couleurs_dominantes1','$couleurs_dominantes2','$couleurs_dominantes3','$aspect_visuel',
	 '$histoire_societe','$site_aime','$site_concurrents','$logos_partenaires','$creation_texte','$texte_importer',
	 '$gallerie_photos','$photos_importer','$option_personnalisees','$creation_reseaux','$expressions_cles','$geolocalisation',
	 '$commentaire_realisation','$carte_identite','$contrat_recto','$contrat_verso','$cheque','$num_cheque','$rib',
	 '$mandats','$proces_verbal','$rubriques')";

	dbQuery($sql);

	$sql2 	=  "UPDATE rendez_vous SET status_rdv = 'confirmed_contrat' WHERE code_rdv = '$code_rdv'";
	dbQuery($sql2);

	exit(0);
}



function accepterContrat()
{
	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");
	$code_rdv = $_GET['code_rdv'];
	$login_devtech = $_POST['login_devtech'];
	$delai =  date("Y-m-d");
	$delai = date('Y-m-d', strtotime($delai. ' + '.$_POST['delai'].' days')); 

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'manager' ||
		$_SESSION['crm_fd_user']['fonction'] == 'admin'
	) {
		$sql	= "UPDATE rendez_vous SET  status_rdv= 'dev_site'  WHERE code_rdv = '$code_rdv'";
		dbQuery($sql);
		$sql	= "UPDATE contrats SET  login_devtech= '$login_devtech',  delai = '$delai'  WHERE code_rdv = '$code_rdv'";
		dbQuery($sql);
		header('Location: ../views/?v=&msg=' . urlencode('contrat est pas valideè avec succès'));
	}
	header('Location: ../views/?v=&msg=' . urlencode('contrat n\'est pas valideè'));
}



function updateProject()
{
	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");
	$code_rdv = $_GET['code_rdv'];
	$status_rdv = $_GET['status_rdv'];

	if ($status_rdv == 'dev_site')
		$status_rdv = 'cr_contenue';
	elseif ($status_rdv == 'cr_contenue')
		$status_rdv = 'optimisation';

	elseif ($status_rdv == 'optimisation')
		$status_rdv = 'cr_reseaux';

	elseif ($status_rdv == 'cr_reseaux')
		$status_rdv = 'projet_livre';

	if (
		$_SESSION['crm_fd_user']['fonction'] == 'manager' ||
		$_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech'
	) {
		$sql	= "UPDATE rendez_vous SET  status_rdv= '$status_rdv'  WHERE code_rdv = '$code_rdv'";
		dbQuery($sql);
		header('Location: ../views/?v=&msg=' . urlencode('projet est modifiè avec  succès'));
	}
	header('Location: ../views/?v=&msg=' . urlencode('projet n\'est pas modifiè'));
}

