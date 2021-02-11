<?php


require_once '../library/config.php';
require_once '../library/functions.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch ($cmd) {

	case 'updatePwd':
		updatePwd();
		break;

	case 'init_config':
		init_config();
		break;

	case 'startService':
		startService();
		break;
	case 'stopService':
		stopService();
		break;
	case 'config':
		configuration();
		break;
	case 'newApp':
		newApp();
		break;
	default:
		break;
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

	$passwd = $_POST['passwd'];
	$v_passwd = $_POST['v_passwd'];
	$email = $_POST['email'];
	$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

	$path = "/var/www/html/apache-monitor/auth/login.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	$data["email"] = $email;
	$data["passwd"] = $passwd;

	$fh = fopen("/var/www/html/apache-monitor/auth/login.json", 'w')
		or die("Error opening output file");
	fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
	fclose($fh);


	header('Location: ../views/?v=');

}

function startService()
{
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	// $path = getenv("AM_LOCATION")."config.json";
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);
	$data["access"]["login"] = $login;
	$data["access"]["passwd"] = $passwd;

	$fh = fopen("/var/www/html/apache-monitor/config.json", 'w')
		or die("Error opening output file");
	fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
	fclose($fh);
	header('Location: ../views/?v=services&msg=' . urlencode('The Services has been enabled'));
}

function stopService()
{

	$cmd = $_POST['cmd'];
	$i = $_POST['i'];

	// $path = getenv("AM_LOCATION")."config.json";
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	// Modify the value, and write the structure to a file "data_out.json"
	//
	$data["services"][$i]["state"] = "stopped";

	$fh = fopen("/var/www/html/apache-monitor/config.json", 'w')
		or die("Error opening output file");
	fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
	fclose($fh);

	// exec("./home/rahimi/Desktop/sc.sh");

	header('Location: ../views/?v=services&msg=' . urlencode('The Services has been disabled'));
}

function configuration()
{
	$percentage = $_POST['percentage'];
	$email = $_POST['email'];
	$sms_api_token = $_POST['sms_api_token'];
	$sms_api_tel = $_POST['sms_api_tel'];
	$cron_location = $_POST['cron_location'];


	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	$data["percentage"] = $percentage;
	$data["email"] = $email;
	$data["sms_api_token"] = $sms_api_token;
	$data["sms_api_tel"] = $sms_api_tel;
	$data["cron_location"] = utf8_encode($cron_location);

	$fh = fopen("/var/www/html/apache-monitor/config.json", 'w')
		or die("Error opening output file");
	fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
	fclose($fh);


	header('Location: ../views/?v=configuration');
}

function newApp()
{

	$name = $_POST['name'];
	$string = $_POST['string'];
	$url = $_POST['url'];

	$new_app = array("name" => $name,"string" => $string,"url" => $url,"status" => "...");
	$path = "/var/www/html/apache-monitor/config.json";
	$str_data = file_get_contents($path);
	$data = json_decode($str_data, true);

	$data["apps"][] = $new_app;

	$fh = fopen("/var/www/html/apache-monitor/config.json", 'w')
		or die("Error opening output file");
	fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
	fclose($fh);


	header('Location: ../views/?v=applications');
}