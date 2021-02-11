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

	case 'init_config':
		init_config();
		break;

	default:
		break;
}





/////////////////////////////////////

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
///////


function init_config()
{

	if ($_SESSION['crm_token'] != $_POST['token'])
		die("Invalide token");

	$db_name = $_POST['db_name'];
	$db_username = $_POST['db_username'];
	$db_passwd = $_POST['db_passwd'];
	$db_host = $_POST['db_host'];
	$tb_prefix = $_POST['tb_prefix'];
	$user_name = $_POST['username'];
	$passwd = $_POST['passwd'];
	$v_passwd = $_POST['v_passwd'];
	$email = $_POST['email'];

	$per_config = fopen("../library/per_config.php", "w");
	fwrite($per_config, "<?php \n \$dbHost = 'localhost'; \n \$dbUser = '".$db_username ."'; \n \$dbPass = '".$db_passwd."'; \n \$dbName = '".$db_name."'; ?>");
	fclose($per_config);
}
